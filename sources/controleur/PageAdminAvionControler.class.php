<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/modele/DBAdminAccess.class.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/PageAdminAvion.class.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/controleur/PageControler.interface.php');
class PageAdminAvionControler implements PageControler {

	public function getPage(){
		return $pageAdminAvion = new PageAdminAvion();
	}
	
	public function getModeleList(){
		$DBAccess = new DBAdminAccess();
		$modeles = $DBAccess->getModeleList();
		return $modeles;
	}

	public function formAddAvionTreatment(){
		$message_info = "Aucune requête d'envoyer !";
		//Traitement du formulaire
		if(isset($_POST['modele'])){
			//nous traitons les données
			$message_info = "envoyé";
			if(empty($_POST['modele'])){
				$message_info = "Remplir toutes les données svp";
			}else {
				$link = mysql_connect('localhost', 'Admin', 'admin');
				//Sécuriser les données
				$modele = mysql_real_escape_string($_POST['modele']);
				
				$DBAccess = new DBAdminAccess();
				
				//On peut ajouter la nouvelle entrée dans la bdd
				$DBAccess->create_avion($modele);
			}
		}
		return $message_info;
	}

	public function getListAvions(){
		$DBAccess = new DBAdminAccess();
		$avions = $DBAccess->find_avions();
		return $avions;
	}
	
	public function formDeleteAvionTreatment(){
		if (isset($_POST['supprimer'])) {
			if(isset($_POST['id'])){
				$DBAccess = new DBAdminAccess();
				$DBAccess->delete_avion($_POST['id']);
			}
		}
	}
}
?>