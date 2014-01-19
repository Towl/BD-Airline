<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/PageAdminFront.class.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/controleur/PageControler.interface.php');
class PageAdminFrontControler implements PageControler {
	
	public function getPage(){
		return $pageAdminFront = new PageAdminFront();
	}
}
?>