<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/controleur/PageAdminLiaisonControler.class.php');
$controler = new PageAdminLiaisonControler();
$pageAdminLiaison = $controler->getPage();
$pageAdminLiaison->display();
?>