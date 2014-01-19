<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/html_default/AbstractAdminHtmlPage.class.php');
class PageAdminFront extends AbstractAdminHtmlPage {

	public function display(){
		parent::display();
	}

	protected function writeContent(){
	?><div class="container">
		<h1>Front</h1>
		</div> <!-- /container --><?php
		LineManager::carriageReturnEqual();
	}
}
?>
