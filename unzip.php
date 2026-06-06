<?php
$zipFile = 'diariodeabordo_FINAL.zip';
$zip = new ZipArchive;
if ($zip->open($zipFile) === TRUE) {
    if ($zip->extractTo('./')) {
        echo 'SUCCESS: Archive extracted successfully!';
    } else {
        echo 'FAIL: Could not extract files. Check folder permissions.';
    }
    $zip->close();
} else {
    echo 'FAIL: Could not open ZIP file. Make sure diariodeabordo_FINAL.zip is in public_html.';
}
?>
