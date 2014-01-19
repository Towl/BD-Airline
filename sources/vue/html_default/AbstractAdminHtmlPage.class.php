<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/html_default/AbstractClientHtmlPage.class.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/html_default/DefaultAdminMenu.class.php');
abstract class AbstractAdminHtmlPage extends AbstractClientHtmlPage{
	
	protected function writeMenu(){
		$menu = new DefaultAdminMenu();
		$menu->insert();
	}
}
?>