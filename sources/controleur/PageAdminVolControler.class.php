<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/modele/DBAdminAccess.class.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/PageAdminVol.class.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/controleur/PageControler.interface.php');
class PageAdminVolControler implements PageControler {

	public function getPage(){
		return $pageAdminVol = new PageAdminVol();
	}
	
	public function getAvionList(){
		$DBAccess = new DBAdminAccess();
		$avions = $DBAccess->find_avions();
		return $avions;
	}
	
	public function getLiaisonList(){
		$DBAccess = new DBAdminAccess();
		$liaisons = $DBAccess->getListLiaisons();
		return $liaisons;
	}
	
	public function getPeriodList(){
		$DBAccess = new DBAdminAccess();
		$periods = $DBAccess->get_periodList();
		return $periods;
	}

	public function formAddVolTreatment(){
		$message_info = "Aucune requête d'envoyer !";
		//Traitement du formulaire
		if(isset($_POST['avion']) AND isset($_POST['liaison']) AND isset($_POST['period']) AND isset($_POST['heureDep']) AND isset($_POST['heureArr'])){
			//nous traitons les données
			$message_info = "envoyé";
			if(empty($_POST['avion']) OR empty($_POST['liaison']) OR empty($_POST['period']) OR empty($_POST['heureDep']) OR empty($_POST['heureArr'])){
				$message_info = "Remplir toutes les données svp";
			}else {
				$link = mysql_connect('localhost', 'Admin', 'admin');
				$vol = array();
				//Sécuriser les données
				$vol['avion'] = mysql_real_escape_string($_POST['avion']);
				$vol['liaison'] = mysql_real_escape_string($_POST['liaison']);
				$vol['period'] = mysql_real_escape_string($_POST['period']);
				$vol['heureDep'] = mysql_real_escape_string($_POST['heureDep']);
				$vol['heureArr'] = mysql_real_escape_string($_POST['heureArr']);
				
				$DBAccess = new DBAdminAccess();
				
				//On peut ajouter la nouvelle entrée dans la bdd
				$DBAccess->create_vol($vol);
			}
		}
		return $message_info;
	}

	public function getListVols(){
		$DBAccess = new DBAdminAccess();
		$vols = $DBAccess->getListVols();
		return $vols;
	}
	
	public function formDeleteVolTreatment(){
		if (isset($_POST['supprimer'])) {
			if(isset($_POST['id'])){
				$DBAccess = new DBAdminAccess();
				$DBAccess->delete_vol($_POST['id']);
			}
		}
	}
}
?>