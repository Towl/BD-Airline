<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/controleur/PageAdminAvionControler.class.php');
$controler = new PageAdminAvionControler();
$pageAdminAvion = $controler->getPage();
$pageAdminAvion->display();
?>