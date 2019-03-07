<?php
require_once "../app/config.php";

// outputs the stylesheet from the current theme

$theme = $app->get_setting('site.theme');
$style_path = __DIR__ . "/" . $theme . "/css/style.css";

header('Content-type: text/css');
echo file_get_contents($style_path);