<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/controleur/PageClientFrontControler.class.php');
$controler = new PageClientFrontControler();
$pageClientFront = $controler->getPage();
$pageClientFront->display();
?>