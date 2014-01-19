<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/html_default/AbstractAdminHtmlPage.class.php');
class PageAdminAccueil extends AbstractAdminHtmlPage {

	public function display(){
		parent::display();
	}

	protected function writeContent(){
	?><div class="container">
		<h1>Section administration</h1>
		<h3>Section réservée aux personnels autorisés</h3>
    </div> <!-- /container --><?php
		LineManager::carriageReturnEqual();
	}
}
?>
