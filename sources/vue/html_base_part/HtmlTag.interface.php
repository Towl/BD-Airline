<?php
interface HtmlTag {
	public function setTag($tag);
	public function addAttr($attr,$value);
	public function open();
	public function close();
}
?>