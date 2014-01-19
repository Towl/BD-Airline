<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/html_base_part/HtmlPage.interface.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/html_base_part/Doctype.class.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/html_base_part/TagHtml.class.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/html_default/DefaultHead.class.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/html_default/DefaultClientMenu.class.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/html_default/DefaultFoot.class.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/html_base_part/TagBody.class.php');
abstract class AbstractClientHtmlPage implements HtmlPage{
	
	public function display(){
		$this->writeDoctype();
		$this->openHtmlTag();
		$this->writeHead();
		$this->openBodyTag();
		$this->writeMenu();
		$this->writeContent();
		$this->writeFoot();
		$this->closeBodyTag();
		$this->closeHtmlTag();
	}
	
	protected function writeDoctype(){
		$doctype = new Doctype();
		$doctype->insert();
	}
	
	protected function openHtmlTag(){
		$html = new TagHtml();
		$html->addAttr('xmlns',"http://www.w3.org/1999/xhtml");
		$html->addAttr('xml:lang','en');
		$html->addAttr('lang','en');
		$html->open();
	}
	
	protected function writeHead(){
		$head = new DefaultHead();
		$head->insert();
	}
	
	protected function openBodyTag(){
		$body = new TagBody();
		$body->open();
	}
	
	protected function writeMenu(){
		$menu = new DefaultClientMenu();
		$menu->insert();
	}
	
	abstract protected function writeContent();
	
	protected function writeFoot(){
		$foot = new DefaultFoot();
		$foot->insert();
	}
	
	protected function closeBodyTag(){
		$body = new TagBody();
		$body->close();
	}
	
	protected function closeHtmlTag(){
		$html = new TagHtml();
		$html->close();
	}
}
?>