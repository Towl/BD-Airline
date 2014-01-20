<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/html_default/AbstractAdminHtmlPage.class.php');
class PageAdminDetailEmploye extends AbstractAdminHtmlPage {

	public function display(){
		parent::display();
	}

	protected function writeContent(){
		$employe = $this->getEmployes();
		?><div class="container">
			<div class="row-fluid">
				<div class="span2">
					<img src="ressources/img/photoid.png"/>	
				</div>
				<div class="span6">
					<?php 
					if(!empty($employe['assign'])){
						if($employe['assign'] == "vol"){ 
						// Employé en vol -->
						echo "<h1>Personnel de vol</h1>";
						
						} elseif($employe['assign'] == "sol"){ 
						// Employé au sol-->
						echo "<h1>Personnel au sol</h1><br/>";
						} 
						echo "<b>Prenom :</b> " . $employe['prenom'];
						echo "<br/><b>Nom :</b> " . $employe['nom'];
						echo "<br/><b>Adresse :</b> " . $employe['adresse'];
						echo "<br/><b>Salaire :</b> " . $employe['salaire'];
						echo "<br/><b>Numéro de sécurité sociale :</b> " . $employe['secu'];
					}
					else{ ?>
					<!-- Employe ni vol, ni sol... traitement des mauvaises entrées -->
					<h1> Aucun employé sélectionné </h1>
					<a href="employe.php">Retour à la liste des employés</a>
					<?php }?>
				</div>
				<div class="span4">
					<?php 
					if($employe['assign'] == "vol"){
						if(!empty($employe['heures'])){
							//personnel navigant
							echo "<br/><br/><b>Heures de vol :</b> " . $employe['heures'];
							//Pilote ?
							if(!empty($employe['license'])){
								echo "<br/><b>License de pilote :</b> " . $employe['license'];
							}
						}
					
					}?>
				</div>
			</div>
		</div> <!-- /container -->
		<?php
		LineManager::carriageReturnEqual();
	}
	
	private function getEmployes(){
		$controler = new PageAdminDetailEmployeControler();
		return $controler->getDetailFromGet();
	}
}
?>