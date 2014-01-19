<?php
include_once('modele/get_aeroports.php');
$aeroports = get_aeroports();
$liaisons_depart = get_liaisons_depart();
$liaisons_dest = get_liaisons_dest();
$liaisons = get_liaisons();
// On effectue du traitement sur les données (contrôleur)
// Ici, on doit surtout sécuriser l'affichage
foreach($aeroports as $cle => $aeroport)
{
    $aeroports[$cle]['code'] = htmlspecialchars($aeroport['code']);
    $aeroports[$cle]['nom'] = nl2br(htmlspecialchars($aeroport['nom']));
	$aeroports[$cle]['pays'] = nl2br(htmlspecialchars($aeroport['pays']));
	$aeroports[$cle]['ville'] = nl2br(htmlspecialchars($aeroport['ville']));
}

include_once('vue/liste_aeroport.php');