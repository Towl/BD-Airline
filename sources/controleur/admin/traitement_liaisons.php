<?php

include_once($_SERVER["DOCUMENT_ROOT"].'/sgbd/modele/connexion_sql.php');
include_once($_SERVER["DOCUMENT_ROOT"].'/sgbd/modele/fonctions_mysql.php');

if (isset($_POST['modifier'])) {
 
  
	echo "pas cool";
} elseif (isset($_POST['supprimer'])) {
	if(isset($_POST['id'])){
		delete_liaison($_POST['id']);
	}
	header('Status: 301 Moved Permanently', false, 301);      
	header('Location: /sgbd/listeliaisons.php');      
	exit();      
} else {
	//...
}