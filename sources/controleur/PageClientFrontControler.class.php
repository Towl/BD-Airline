<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/PageClientFront.class.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/controleur/PageControler.interface.php');
class PageClientFrontControler implements PageControler {
	
	public function getPage(){
		return $pageClientFront = new PageClientFront();
	}
}
?>