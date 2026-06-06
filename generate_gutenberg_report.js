const fs = require('fs');
const path = require('path');

const BASE_TMP_DIR = 'C:\\Users\\Jose Maria\\Documents\\Antigravity\\diariodeabordo\\tmp';
const THEME_URL = 'https://diariodeabordo.es/wp-content/themes/diariodeabordoweb';

function convert() {
    const items = fs.readdirSync(BASE_TMP_DIR);
    const semanas = items.filter(f => f.startsWith('SEMANA') && fs.statSync(path.join(BASE_TMP_DIR, f)).isDirectory());

    let report = "# 🛳️  DIARIO DE ABORDO: Reporte de Conversión a Gutenberg\n\n";
    report += "Este documento contiene el código de bloques de Gutenberg listo para ser pegado en el editor de WordPress para cada semana.\n\n";

    for (const semana of semanas) {
        const semanaDir = path.join(BASE_TMP_DIR, semana);
        const files = fs.readdirSync(semanaDir);
        const newsletterFile = files.find(f => f.startsWith('NEWSLETTER') && f.endsWith('.html'));

        if (!newsletterFile) continue;

        const htmlPath = path.join(semanaDir, newsletterFile);
        let htmlContent = fs.readFileSync(htmlPath, 'utf8');

        // Extract metadata
        const titleMatch = htmlContent.match(/<title>(.*?)<\/title>/i);
        const title = titleMatch ? titleMatch[1] : `Diario de Abordo - ${semana}`;
        
        // Extract style
        const styleMatch = htmlContent.match(/<style[^>]*>([\s\S]*?)<\/style>/i);
        const styleText = styleMatch ? styleMatch[0] : '';

        // Extract container
        const containerMatch = htmlContent.match(/<div class="container"[^>]*>([\s\S]*)<\/div>/i);
        let innerBody = containerMatch ? containerMatch[1] : htmlContent;

        // Replace local images with Theme URLs
        const imgRegex = /src=["']([^"']+)["']/g;
        innerBody = innerBody.replace(imgRegex, (match, p1) => {
            if (p1.startsWith('http')) return match;
            return `src="${THEME_URL}/img/newsletters/${p1}"`;
        });

        const slug = title.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '');

        report += `## ${semana}: ${title}\n`;
        report += `**Slug sugerido:** \`${slug}\`\n\n`;
        report += "### 🛠️ Código Gutenberg (Copiar Todo):\n\n";
        report += "```html\n";
        report += "<!-- wp:html -->\n";
        report += styleText + "\n";
        report += `<div class="newsletter-container-block">\n${innerBody}\n</div>\n`;
        report += "<!-- /wp:html -->\n";
        report += "```\n\n---\n\n";
    }

    fs.writeFileSync('Gutenberg_ENTRIES_CODE.md', report);
    console.log("✅ Reporte generado en Gutenberg_ENTRIES_CODE.md");
}

convert();
