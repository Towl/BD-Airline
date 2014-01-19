<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/controleur/PageClientContactControler.class.php');
$controler = new PageClientContactControler();
$pageContactClient = $controler->getPage();
$pageContactClient->display();
?>