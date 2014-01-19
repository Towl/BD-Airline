<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/controleur/PageAdminFrontControler.class.php');
$controler = new PageAdminFrontControler();
$pageClientFront = $controler->getPage();
$pageClientFront->display();
?>