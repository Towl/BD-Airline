<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/modele/DBConnexion.class.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/modele/DBClientAccess.class.php');
class DBAdminAccess extends DBClientAccess {
	//ajoute un nouvel employé dans la base de données
	public function create_employe($id, $nom, $prenom, $adresse, $secu, $assign, $salaire){
		//3 tables sont utilisées ici : personnes (nom, prenom, adresse), candidature (secu) et employe (assign, salaire)
		//A cause des FK, ils faut d'abord créer une entrée dans personnes, puis candidature, puis employe...
		DBConnexion::adminConnexion();
		$bdd = DBConnexion::getBDD();
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
	
	//LISTE DES EMPLOYES : UTILISE UNE VUE
	public function find_employes(){
		//la vue utilise trois tables (employé, personne et candidature)
		DBConnexion::adminConnexion();
		$bdd = DBConnexion::getBDD();
		$req = $bdd->prepare('SELECT * FROM donneeemployes');
		$req->execute();
		$employes = $req->fetchAll();
		return $employes;
	}
	
	public function find_employeById($id){
		DBConnexion::adminConnexion();
		$bdd = DBConnexion::getBDD();
		$req = $bdd->prepare('SELECT * FROM donneeemployes WHERE id = '.$id);
		$req->execute();
		$employes = $req->fetchAll();
		return $employes;
	}
	
	public function find_navigantsById($id){
		DBConnexion::adminConnexion();
		$bdd = DBConnexion::getBDD();
		$req = $bdd->prepare('SELECT * FROM navigants WHERE idnavigants = '.$id);
		$req->execute();
		$employes = $req->fetchAll();
		return $employes;
	}
	
	public function find_pilotesById($id){
		DBConnexion::adminConnexion();
		$bdd = DBConnexion::getBDD();
		$req = $bdd->prepare('SELECT * FROM pilotes WHERE idpilote = '.$id);
		$req->execute();
		$employes = $req->fetchAll();
		return $employes;
	}
	
	//assignements
	public function get_assign()
	{   
		DBConnexion::adminConnexion();
		$bdd = DBConnexion::getBDD();
		$req = $bdd->prepare('SELECT * FROM assignements');
		$req->execute();
		$assigns = $req->fetchAll();  
		return $assigns;
	}
	
	public function delete_employe($id){
		DBConnexion::adminConnexion();
		$bdd = DBConnexion::getBDD();
		$req = $bdd->prepare('DELETE FROM employes WHERE idemploye = '.$id);
		$req->execute();
	}
	
	public function getModeleList(){
		DBConnexion::adminConnexion();
		$bdd = DBConnexion::getBDD();
		$req = $bdd->prepare('SELECT * FROM modeles');
		$req->execute();
		$modeles = $req->fetchAll();  
		return $modeles;
	}
	
	public function create_avion($modele){
		DBConnexion::adminConnexion();
		$bdd = DBConnexion::getBDD();
		$req = $bdd->prepare('INSERT INTO avions(immatricule,modele) VALUES (NULL, :modele)');
		$req->bindParam(':modele', $modele);
		$req->execute();
	}
	
	public function find_avions(){
		DBConnexion::adminConnexion();
		$bdd = DBConnexion::getBDD();
		$req = $bdd->prepare('SELECT * FROM avions');
		$req->execute();
		$avions = $req->fetchAll();  
		return $avions;
	}
	
	public function delete_avion($immatricule){
		DBConnexion::adminConnexion();
		$bdd = DBConnexion::getBDD();
		$req = $bdd->prepare('DELETE FROM avions WHERE immatricule = '.$immatricule);
		$req->execute();
	}
	
	public function create_liaison($id1,$id2){
		DBConnexion::adminConnexion();
		$bdd = DBConnexion::getBDD();
		$req = $bdd->prepare('INSERT INTO liaisons(idliaison,idaeroport_origin,idaeroport_destin) VALUES (NULL,:id1,:id2)');
		$req->bindParam(':id1',$id1);
		$req->bindParam(':id2',$id2);
		$req->execute();
	}
	
	public function delete_liaison($idLiaison){
		DBConnexion::adminConnexion();
		$bdd = DBConnexion::getBDD();
		$req = $bdd->prepare('DELETE FROM liaisons WHERE idliaison = '.$idLiaison);
		$req->execute();
	}
	
	public function create_vol($vol){
		DBConnexion::adminConnexion();
		$bdd = DBConnexion::getBDD();
		$req = $bdd->prepare('INSERT INTO vol(idvol,avions_immatricule,idliaison,idperiode,hdepart,harrivee) VALUES (NULL,:avion,:liaison,:period,:hdep,:harr)');
		$req->bindParam(':avion',$vol['avion']);
		$req->bindParam(':liaison',$vol['liaison']);
		$req->bindParam(':period',$vol['period']);
		$req->bindParam(':hdep',$vol['heureDep']);
		$req->bindParam(':harr',$vol['heureArr']);
		$req->execute();
	}
	
	public function delete_vol($vol){
		DBConnexion::adminConnexion();
		$bdd = DBConnexion::getBDD();
		$req = $bdd->prepare('DELETE FROM vol WHERE idvol = '.$vol);
		$req->execute();
	}
}
?>