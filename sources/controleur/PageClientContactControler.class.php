<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/PageClientContact.class.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/controleur/PageControler.interface.php');
class PageClientContactControler implements PageControler {
	
	public function getPage(){
		return $pageClientContact = new PageClientContact();
	}
}
?>