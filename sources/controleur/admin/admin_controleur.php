<?php
include_once('modele/fonctions_mysql.php');
$employes = find_employes();
if (isset($_POST['supprimer'])) {
	if(isset($_POST['id'])){
		delete_personne($_POST['id']);
	}
}
include_once('vue/admin/admin_vue.php');

