const https = require('https');
const fs = require('fs');
const path = require('path');

const USER = 'Ilusion2022';
const PASS = 'eH61 JB17 2fy0 MLwd j9Lb PvTT';
const HOST = 'lightsteelblue-squirrel-826179.hostingersite.com';
const AUTH = Buffer.from(`${USER}:${PASS}`).toString('base64');

const HTML_FILE = 'C:\\Users\\Jose Maria\\Documents\\Antigravity\\diariodeabordo\\tmp\\SEMANA1\\NEWSLETTER_SEMANA1.html';

async function testSingle() {
    console.log("Testing single post for Semana 1...");
    const content = fs.readFileSync(HTML_FILE, 'utf8');
    
    const body = JSON.stringify({
        title: "Test Gutenberg Simple",
        content: `<!-- wp:paragraph --><p>Hello World from Antigravity Agent</p><!-- /wp:paragraph -->`,
        status: 'draft'
    });

    const options = {
        hostname: HOST,
        path: '/wp-json/wp/v2/posts',
        method: 'POST',
        headers: {
            'Authorization': `Basic ${AUTH}`,
            'Content-Type': 'application/json',
            'Content-Length': Buffer.byteLength(body),
            'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36'
        }
    };

    const req = https.request(options, (res) => {
        let data = '';
        res.on('data', (chunk) => data += chunk);
        res.on('end', () => {
            console.log(`Status: ${res.statusCode}`);
            console.log(`Response: ${data.substring(0, 1000)}`);
        });
    });

    req.on('error', (e) => {
        console.error(`Error: ${e.message}`);
    });

    req.write(body);
    req.end();
}

testSingle();
