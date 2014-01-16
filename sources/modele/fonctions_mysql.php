<?php
/*
Fichier qui comprend les fonctions php en relation avec la base de données
Ce sont pour la plupart des fonctions d'accès aux données, avec des critères ou non.
*/

//MAX id pour la table personne
function get_maxIdPersonnes(){
	global $bdd;
	
	$res = $bdd->query('SELECT max(idpersonne) FROM personnes');
	while($donnees = $res->fetch()){
		$idmax = $donnees['max(idpersonne)'];
		break;
	}
	
	return $idmax;
}

//ajoute un nouvel employé dans la base de données
function create_employe($id, $nom, $prenom, $adresse, $secu, $assign, $salaire){
	//3 tables sont utilisées ici : personnes (nom, prenom, adresse), candidature (secu) et employe (assign, salaire)
	//A cause des FK, ils faut d'abord créer une entrée dans personnes, puis candidature, puis employe...
	global $bdd;
	$req1 = $bdd->prepare('INSERT INTO personnes(idpersonne, nom, prenom, adresse) VALUES (:id, :nom, :prenom, :adresse)');
	$req1->bindParam(':id', $id);
	$req1->bindParam(':nom', $nom);
	$req1->bindParam(':prenom', $prenom);
	$req1->bindParam(':adresse', $adresse);
	$req1->execute();
	
	$req2 = $bdd->prepare('INSERT INTO candidatures(idcandidat, secu) VALUES (:id, :secu)');
	$req2->bindParam(':id', $id);
	$req2->bindParam(':secu', $secu);
	$req2->execute();
	
	$req3 = $bdd->prepare('INSERT INTO employes(idemploye, assign, salaire) VALUES (:id, :assign, :salaire)');
	$req3->bindParam(':id', $id);
	$req3->bindParam(':assign', $assign);
	$req3->bindParam(':salaire', $salaire);
	$req3->execute();
}
//renvoie une matrice comprenant le nom des aéroports pour chaque liaisons
// liaisons[0][0]-> liaisons[1][0]
//				...
// liaisons[0][n]-> liaisons[1][n]
function get_nomLiaisons()
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
//A UTILISER : VUE AVEC NOM DES LIAISONS, CODE AEROPORT ET ID LIAISON
function find_liaisons($aeroport_depart, $aeroport_destin){
	global $bdd;
	$req = $bdd->prepare('SELECT * FROM donnees_accueil WHERE nom_depart = :n1 AND nom_destin = :n2');
	$req->bindParam(':n1', $aeroport_depart);
	$req->bindParam(':n2', $aeroport_destin);
	$req->execute();
	
	$liaisons = $req->fetchAll();
	return $liaisons;
}
// Renvoie une liaison avec un aeroport de départ et d'arrivée en entrée
/*function find_liaisons($iddepart, $idarrivee){
	global $bdd;
	//TODO Vérifier que $depart et $arrivee sont bien des INT
	$req = $bdd->prepare('SELECT * FROM liaisons WHERE idaeroport_origin = :id1 AND idaeroport_destin = :id2');
	$req->bindParam(':id1', $iddepart);
	$req->bindParam(':id2', $idarrivee);
	$req->execute();
	
	$liaisons = $req->fetchAll();
	return $liaisons;
}*/

//RENVOIE LES VOLS D'UNE LIAISON
function find_vols($idliaison){
	global $bdd;
	$req = $bdd->prepare('SELECT * FROM vol WHERE idliaison = :id');
	$req->bindParam(':id', $idliaison);
	$req->execute();
	
	$vols = $req->fetchAll();
	return $vols;
}

//LISTE DES EMPLOYES : UTILISE UNE VUE
function find_employes(){
	//la vue utilise trois tables (employé, personne et candidature)
	global $bdd;
	$req = $bdd->prepare('SELECT * FROM donneeemployes');
	$req->execute();
	
	$employes = $req->fetchAll();
	return $employes;
}

//GET POUR LES DIFFERENTES TABLES
//aeroport
function get_aeroports()
{   
	global $bdd;
    $req = $bdd->prepare('SELECT * FROM aeroport');
    $req->execute();
    $aeroports = $req->fetchAll();  
    return $aeroports;
}

function get_aeroportByNom($nom){
	global $bdd;
	
	$req = $bdd->prepare('SELECT * From aeroport WHERE nom = ?');
	$req->execute(array($nom));
	$aeroports = $req->fetchAll();
	
	return $aeroports;
}
function get_aeroportById($id){
	global $bdd;
	
	$req = $bdd->prepare('SELECT * From aeroport WHERE idaeroport = ?');
	$req->execute(array($id));
	$aeroports = $req->fetchAll();
	
	return $aeroports;
}
//assignements
function get_assign()
{   
	global $bdd;
    $req = $bdd->prepare('SELECT * FROM assignements');
    $req->execute();
    $assigns = $req->fetchAll();  
    return $assigns;
}