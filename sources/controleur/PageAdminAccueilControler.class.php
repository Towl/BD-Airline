<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/PageAdminAccueil.class.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/controleur/PageControler.interface.php');
class PageAdminAccueilControler implements PageControler {
	
	public function getPage(){
		return $pageAdminAccueil = new PageAdminAccueil();
	}
}
?>