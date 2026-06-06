
$username = "Ilusion2022"
$password = "eH61 JB17 2fy0 MLwd j9Lb PvTT"
$apiBase  = "https://diariodeabordo.com/wp-json/wp/v2"

$creds   = "${username}:${password}"
$b64     = [Convert]::ToBase64String([System.Text.Encoding]::UTF8.GetBytes($creds))
$headers = @{ Authorization = 'Basic ' + $b64; 'Content-Type' = 'application/json' }

Write-Host "--- SITE INFO ---"
try {
  $info = Invoke-RestMethod -Uri "https://diariodeabordo.com/wp-json" -Headers $headers -Method GET -ErrorAction Stop
  Write-Host "Name: $($info.name)"
  Write-Host "Desc: $($info.description)"
  Write-Host "Home: $($info.home)"
} catch {
  Write-Host "FAIL SITE INFO: $($_.Exception.Message)"
}

Write-Host "`n--- PAGES ---"
try {
  $pages = Invoke-RestMethod -Uri ($apiBase + "/pages?status=publish,draft,private&per_page=100") -Headers $headers -Method GET -ErrorAction Stop
  if ($pages.Count -eq 0) {
    Write-Host "No pages found."
  } else {
    $pages | Select-Object id, title, slug, status | Format-Table -AutoSize
  }
} catch {
  Write-Host "FAIL PAGES: $($_.Exception.Message)"
}

Write-Host "`n--- CHECKING SETTINGS (Front Page) ---"
try {
  $settings = Invoke-RestMethod -Uri "https://diariodeabordo.com/wp-json/wp/v2/settings" -Headers $headers -Method GET -ErrorAction Stop
  Write-Host "Show on front: $($settings.show_on_front)"
  Write-Host "Page on front: $($settings.page_on_front)"
} catch {
  Write-Host "FAIL SETTINGS: $($_.Exception.Message)"
  Write-Host "Note: Accessing /settings requires admin privileges. User 'Ilusion2022' might not have enough permissions for this endpoint via API, even if they are admin."
}
