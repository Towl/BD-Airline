<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/modele/DBAdminAccess.class.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/PageAdminLiaison.class.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/controleur/PageControler.interface.php');
class PageAdminLiaisonControler implements PageControler {

	public function getPage(){
		return $pageAdminLiaison = new PageAdminLiaison();
	}
	
	public function getAeroportList(){
		$DBAccess = new DBAdminAccess();
		$aeroports = $DBAccess->get_aeroports();
		return $aeroports;
	}

	public function formAddLiaisonTreatment(){
		$message_info = "Aucune requête d'envoyer !";
		//Traitement du formulaire
		if(isset($_POST['idDep']) AND isset($_POST['idArr'])){
			//nous traitons les données
			$message_info = "envoyé";
			if($_POST['idDep'] == $_POST['idArr']){
				$message_info = "Les deux aéroports doivent être différents";
			}else {
				$link = mysql_connect('localhost', 'Admin', 'admin');
				//Sécuriser les données
				$idaeroDep = mysql_real_escape_string($_POST['idDep']);
				$idaeroArr = mysql_real_escape_string($_POST['idArr']);
				
				$DBAccess = new DBAdminAccess();
				
				//On peut ajouter la nouvelle entrée dans la bdd
				$DBAccess->create_liaison($idaeroDep,$idaeroArr);
			}
		}
		return $message_info;
	}

	public function getListLiaisons(){
		$DBAccess = new DBAdminAccess();
		$liaisons = $DBAccess->getListLiaisons();
		return $liaisons;
	}
	
	public function formDeleteLiaisonTreatment(){
		if (isset($_POST['supprimer'])) {
			if(isset($_POST['id'])){
				$DBAccess = new DBAdminAccess();
				$DBAccess->delete_liaison($_POST['id']);
			}
		}
	}
}
?>