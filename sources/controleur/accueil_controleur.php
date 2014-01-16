<?php
include_once('modele/fonctions_mysql.php');

$aeroports = get_aeroports();

if(isset($_POST['aeroport_depart']) AND isset($_POST['aeroport_destin'])){
	$existe_liaison = false;
	
	$aeroport_depart = mysql_real_escape_string($_POST['aeroport_depart']);
	$aeroport_destin = mysql_real_escape_string($_POST['aeroport_destin']);
	
	// on recherche une liaison entre les deux aéroports
	$liaisons = find_liaisons($aeroport_depart, $aeroport_destin);
	
	//vérification vide ou non vide
	if(empty($liaisons)){
		$hehe = "Pas de liaisons.";
	}
	else{			
		//On recupère les vols pour la liaison
		foreach($liaisons as $liaison){
			$hehe = 'Il existe une liaison entre ces deux aéroports, son id est : ' . $liaison['idliaison'];
			$vols = find_vols($liaison['idliaison']);
			
			$nom_aeroport_depart = $liaison['ville_depart'];
			$nom_aeroport_destin = $liaison['ville_destin'];
			$code_aeroport_depart = $liaison['code_depart'];
			$code_aeroport_destin = $liaison['code_destin'];
			
			if(empty($vols)){
				$hehe = $hehe . 'Pas de vol';
			}
			else {
				$hehe = $hehe . " \n Il existe des vols pour cette liaison.";
			}
		}
	}
}
// On effectue du traitement sur les données (contrôleur)
// Ici, on doit surtout sécuriser l'affichage
foreach($aeroports as $cle => $aeroport)
{
    $aeroports[$cle]['code'] = htmlspecialchars($aeroport['code']);
    $aeroports[$cle]['nom'] = nl2br(htmlspecialchars($aeroport['nom']));
	$aeroports[$cle]['pays'] = nl2br(htmlspecialchars($aeroport['pays']));
	$aeroports[$cle]['ville'] = nl2br(htmlspecialchars($aeroport['ville']));
}

include_once('vue/accueil_vue.php');