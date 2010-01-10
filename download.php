<?php
require_once "includes/config.class.php";

$gallery = null;
$image = null;

if(get_magic_quotes_gpc()) {
    $gallery = stripslashes($_REQUEST['gallery']);
    $image = stripslashes($_REQUEST['image']);
} else {
    $gallery = $_REQUEST['gallery'];
    $image = $_REQUEST['image'];
}

if (null === $gallery || null === $image) {
    die();
}

$config = new configuration();
$galPath = realpath($config->pathto_galleries);
$imgPath = realpath($config->pathto_galleries . $gallery . '/' . $image);

if (!file_exists($imgPath)) {
    die();
}

header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=\"$image\"");
readfile($imgPath);
?>