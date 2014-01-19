<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/html_base_part/HtmlPart.interface.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/LineManager.class.php');

class Doctype implements HtmlPart{
	
	private $content = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
	
	public function insert(){
		echo $this->content."\n";
		LineManager::carriageReturnEqual();
	}
}
?>