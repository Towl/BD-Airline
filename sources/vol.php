<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/controleur/PageAdminVolControler.class.php');
$controler = new PageAdminVolControler();
$pageAdminVol = $controler->getPage();
$pageAdminVol->display();
?>