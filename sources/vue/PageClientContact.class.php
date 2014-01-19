<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/html_default/AbstractClientHtmlPage.class.php');
class PageClientContact extends AbstractClientHtmlPage {

	public function display(){
		parent::display();
	}

	protected function writeContent(){
	?><div class="container">
		<h1>Contact</h1>
		<h3>Eudier Benoit<h3>
		<h4>Téléphone : 1111111111</h4>
		<p>
		</p>
		<h3>Coutouly Franck</h3>
		<h4>Téléphone : 1111111111</h4>
		<p>
		</p>
    </div> <!-- /container --><?php
		LineManager::carriageReturnEqual();
	}
}
?>
