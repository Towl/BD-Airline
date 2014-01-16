<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include('vue/head.php');?>
  </head>

  <body>

	<?php include('vue/admin/menu.php');?>
	

    <div class="container">
		<div class="row-fluid">
			<div class="span2">
				<img src="Ressources/photoid.png"/>	
			</div>
			<div class="span6">
				<?php if($type_employe == "vol"){ 
				// Employé en vol -->
				echo "<h1>Personnel de vol</h1>";
				echo "<b>Prenom :</b> " . $prenom;
				echo "<br/><b>Nom :</b> " . $nom;
				echo "<br/><b>Adresse :</b> " . $adresse;
				echo "<br/><b>Salaire :</b> " . $salaire;
				echo "<br/><b>Numéro de sécurité sociale :</b> " . $secu;
				
				} elseif($type_employe == "sol"){ 
				// Employé au sol-->
				echo "<h1>Personnel au sol</h1><br/>";
				echo "<b>Prenom :</b> " . $prenom;
				echo "<br/><b>Nom :</b> " . $nom;
				echo "<br/><b>Adresse :</b> " . $adresse;
				echo "<br/><b>Salaire :</b> " . $salaire;
				echo "<br/><b>Numéro de sécurité sociale :</b> " . $secu;
				
				} 
					
				else{ ?>
				<!-- Employe ni vol, ni sol... traitement des mauvaises entrées -->
				<h1> Aucun employé sélectionné </h1>
				<a href="admin.php">Retour à la liste des employés</a>
				
				<?php } ?>
			</div>
			<div class="span4">
				<?php 
				if($type_employe == "vol"){
					if($is_navigant){
						//personnel navigant
						echo "<br/><br/><b>Heures de vol :</b> " . $heures;
						//Pilote ?
						if($is_pilote){
							echo "<br/><b>License de pilote :</b> " . $license;
						}
					}
				
				}?>
			</div>
		</div>
		
    </div> <!-- /container -->

	<?php include('vue/bas_de_page.php'); ?>

  </body>
</html>