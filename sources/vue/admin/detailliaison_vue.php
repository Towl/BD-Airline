<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include('vue/head.php');?>
  </head>

  <body>

	<?php include('vue/admin/menu.php');?>
	

    <div class="container">
	<?php
	if($existe){
	?>
	<div class="row-fluid">
		<div class="span6">
		<!-- aéroport de départ -->
			<?php 
				echo "<h1>Aéroport de départ</h1>";
				echo "<b>Nom :</b> " . $nom_depart;
				echo "<br/><b>Code :</b> " . $code_depart;
				echo "<br/><b>Ville :</b> " . $ville_depart;
				echo "<br/><b>Pays :</b> " . $pays_depart;
			?>
		</div>
		<div class="span6">
		<!-- aéroport de départ -->
			<?php 
				echo "<h1>Aéroport de destination</h1>";
				echo "<b>Nom :</b> " . $nom_destin;
				echo "<br/><b>Code :</b> " . $code_destin;
				echo "<br/><b>Ville :</b> " . $ville_destin;
				echo "<br/><b>Pays :</b> " . $pays_destin;
			?>
		</div>

	</div>
	<div class="row-fluid">
	<br/><h2>Vols disponibles pour cette liaison</h2><br/>
	<?php 
	if(isset($vols) AND !empty($vols)){
		foreach($vols as $vol){
			?>
			<div class="article">						
				<!--Mise forme d'un vol -->
				<b><?php echo $nom_depart ."(". $code_depart . ")" . " --> " . $nom_destin ."(". $code_destin . ")"; ?></b> <br/>
				<?php echo "Heure de départ: " . $vol['hdepart'] . "  Heure d'arrivée: " . $vol['harrivee']; ?>
			</div>
			<?php
			}
		}?>
		</div>
	<?php }else{ echo $message; } ?>	
    </div> <!-- /container -->

	<?php include('vue/bas_de_page.php'); ?>

  </body>
</html>