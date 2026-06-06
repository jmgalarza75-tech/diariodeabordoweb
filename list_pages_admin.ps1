
$username = "Ilusion2022"
$password = "Pachanga2022"
$baseUrl  = "https://diariodeabordo.com"
$apiBase  = "$baseUrl/wp-json/wp/v2"

$creds   = "${username}:${password}"
$b64     = [Convert]::ToBase64String([System.Text.Encoding]::UTF8.GetBytes($creds))
$headers = @{ Authorization = 'Basic ' + $b64; 'Content-Type' = 'application/json' }

Write-Host "Fetching pages with admin password..."
try {
  $pages = Invoke-RestMethod -Uri "$apiBase/pages" -Headers $headers -Method GET -ErrorAction Stop
  $pages | Select-Object id, title, slug | Format-Table -AutoSize
} catch {
  Write-Host "FAIL: $($_.Exception.Message)"
}
