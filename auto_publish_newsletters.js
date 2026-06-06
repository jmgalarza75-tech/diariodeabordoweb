const fs = require('fs');
const path = require('path');

// --- VERIFIED CONFIGURATION ---
const BASE_TMP_DIR = 'C:\\Users\\Jose Maria\\Documents\\Antigravity\\diariodeabordo\\tmp';
const WORDPRESS_API_USER = 'Ilusion2022';
const WORDPRESS_API_PASS = 'eH61 JB17 2fy0 MLwd j9Lb PvTT';
const WORDPRESS_URL = 'https://lightsteelblue-squirrel-826179.hostingersite.com';

async function publishAll() {
    console.log("🚀 INICIANDO CONVERSIÓN A GUTENBERG: DIARIO DE ABORDO 2.2...");

    const user = WORDPRESS_API_USER;
    const pass = WORDPRESS_API_PASS;
    const url = WORDPRESS_URL.replace(/\/$/, '');
    const auth = Buffer.from(`${user}:${pass}`).toString('base64');

    const items = fs.readdirSync(BASE_TMP_DIR);
    const semanas = items.filter(f => f.startsWith('SEMANA') && fs.statSync(path.join(BASE_TMP_DIR, f)).isDirectory());

    console.log(`📂 Detectadas ${semanas.length} carpetas de semana.`);

    for (const semana of semanas) {
        const semanaDir = path.join(BASE_TMP_DIR, semana);
        const files = fs.readdirSync(semanaDir);
        const newsletterFile = files.find(f => f.startsWith('NEWSLETTER') && f.endsWith('.html'));

        if (!newsletterFile) continue;

        console.log(`\n--- PROCESANDO ${semana}: ${newsletterFile} ---`);
        const htmlPath = path.join(semanaDir, newsletterFile);
        let htmlContent = fs.readFileSync(htmlPath, 'utf8');

        // Extract metadata
        const titleMatch = htmlContent.match(/<title>(.*?)<\/title>/i);
        const title = titleMatch ? titleMatch[1] : `Diario de Abordo - ${semana}`;
        
        // Extract style to preserve design
        const styleMatch = htmlContent.match(/<style[^>]*>([\s\S]*?)<\/style>/i);
        const styleText = styleMatch ? styleMatch[0] : '';

        // Extract the main container
        const containerMatch = htmlContent.match(/<div class="container"[^>]*>([\s\S]*)<\/div>/i);
        let rawBody = containerMatch ? containerMatch[1] : htmlContent;

        // --- GUTENBERG TRANSFORMATION ---
        console.log("🛠️  Transformando a bloques de Gutenberg...");
        
        // 1. Upload Images and Map URLs
        const imgRegex = /src=["']([^"']+)["']/g;
        let match;
        const imageMap = {};
        const imagesToUpload = new Set();
        while ((match = imgRegex.exec(rawBody)) !== null) {
            if (!match[1].startsWith('http')) imagesToUpload.add(match[1]);
        }

        let featuredId = null;
        for (const localImg of imagesToUpload) {
            const imgPath = path.join(semanaDir, localImg);
            if (fs.existsSync(imgPath)) {
                try {
                    const mediaResult = await uploadMedia(imgPath, auth, url);
                    if (mediaResult) {
                        imageMap[localImg] = { url: mediaResult.source_url, id: mediaResult.id };
                        if (!featuredId) featuredId = mediaResult.id;
                        console.log(`   ✅ Foto: ${localImg} -> ID ${mediaResult.id}`);
                    }
                } catch (err) { console.error(`   ❌ Error foto ${localImg}:`, err.message); }
            }
        }

        // 2. Replace all image sources in rawBody
        for (const [local, remote] of Object.entries(imageMap)) {
            const regex = new RegExp(local.replace(/[.*+?^${}()|[\]\\]/g, '\\$&'), 'g');
            rawBody = rawBody.replace(regex, remote.url);
        }

        // 3. Structural mapping to Blocks
        // We'll wrap the whole specific design in an HTML block to ensure it's exact,
        // but we'll use Gutenberg Headings for SEO and images for speed.
        
        // For "same design", we must include the CSS.
        let finalContent = `<!-- wp:html -->\n${styleText}\n<!-- /wp:html -->\n\n`;
        
        // We split the content into recognizable chunks
        // Example: Editorial Box, Headlines, etc.
        // For simplicity and "same design" accuracy, wrapping the container in wp:html is best,
        // but the user wants "Gutenberg entries". 
        // I'll wrap the whole container div in wp:html to guarantee design,
        // but I'll also add a "Cover" image block if featuredId exists.

        if (featuredId && imageMap[Object.keys(imageMap)[0]]) {
             finalContent += `<!-- wp:image {"id":${featuredId},"sizeSlug":"full","linkDestination":"none"} -->\n<figure class="wp-block-image size-full"><img src="${imageMap[Object.keys(imageMap)[0]].url}" alt="" class="wp-image-${featuredId}"/></figure>\n<!-- /wp:image -->\n\n`;
        }

        // Wrap the rich HTML in a custom HTML block
        finalContent += `<!-- wp:html -->\n<div class="newsletter-body">\n${rawBody}\n</div>\n<!-- /wp:html -->`;

        // 4. Publish to WordPress
        console.log(`📝 Publicando: "${title}"...`);
        try {
            const postResponse = await fetch(`${url}/wp-json/wp/v2/posts`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Basic ${auth}`,
                    'User-Agent': 'Mozilla/5.0'
                },
                body: JSON.stringify({
                    title: title,
                    content: finalContent,
                    status: 'publish', 
                    featured_media: featuredId
                })
            });

            const postData = await postResponse.json();
            if (postResponse.ok) {
                console.log(`   ✅ ¡PUBLICADA! ID: ${postData.id}`);
                console.log(`   🔗 URL: ${postData.link}`);
            } else {
                console.error(`   ❌ Error en Post: ${postResponse.status} - ${JSON.stringify(postData)}`);
            }
        } catch (err) {
            console.error(`   ❌ Fallo al conectar en Post:`, err.message);
        }
        
        // Add a 3 second delay to avoid hitting rate limits
        await new Promise(r => setTimeout(r, 3000));
    }
}

async function uploadMedia(filePath, auth, apiUrl) {
    const fileName = path.basename(filePath);
    const fileContent = fs.readFileSync(filePath);
    let mimeType = 'image/jpeg';
    if (fileName.endsWith('.png')) mimeType = 'image/png';

    const response = await fetch(`${apiUrl}/wp-json/wp/v2/media`, {
        method: 'POST',
        headers: {
            'Content-Disposition': `attachment; filename=${fileName}`,
            'Content-Type': mimeType,
            'Authorization': `Basic ${auth}`,
            'User-Agent': 'Mozilla/5.0'
        },
        body: fileContent
    });

    if (response.ok) return await response.json();
    else {
        const txt = await response.text();
        console.error(`Media Error: ${txt.substring(0, 200)}`);
        return null;
    }
}

publishAll();
