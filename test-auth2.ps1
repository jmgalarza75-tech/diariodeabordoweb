
# Alternative: Try auth with cookie session via WP login form
# This tests if we can get a nonce via login

$loginUrl = "https://lightsteelblue-squirrel-826179.hostingersite.com/wp-login.php"
$username = "Ilusion2022"
# Note: This is the APPLICATION password - we need the ADMIN password for cookie auth
# The app password is: eH61 JB17 2fy0 MLwd j9Lb PvTT

# First, let's try XML-RPC
$xmlrpcUrl = "https://lightsteelblue-squirrel-826179.hostingersite.com/xmlrpc.php"

# Test if XML-RPC is enabled
$testBody = '<?xml version="1.0"?><methodCall><methodName>system.listMethods</methodName><params></params></methodCall>'

try {
    $xmlResp = Invoke-WebRequest -Uri $xmlrpcUrl -Method POST -Body $testBody -ContentType "text/xml" -ErrorAction Stop
    Write-Host "XML-RPC available!" -ForegroundColor Green
    Write-Host ($xmlResp.Content.Substring(0, [Math]::Min(500, $xmlResp.Content.Length)))
} catch {
    Write-Host "XML-RPC: $($_.Exception.Message)" -ForegroundColor Yellow
}

# Now try REST API with a different auth approach - query string
$apiUrl = "https://lightsteelblue-squirrel-826179.hostingersite.com/wp-json/wp/v2/users/me"
$pass = "eH61 JB17 2fy0 MLwd j9Lb PvTT"
$b64  = [Convert]::ToBase64String([System.Text.Encoding]::UTF8.GetBytes("${username}:${pass}"))

# Try with different header combinations
$variants = @(
    @{ "Authorization" = "Basic $b64" },
    @{ "Authorization" = "Basic $b64"; "X-WP-Nonce" = "" },
    @{ "PHP_AUTH_USER" = $username; "PHP_AUTH_PW" = $pass }
)

foreach ($h in $variants) {
    try {
        $r = Invoke-RestMethod -Uri $apiUrl -Headers $h -Method GET -ErrorAction Stop
        Write-Host "SUCCESS with headers: $($h.Keys -join ', ')" -ForegroundColor Green
        Write-Host "User: $($r.name)"
        break
    } catch {
        Write-Host "FAIL ($($h.Keys -join ', ')): $($_.Exception.Message)" -ForegroundColor Red
    }
}
