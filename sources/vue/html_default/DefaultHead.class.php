<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/html_base_part/Head.class.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/html_base_part/HtmlPart.interface.php');
class DefaultHead implements HtmlPart{	
	public function insert(){
		$head = new Head();
		$head->addMetaSpecial('<meta charset="UTF-8"/>');
		$head->addMeta('viewport','width=device-width, initial-scale=1.0');
		$head->addMeta('description','airline database manager');
		$head->addMeta('author','Eudier Benoit & Coutouly Franck');
		$head->addLink("ressources/css/bootstrap.min.css",'stylesheet');
		$head->addLink("ressources/css/bootstrap-responsive.min.css",'stylesheet');
		$head->addLink("ressources/css/cssperso.css",'stylesheet');
		$head->setTitle('Airline DataBase Manager');
		$head->insert();
	}
}
?>