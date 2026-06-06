
$username = "Ilusion2022"
$password = "eH61 JB17 2fy0 MLwd j9Lb PvTT"
$apiBase  = "https://diariodeabordo.com/wp-json/wp/v2"

$creds   = "${username}:${password}"
$b64     = [Convert]::ToBase64String([System.Text.Encoding]::UTF8.GetBytes($creds))
$headers = @{ Authorization = 'Basic ' + $b64; 'Content-Type' = 'application/json' }

Write-Host "Fetching pages from diariodeabordo.com..."
try {
  $pages = Invoke-RestMethod -Uri ($apiBase + '/pages?per_page=50') -Headers $headers -Method GET -ErrorAction Stop
  $pages | Select-Object id, title, slug, link | Format-Table -AutoSize
} catch {
  Write-Host "FAIL: $($_.Exception.Message)"
}
