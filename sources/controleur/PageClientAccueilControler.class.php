<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/modele/DBClientAccess.class.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/PageClientAccueil.class.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/controleur/PageControler.interface.php');
class PageClientAccueilControler implements PageControler {
	
	public function getPage(){
		return $pageClientAccueil = new PageClientAccueil();
	}
	
	public function getDisplayableAeroportsList(){
		$DBAccess = new DBClientAccess();
		$aeroports = $DBAccess->get_aeroportsName();
		return $aeroports;
	}
	
	public function getAvailableFlights(){
		$DBAccess = new DBClientAccess();
		$aeroports = $DBAccess->get_aeroports();
		if(isset($_POST['aeroport_depart']) AND isset($_POST['aeroport_destin'])){
			$existe_liaison = false;
			$link = mysql_connect('localhost', 'Admin', 'admin');
			$aeroport_depart = mysql_real_escape_string($_POST['aeroport_depart']);
			$aeroport_destin = mysql_real_escape_string($_POST['aeroport_destin']);
			
			// on recherche une liaison entre les deux aéroports
			$liaisons = $DBAccess->find_liaisons($aeroport_depart, $aeroport_destin);
			
			//vérification vide ou non vide
			if(empty($liaisons)){
				$message = "Pas de liaisons.";
			}
			else{			
				//On recupère les vols pour la liaison
				foreach($liaisons as $liaison){
					$message = 'Il existe une liaison entre ces deux aéroports, son id est : ' . $liaison['idliaison'];
					$_POST['vols'] = $DBAccess->find_vols($liaison['idliaison']);
					
					$_POST['nom_aeroport_depart'] = $liaison['ville_depart'];
					$_POST['nom_aeroport_destin'] = $liaison['ville_destin'];
					$_POST['code_aeroport_depart'] = $liaison['code_depart'];
					$_POST['code_aeroport_destin'] = $liaison['code_destin'];
					
					if(empty($_POST['vols'])){
						$message = $message . 'Pas de vol';
					}
					else {
						$message = $message . " \n Il existe des vols pour cette liaison.";
					}
					
				}
			}
			return $message;
		}
		return null;
	}
}
?>