
$username = "Ilusion2022"
$apiBase  = "https://lightsteelblue-squirrel-826179.hostingersite.com/wp-json/wp/v2"

function Test-WPAuth {
    param([string]$user, [string]$pass, [string]$label)
    $creds   = "${user}:${pass}"
    $b64     = [Convert]::ToBase64String([System.Text.Encoding]::UTF8.GetBytes($creds))
    $headers = @{ "Authorization" = "Basic $b64"; "Content-Type" = "application/json" }
    try {
        $me = Invoke-RestMethod -Uri "$apiBase/users/me" -Headers $headers -Method GET -ErrorAction Stop
        Write-Host "[OK] $label - user: $($me.name) roles: $($me.roles -join ',')" -ForegroundColor Green
        return $headers
    } catch {
        Write-Host "[FAIL] $label - $($_.Exception.Message)" -ForegroundColor Red
        return $null
    }
}

# Attempt 1: with spaces
$h1 = Test-WPAuth -user $username -pass "eH61 JB17 2fy0 MLwd j9Lb PvTT" -label "With spaces"

# Attempt 2: without spaces  
$h2 = Test-WPAuth -user $username -pass "eH61JB172fy0MLwdj9LbPvTT" -label "No spaces"

# Attempt 3: lowercase username
$h3 = Test-WPAuth -user "ilusion2022" -pass "eH61 JB17 2fy0 MLwd j9Lb PvTT" -label "Lowercase + spaces"

# Attempt 4: try as admin
$h4 = Test-WPAuth -user "admin" -pass "eH61 JB17 2fy0 MLwd j9Lb PvTT" -label "admin + spaces"

Write-Host "`nDone." -ForegroundColor Cyan
