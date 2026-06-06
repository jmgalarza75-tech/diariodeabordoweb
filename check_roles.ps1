
$username = "Ilusion2022"
$password = "Pachanga2022"
$baseUrl  = "https://diariodeabordo.com"
$apiBase  = "$baseUrl/wp-json/wp/v2"

$creds   = "${username}:${password}"
$b64     = [Convert]::ToBase64String([System.Text.Encoding]::UTF8.GetBytes($creds))
$headers = @{ Authorization = 'Basic ' + $b64; 'Content-Type' = 'application/json' }

try {
  $me = Invoke-RestMethod -Uri "$apiBase/users/me" -Headers $headers -Method GET -ErrorAction Stop
  Write-Host "User: $($me.name)"
  Write-Host "Roles: $($me.roles -join ',')"
  Write-Host "Caps: $($me.capabilities.Keys -join ', ')"
} catch {
  Write-Host "FAIL: $($_.Exception.Message)"
}
