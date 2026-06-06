
$username = "Ilusion2022"
$password = "Pachanga2022"
$baseUrl  = "https://diariodeabordo.com"
$apiBase  = "$baseUrl/wp-json/wp/v2"

$creds   = "${username}:${password}"
$b64     = [Convert]::ToBase64String([System.Text.Encoding]::UTF8.GetBytes($creds))
$headers = @{ Authorization = 'Basic ' + $b64; 'Content-Type' = 'application/json' }

Write-Host "Testing regular password auth on diariodeabordo.com..."
try {
  $me = Invoke-RestMethod -Uri "$apiBase/users/me" -Headers $headers -Method GET -ErrorAction Stop
  Write-Host "AUTH OK: $($me.name)"
} catch {
  Write-Host "AUTH FAIL: $($_.Exception.Message)"
}
