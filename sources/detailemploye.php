<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/controleur/PageAdminDetailEmployeControler.class.php');
$controler = new PageAdminDetailEmployeControler();
$pageAdminDetailEmploye = $controler->getPage();
$pageAdminDetailEmploye->display();
?>