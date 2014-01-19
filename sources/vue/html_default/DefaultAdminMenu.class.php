<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/html_base_part/Menu.class.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/html_base_part/HtmlPart.interface.php');
class DefaultAdminMenu implements HtmlPart {	
	public function insert(){
		$menu = new Menu();
		$menu->setBrand('Company XYZ','./fronta.php');
		$menu->addItem('Accueil','./admin.php');
		$menu->addItem('Employees','./employe.php');
		$menu->addItem('Avions','./avion.php');
		$menu->addItem('Liaisons','./liaison.php');
		$menu->insert();
	}
}
?>