
$username = "Ilusion2022"
$password = "eH61 JB17 2fy0 MLwd j9Lb PvTT"
$baseUrl  = "https://diariodeabordo.com"

$creds   = "${username}:${password}"
$b64     = [Convert]::ToBase64String([System.Text.Encoding]::UTF8.GetBytes($creds))
$headers = @{ Authorization = 'Basic ' + $b64; 'Content-Type' = 'application/json' }

Write-Host "Testing ?rest_route=/wp/v2/pages ..."
try {
  $pages = Invoke-RestMethod -Uri "$baseUrl/index.php?rest_route=/wp/v2/pages" -Headers $headers -Method GET -ErrorAction Stop
  Write-Host "SUCCESS: Found $($pages.Count) pages."
  $pages | Select-Object id, title, slug, link | Format-Table -AutoSize
} catch {
  Write-Host "FAIL: $($_.Exception.Message)"
}
