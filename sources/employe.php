<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/controleur/PageAdminEmployeControler.class.php');
$controler = new PageAdminEmployeControler();
$pageAdminEmploye = $controler->getPage();
$pageAdminEmploye->display();
?>