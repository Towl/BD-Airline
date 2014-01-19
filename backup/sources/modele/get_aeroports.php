<?php
function get_aeroports()
{
    global $bdd;
    $req = $bdd->prepare('SELECT code, nom, pays, ville FROM aeroport');
    $req->execute();
    $aeroports = $req->fetchAll();  
    return $aeroports;
}
function get_liaisons()
{
	global $bdd;
	
	$liaisons = array();
	$aeroport_depart = array();
	$aeroport_dest = array();
	
	$reponse = $bdd->query('SELECT idaeroport_origin, idaeroport_destin FROM liaisons');
	while($donnees = $reponse->fetch())
	{
		$req = $bdd->prepare('SELECT nom FROM aeroport WHERE idaeroport = :id');
		$req->bindParam(':id', $donnees['idaeroport_origin']);
		$req->execute();
		
		$req2 = $bdd->prepare('SELECT nom FROM aeroport WHERE idaeroport = :id');
		$req2->bindParam(':id', $donnees['idaeroport_destin']);
		$req2->execute();
		
		while($donnees1 = $req->fetch())
		{
			$aeroport_depart[] = $donnees1['nom'];
		}
		//$aeroport_depart[] = $donnees['idaeroport_origin'];
		$req->closeCursor();
		
		while($donnees2 = $req2->fetch())
		{
			$aeroport_dest[] = $donnees2['nom'];
		}
		$req2->closeCursor();
	}
	
	$reponse->closeCursor();
	$liaisons[0] = $aeroport_depart;
	$liaisons[1] = $aeroport_dest;
	return $liaisons;
}
//renvoie un tableau à deux colonnes avec l'aéroport de départ et celui d'arrivée
function get_liaisons_depart()
{
	global $bdd;
	
	$aeroport_depart = array();
	
	$reponse = $bdd->query('SELECT idaeroport_origin, idaeroport_destin FROM liaisons');
	while($donnees = $reponse->fetch())
	{
		$req = $bdd->prepare('SELECT nom FROM aeroport WHERE idaeroport = :id');
		$req->bindParam(':id', $donnees['idaeroport_origin']);
		//id unique donc normalement req1 et req2 contiennent un aeroport chacun
		$req->execute();
		
		while($donnees1 = $req->fetch())
		{
			$aeroport_depart[] = $donnees1['nom'];
		}
		//$aeroport_depart[] = $donnees['idaeroport_origin'];
		$req->closeCursor();
	}
	
	$reponse->closeCursor();	
	return $aeroport_depart;
}

function get_liaisons_dest()
{
	global $bdd;

	$aeroport_dest = array();
	
	$reponse = $bdd->query('SELECT idaeroport_origin, idaeroport_destin FROM liaisons');
	while($donnees = $reponse->fetch())
	{
		$req = $bdd->prepare('SELECT nom FROM aeroport WHERE id = ?');
		$req->execute(array($donnees['idaeroport_destin']));
		
		while($donnees1 = $req->fetch())
		{
			$aeroport_dest[] = $donnees1['nom'];
		}
		$req->closeCursor();
	}
	
	$reponse->closeCursor();
	
	return $aeroport_dest;
}