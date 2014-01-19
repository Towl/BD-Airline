<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/html_base_part/HtmlPart.interface.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/LineManager.class.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/modele/PageChecker.class.php');
class Menu implements HtmlPart{
	
	private $brandName = null;
	private $brandLink = null;
	private $items = array(); // Le nombre d'item du menu est limité à 5 par défaut.
	private $tab = 0;
	
	
	public function setBrand($name,$link){
		$this->brandName = $name;
		$this->brandLink = $link;
	}
	
	public function addItem($itemName,$link){
		$this->items[$itemName] = $link;
	}

	public function insert(){
		$this->insertHead();
		$this->insertItems();
		$this->insertFoot();
	}
	
	private function insertHead(){
		$this->insertOpenGlobalDivs();
		$this->insertBrandButton();
		$this->insertOpenItemList();
	}
	
	private function insertOpenGlobalDivs(){
		echo '<div class="navbar navbar-inverse navbar-fixed-top">';
		LineManager::carriageReturnMore();
		echo '<div class="navbar-inner">';
		LineManager::carriageReturnMore();
		echo '<div class="container">';
		LineManager::carriageReturnMore();
	}
	
	private function insertBrandButton(){
		if($this->brandLink != null && $this->brandName != null){
			echo '<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">';
			LineManager::carriageReturnMore();
			echo '<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>';
			LineManager::carriageReturnLess();
			echo '</button>';
			LineManager::carriageReturnEqual();
			echo '<a class="brand" href="'.$this->brandLink.'">'.$this->brandName.'</a>';
			LineManager::carriageReturnEqual();
		}
	}
	
	private function insertOpenItemList(){
		echo '<div class="nav-collapse collapse">';
		LineManager::carriageReturnMore();
		echo '<ul class="nav">';
		LineManager::carriageReturnMore();
	}
	
	private function insertItems(){
		foreach($this->items as $name => $link){
			echo '<li';
			if(PageChecker::linkIsCurrent($link)){
				echo ' class="active"';
			}
			echo('><a href="'.$link.'">'.$name.'</a></li>');
			LineManager::carriageReturnEqual();
		}
		LineManager::carriageReturnLess();
	}
	
	private function insertFoot(){
		echo '</ul>';
		LineManager::carriageReturnLess();
		for($i=0;$i<4;$i++){
			echo '</div>';
			LineManager::carriageReturnLess();
		}
	}
}
?>