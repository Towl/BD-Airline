<?php
include_once('modele/fonctions_mysql.php');

$type_employe = "rien";
if(isset($_GET['id'])){
	$type_employe = "vol";
	// tout d'abord, vérifier que l'id est bien un chiffre et correspond à une entrée dans la bdd
	if(ctype_digit($_GET['id'])){
		$employes = find_employeById($_GET['id']);
		if(empty($employes)){
			$type_employe = "";
		}
		else {
			//enfin maintenant nous pouvons recupérer les données
			$employe = array_shift($employes);
			$type_employe = $employe['assign'];
			
			$nom = $employe['nom'];
			$prenom = $employe['prenom'];
			$adresse = $employe['adresse'];
			$salaire = $employe['salaire'];
			$secu = $employe['secu'];
			
			$is_navigant = false;
			$is_pilote = false;
			//est-ce un membre du personnel navigants ?
			$navigants = get_navigantsById($_GET['id']);
			if(empty($navigants)){
			//on ne fait rien
			} else{
				//personnel navigant
				$is_navigant = true;
				$navigant = array_shift($navigants); //id unique, donc une seule entrée dans le tableau
				$heures = $navigant['heures'];
				
				//pi pi pi pilote
				$pilotes = get_pilotesById($_GET['id']);
				if(empty($pilotes)){}
				else{
					//C'est un pilote
					$is_pilote = true;
					$pilote = array_shift($pilotes);
					$license = $pilote['license'];
				}
			}
		}
	}
	else {
		$type_employe = "";
	}
} 
else {
	$type_employe = "rien";
}
include_once('vue/admin/detailemploye_vue.php');