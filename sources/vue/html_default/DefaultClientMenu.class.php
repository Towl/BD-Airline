<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/html_base_part/Menu.class.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/html_base_part/HtmlPart.interface.php');
class DefaultClientMenu implements HtmlPart {	
	public function insert(){
		$menu = new Menu();
		$menu->setBrand('Company XYZ','./frontc.php');
		$menu->addItem('Accueil','./accueil.php');
		$menu->addItem('Contact','./contact.php');
		$menu->insert();
	}
}
?>