<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/modele/DBAdminAccess.class.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/PageAdminDetailEmploye.class.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/controleur/PageControler.interface.php');
class PageAdminDetailEmployeControler implements PageControler {

	public function getPage(){
		return $pageAdminDetailEmploye = new PageAdminDetailEmploye();
	}
	
	public function getDetailFromGet(){
		$employe['assign'] = null;
		if(isset($_GET['id'])){
			$employe['assign'] = "vol";
			// tout d'abord, vérifier que l'id est bien un chiffre et correspond à une entrée dans la bdd
			if(ctype_digit($_GET['id'])){
				$DBAccess = new DBAdminAccess();
				$employes = $DBAccess->find_employeById($_GET['id']);
				if(empty($employes)){
					$employe['assign'] = "";
				}
				else {
					//enfin maintenant nous pouvons recupérer les données
					$employe = array_shift($employes);
					$is_navigant = false;
					$is_pilote = false;
					//est-ce un membre du personnel navigants ?
					$navigants = $DBAccess->find_navigantsById($_GET['id']);
					if(empty($navigants)){
					//on ne fait rien
					} else{
						//personnel navigant
						$is_navigant = true;
						$navigant = array_shift($navigants); //id unique, donc une seule entrée dans le tableau
						$employe['heures'] = $navigant['heures'];
						
						//pi pi pi pilote
						$pilotes = $DBAccess->find_pilotesById($_GET['id']);
						if(empty($pilotes)){}
						else{
							//C'est un pilote
							$is_pilote = true;
							$pilote = array_shift($pilotes);
							$employe['license'] = $pilote['license'];
						}
					}
				}
			}
			else {
				$employe['assign'] = null;
			}
		} 
		else {
			$employe['assign'] = null;
		}
		return $employe;
	}
}
?>