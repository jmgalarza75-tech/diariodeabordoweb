
$username = "Ilusion2022"
$password = "eH61 JB17 2fy0 MLwd j9Lb PvTT"
$baseUrl  = "https://diariodeabordo.com"

$creds   = "${username}:${password}"
$b64     = [Convert]::ToBase64String([System.Text.Encoding]::UTF8.GetBytes($creds))
$headers = @{ Authorization = 'Basic ' + $b64; 'Content-Type' = 'application/json' }

Write-Host "--- TEST 1: Pretty Permalinks /wp-json/wp/v2/ ---"
try {
  $r1 = Invoke-WebRequest -Uri "$baseUrl/wp-json/wp/v2/" -Headers $headers -Method GET -ErrorAction Stop
  Write-Host "Pretty Permalinks: OK"
} catch {
  Write-Host "Pretty Permalinks: FAIL ($($_.Exception.Message))"
}

Write-Host "`n--- TEST 2: Plain Permalinks ?rest_route=/wp/v2/ ---"
try {
  $r2 = Invoke-WebRequest -Uri "$baseUrl/index.php?rest_route=/wp/v2/" -Headers $headers -Method GET -ErrorAction Stop
  Write-Host "Plain Permalinks: OK"
} catch {
  Write-Host "Plain Permalinks: FAIL ($($_.Exception.Message))"
}

Write-Host "`n--- TEST 3: User Roles Check ---"
try {
  $me = Invoke-RestMethod -Uri "$baseUrl/wp-json/wp/v2/users/me" -Headers $headers -Method GET -ErrorAction Stop
  Write-Host "User: $($me.name)"
  Write-Host "Roles: $($me.roles -join ', ')"
  Write-Host "Capabilities: $($me.capabilities.Keys -join ', ')"
} catch {
  Write-Host "User Check: FAIL ($($_.Exception.Message))"
}
