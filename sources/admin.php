<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/controleur/PageAdminAccueilControler.class.php');
$controler = new PageAdminAccueilControler();
$pageAdminAccueil = $controler->getPage();
$pageAdminAccueil->display();
?>