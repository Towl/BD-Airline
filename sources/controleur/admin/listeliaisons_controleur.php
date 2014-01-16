<?php
include_once('modele/fonctions_mysql.php');

$liaisons = get_liaisons(); 
if (isset($_POST['supprimer'])) {
	if(isset($_POST['id'])){
		delete_liaison($_POST['id']);
	}
} 
include_once('vue/admin/listeliaisons_vue.php');