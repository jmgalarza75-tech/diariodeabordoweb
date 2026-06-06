
$username = "Ilusion2022"
$password = "Pachanga2022"
$xmlUrl   = "https://diariodeabordo.com/xmlrpc.php"

# XML-RPC request to get pages
$xmlTemplate = @"
<?xml version="1.0"?>
<methodCall>
  <methodName>wp.getPages</methodName>
  <params>
    <param><value><string>0</string></value></param>
    <param><value><string>$username</string></value></param>
    <param><value><string>$password</string></value></param>
  </params>
</methodCall>
"@

Write-Host "Testing XML-RPC on diariodeabordo.com..."
try {
  $response = Invoke-RestMethod -Uri $xmlUrl -Method POST -Body $xmlTemplate -ContentType "text/xml" -ErrorAction Stop
  Write-Host "XML-RPC OK! Found $($response.methodResponse.params.param.value.array.data.value.Count) pages."
  $response.methodResponse.params.param.value.array.data.value | ForEach-Object {
    $p = $_.struct.member | Where-Object { $_.name -in @('page_id', 'title', 'page_status') }
    Write-Host "ID: $($p[0].value.string) | Title: $($p[1].value.string) | Status: $($p[2].value.string)"
  }
} catch {
  Write-Host "XML-RPC FAIL: $($_.Exception.Message)"
}
