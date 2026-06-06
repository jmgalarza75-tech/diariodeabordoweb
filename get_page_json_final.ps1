
$username = "Ilusion2022"
$password = "eH61 JB17 2fy0 MLwd j9Lb PvTT"
$baseUrl  = "https://diariodeabordo.com"

$creds   = "${username}:${password}"
$b64     = [Convert]::ToBase64String([System.Text.Encoding]::UTF8.GetBytes($creds))
$headers = @{ Authorization = 'Basic ' + $b64; 'Content-Type' = 'application/json' }

try {
  $pages = Invoke-RestMethod -Uri "$baseUrl/index.php?rest_route=/wp/v2/pages" -Headers $headers -Method GET -ErrorAction Stop
  $pages | ConvertTo-Json -Depth 5
} catch {
  Write-Host "FAIL: $($_.Exception.Message)"
}
