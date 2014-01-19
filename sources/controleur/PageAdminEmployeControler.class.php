<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/modele/DBAdminAccess.class.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/PageAdminEmploye.class.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/controleur/PageControler.interface.php');
class PageAdminEmployeControler implements PageControler {

	public function getPage(){
		return $pageAdminEmploye = new PageAdminEmploye();
	}
	
	public function getAssignList(){
		$DBAccess = new DBAdminAccess();
		$assigns = $DBAccess->get_assign();
		return $assigns;
	}

	public function formAddEmployeTreatment(){
		$message_info = "Aucune requête d'envoyer !";
		//Traitement du formulaire
		if(isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['adresse']) AND isset($_POST['assign']) AND isset($_POST['salaire']) AND isset($_POST['secu'])){
			//nous traitons les données
			$message_info = "envoyé";
			if(empty($_POST['nom']) OR empty($_POST['prenom']) OR empty($_POST['adresse']) OR empty($_POST['assign']) OR empty($_POST['salaire']) OR empty($_POST['secu'])){
				$message_info = "Remplir toutes les données svp";
			}else {
				$link = mysql_connect('localhost', 'Admin', 'admin');
				//Sécuriser les données
				$nom = mysql_real_escape_string($_POST['nom']);
				$prenom = mysql_real_escape_string($_POST['prenom']);
				$adresse = mysql_real_escape_string($_POST['adresse']);
				$secu = mysql_real_escape_string($_POST['secu']);
				$salaire = mysql_real_escape_string($_POST['salaire']);
				$assign = mysql_real_escape_string($_POST['assign']);
				//vérifier qu'elles sont bien du bon type (int pour secu et salaire, string pour les autres)
				if(ctype_digit($salaire) AND ctype_digit($secu)){	
					$DBAccess = new DBAdminAccess();
					//Maintenant que toutes nos vérifications sont faite, il nous faut un id pour notre nouvelle personne
					$nouveauId = $DBAccess->get_maxIdPersonnes() + 1;
					
					//On peut ajouter la nouvelle entrée dans la bdd
					$DBAccess->create_employe($nouveauId, $nom, $prenom, $adresse, $secu, $assign, $salaire);
				}
				else {
					$message_info = "Salaire et secu sont des nombres entiers";
				}
			}
		}
		return $message_info;
	}

	public function getListEmployes(){
		$DBAccess = new DBAdminAccess();
		$employes = $DBAccess->find_employes();
		return $employes;
	}
	
	public function formDeleteEmployeTreatment(){
		if (isset($_POST['supprimer'])) {
			if(isset($_POST['id'])){
				$DBAccess = new DBAdminAccess();
				$DBAccess->delete_employe($_POST['id']);
			}
		}
	}
}
?>