<?php
namespace PHPMaker2019\spp_prj;

// Set up relative path
$RELATIVE_PATH = "../";
$ROOT_RELATIVE_PATH = "../";
include_once $RELATIVE_PATH . "autoload.php";
if (file_exists($RELATIVE_PATH . "rautoload.php"))
	include_once $RELATIVE_PATH . "rautoload.php";

// Create language object
$Language = new Language();
$Api = new Api();
$Api->run();
?>