<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/html_base_part/HtmlTag.interface.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/LineManager.class.php');
abstract class AbstractHtmlTag implements HtmlTag{
	private $tag = null;
	private $attributes = array();
	
	public function setTag($tagName){
		$this->tag = $tagName;
	}
	
	public function addAttr($attr,$value){
		$this->attributes[$attr] = $value;
	}
	
	public function emptyTag(){
		echo('<'.$this->tag);
		$this->writeAttributes();
		echo('/>');
		LineManager::carriageReturnEqual();
	}
	
	private function writeAttributes(){
		if(!empty($this->attributes)){
			foreach($this->attributes as $attr => $value){
				echo(' '.$attr.'="'.$value.'"');
			}
		}
	}
	
	public function open(){
		echo('<'.$this->tag);
		$this->writeAttributes();
		echo('>');
		LineManager::carriageReturnMore();
	}
	
	public function close(){
		echo('</'.$this->tag.'>');
		LineManager::carriageReturnEqual();
	}
}
?>