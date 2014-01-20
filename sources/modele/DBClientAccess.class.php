<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/modele/DBConnexion.class.php');
class DBClientAccess {

	//MAX id pour la table personne
	public function get_maxIdPersonnes(){
		DBConnexion::clientConnexion();
		$bdd = DBConnexion::getBDD();
		$res = $bdd->query('SELECT max(idpersonne) FROM personnes');
		while($donnees = $res->fetch()){
			$idmax = $donnees['max(idpersonne)'];
			break;
		}
		return $idmax;
	}

	//renvoie une matrice comprenant le nom des aéroports pour chaque liaisons
	// liaisons[0][0]-> liaisons[1][0]
	//				...
	// liaisons[0][n]-> liaisons[1][n]
	public function get_nomLiaisons()
	{
		DBConnexion::clientConnexion();
		$bdd = DBConnexion::getBDD();
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
	
	public function getListLiaisons(){
		DBConnexion::clientConnexion();
		$bdd = DBConnexion::getBDD();
		$req = $bdd->prepare('SELECT * FROM liaisonnom');
		$req->execute();
		$liaisons = $req->fetchAll();
		return $liaisons;
	}
	
	//A UTILISER : VUE AVEC NOM DES LIAISONS, CODE AEROPORT ET ID LIAISON
	public function find_liaisons($aeroport_depart, $aeroport_destin){
		DBConnexion::clientConnexion();
		$bdd = DBConnexion::getBDD();
		$req = $bdd->prepare('SELECT * FROM donnees_accueil WHERE nom_depart = :n1 AND nom_destin = :n2');
		$req->bindParam(':n1', $aeroport_depart);
		$req->bindParam(':n2', $aeroport_destin);
		$req->execute();
		
		$liaisons = $req->fetchAll();
		return $liaisons;
	}

	//RENVOIE LES VOLS D'UNE LIAISON
	public function find_vols($idliaison){
		DBConnexion::clientConnexion();
		$bdd = DBConnexion::getBDD();
		$req = $bdd->prepare('SELECT * FROM vol WHERE idliaison = :id');
		$req->bindParam(':id', $idliaison);
		$req->execute();
		$vols = $req->fetchAll();
		return $vols;
	}
	
	public function find_allvols(){
		DBConnexion::clientConnexion();
		$bdd = DBConnexion::getBDD();
		$req = $bdd->prepare('SELECT * FROM vol');
		$req->execute();
		$vols = $req->fetchAll();
		return $vols;
	}

	//GET POUR LES DIFFERENTES TABLES
	//aeroport
	public function get_aeroports()
	{   
		DBConnexion::clientConnexion();
		$bdd = DBConnexion::getBDD();
		$req = $bdd->prepare('SELECT * FROM aeroport');
		$req->execute();
		return $req->fetchAll();
	}

	public function get_aeroportsName(){
		DBConnexion::clientConnexion();
		$bdd = DBConnexion::getBDD();
		$req = $bdd->prepare('SELECT nom FROM aeroport');
		$req->execute();
		$array = $req->fetchAll();
		$aeroports = array(20);
		$i = 0;
		foreach($array as $row){
			$aeroports[$i] = $row[0];
			$i = $i + 1;
		}
		return $aeroports;
	}

	public function get_aeroportByNom($nom){
		DBConnexion::clientConnexion();
		$bdd = DBConnexion::getBDD();
		$req = $bdd->prepare('SELECT * From aeroport WHERE nom = ?');
		$req->execute(array($nom));
		return $req->fetchAll();
	}

	public function get_aeroportById($id){
		DBConnexion::clientConnexion();
		$bdd = DBConnexion::getBDD();
		$req = $bdd->prepare('SELECT * From aeroport WHERE idaeroport = ?');
		$req->execute(array($id));
		$aeroports = $req->fetchAll();
		return $aeroports;
	}
	
	public function get_periodList(){
		DBConnexion::clientConnexion();
		$bdd = DBConnexion::getBDD();
		$req = $bdd->prepare('SELECT * From periodes');
		$req->execute();
		return $req->fetchAll();
	}
	
	public function getListVols(){
		DBConnexion::clientConnexion();
		$bdd = DBConnexion::getBDD();
		$req = $bdd->prepare('SELECT * From volnom');
		$req->execute();
		return $req->fetchAll();
	}
}
?>