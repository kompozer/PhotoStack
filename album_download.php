<?php
require_once "includes/config.class.php";

$gallery = null;

if (get_magic_quotes_gpc()) {
    $gallery = stripslashes($_REQUEST['gallery']);
} else {
    $gallery = $_REQUEST['gallery'];
}
$gallery = rawurldecode($gallery);

if (null === $gallery) {
    die();
}

$config = new configuration();
$galPath = realpath($config->pathto_galleries . $gallery);

if (!file_exists($galPath)) {
    die();
} 

$tmpZip = tempnam('/tmp', 'tempname') . '.zip';

// We dont care about output, but good to have 
$output = null;
exec(escapeshellcmd('zip -r ' . $tmpZip . ' ' . $galPath), $output);

// Output
header("Content-Type: archive/zip");
header("Content-Disposition: attachment; filename=" . basename($galPath) . '.zip');
header("Content-Length: " . filesize($tmpZip));

$fp = fopen($tmpZip, 'r');
echo fpassthru($fp);
fclose($fp);

// Clean up the tmp zip file
exec(escapeshellcmd('rm ' . $tmpZip), $output);
