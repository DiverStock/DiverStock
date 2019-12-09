<?php
session_start();
define("FOLD_PROY", $_SERVER["CONTEXT_DOCUMENT_ROOT"]."/diverstock/");
define("FOLDER_TEMPLATE",FOLD_PROY."template/");
define("URL_PROY","/diverstock/");
define("URL_CSS",URL_PROY."assets/css/");
define("URL_FONTS",URL_PROY."assets/fonts/");
define("URL_IMG",URL_PROY."assets/img/");
define("URL_JS",URL_PROY."assets/js/");
include (FOLD_PROY."app/funtions/session.php");
?>