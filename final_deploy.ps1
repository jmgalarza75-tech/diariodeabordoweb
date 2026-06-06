
$username = "Ilusion2022"
$password = "eH61 JB17 2fy0 MLwd j9Lb PvTT"
$baseUrl  = "https://diariodeabordo.com"
$apiBase  = "$baseUrl/index.php?rest_route=/wp/v2"

$creds   = "${username}:${password}"
$b64     = [Convert]::ToBase64String([System.Text.Encoding]::UTF8.GetBytes($creds))
$headers = @{ Authorization = 'Basic ' + $b64; 'Content-Type' = 'application/json' }

# Function to find page ID by title
function Find-PageID {
    param([string]$title)
    try {
        $pages = Invoke-RestMethod -Uri "$apiBase/pages&search=$title&status=publish,draft,private" -Headers $headers -Method GET -ErrorAction Stop
        if ($pages.Count -gt 0) {
            # Find the one that matches title exactly (or first one)
            foreach($p in $pages) {
                if ($p.title.rendered -like "*$title*") { return $p.id }
            }
            return $pages[0].id
        }
    } catch {}
    return $null
}

Write-Host "--- Starting Deployment to diariodeabordo.com ---" -ForegroundColor Cyan

# 1. Search for "Home" page
Write-Host "Searching for 'Home' page..."
$pageId = Find-PageID "Home"

if ($null -eq $pageId) {
    Write-Host "Home page not found. Creating new page..."
    $createPayload = @{
        title   = "Home"
        status  = "publish"
        content = "Rendering..."
    } | ConvertTo-Json
    try {
        $newPage = Invoke-RestMethod -Uri "$apiBase/pages" -Headers $headers -Method POST -Body $createPayload -ErrorAction Stop
        $pageId = $newPage.id
        Write-Host "Created page with ID: $pageId" -ForegroundColor Green
    } catch {
        Write-Host "FAIL Create: $($_.Exception.Message)" -ForegroundColor Red
        if ($_.Exception.Message -match "401") { Write-Host "TIP: This confirms Hostinger is stripping Auth headers." -ForegroundColor Yellow }
        exit 1
    }
} else {
    Write-Host "Found existing page ID: $pageId" -ForegroundColor Green
}

# 2. Upload Content
Write-Host "Uploading redesign content..."
$content = Get-Content -Path "C:\Users\Jose Maria\Documents\Antigravity\diario de abordoeweb\wordpress-paste.html" -Raw
$updatePayload = @{
    content = $content
} | ConvertTo-Json

try {
    $result = Invoke-RestMethod -Uri "$apiBase/pages/$pageId" -Headers $headers -Method POST -Body $updatePayload -ErrorAction Stop
    Write-Host "SUCCESS: Redesign content pushed to page $pageId" -ForegroundColor Green
    Write-Host "View here: $($result.link)" -ForegroundColor Gray
} catch {
    Write-Host "FAIL Update: $($_.Exception.Message)" -ForegroundColor Red
}

# 3. Try to set as Front Page
Write-Host "Attempting to set as site front page..."
try {
    $settingsPayload = @{
        show_on_front = "page"
        page_on_front = $pageId
    } | ConvertTo-Json
    $setResult = Invoke-RestMethod -Uri "$apiBase/settings" -Headers $headers -Method POST -Body $settingsPayload -ErrorAction Stop
    Write-Host "SUCCESS: Site front page set successfully!" -ForegroundColor Green
} catch {
    Write-Host "NOTE: Automatic front-page setting failed ($($_.Exception.Message))." -ForegroundColor Yellow
    Write-Host "Please do this manually in WordPress Admin > Settings > Reading." -ForegroundColor Gray
}

Write-Host "--- Process Finished ---" -ForegroundColor Cyan
