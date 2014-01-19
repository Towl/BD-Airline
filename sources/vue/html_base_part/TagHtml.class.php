<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/html_base_part/AbstractHtmlTag.class.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/LineManager.class.php');
class TagHtml extends AbstractHtmlTag {
	public function __construct(){
		parent::setTag('html');
	}
}
?>