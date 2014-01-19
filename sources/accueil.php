<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/controleur/PageClientAccueilControler.class.php');
$controler = new PageClientAccueilControler();
$pageAccueilClient = $controler->getPage();
$pageAccueilClient->display();
?>