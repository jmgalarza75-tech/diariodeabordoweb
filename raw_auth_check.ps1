
$username = "Ilusion2022"
$password = "Pachanga2022"
$baseUrl  = "https://diariodeabordo.com"
$apiBase  = "$baseUrl/wp-json/wp/v2"

$creds   = "${username}:${password}"
$b64     = [Convert]::ToBase64String([System.Text.Encoding]::UTF8.GetBytes($creds))
$headers = @{ Authorization = 'Basic ' + $b64; 'Content-Type' = 'application/json' }

Write-Host "Checking raw response from /users/me..."
try {
  $response = Invoke-WebRequest -Uri "$apiBase/users/me" -Headers $headers -Method GET -ErrorAction Stop
  Write-Host "Status: $($response.StatusCode)"
  Write-Host "Content Type: $($response.Headers['Content-Type'])"
  Write-Host "Body snippet:"
  Write-Host ($response.Content.Substring(0, [Math]::Min(500, $response.Content.Length)))
} catch {
  Write-Host "FAIL: $($_.Exception.Message)"
}
