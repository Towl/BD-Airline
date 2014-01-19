<?php
include_once('modele/fonctions_mysql.php');

$aeroports = get_aeroports();
$liaisons = get_nomLiaisons();

// On effectue du traitement sur les données (contrôleur)
// Ici, on doit surtout sécuriser l'affichage
foreach($aeroports as $cle => $aeroport)
{
    $aeroports[$cle]['code'] = htmlspecialchars($aeroport['code']);
    $aeroports[$cle]['nom'] = nl2br(htmlspecialchars($aeroport['nom']));
	$aeroports[$cle]['pays'] = nl2br(htmlspecialchars($aeroport['pays']));
	$aeroports[$cle]['ville'] = nl2br(htmlspecialchars($aeroport['ville']));
}

include_once('vue/listeaeroport_vue.php');