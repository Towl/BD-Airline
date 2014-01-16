<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include('vue/head.php');?>
  </head>

  <body>

	<?php include('menu.php');?>
	
	<!-- pour le selecteur de date -->
	 <link rel="stylesheet" href="Ressources/jquery-ui-1.10.3.custom.css">
	<script src="Ressources/js/jquery-1.9.1.js" type="text/javascript"></script>
	<script src="Ressources/js/jquery-ui-1.10.3.custom.js" type="text/javascript"></script>
	<script src="Ressources/js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
	<script>
	$(function() {
	$( "#datepicker" ).datepicker();
	});
	</script>
	
    <div class="container">
	<!-- FORMULAIRE -->
	    <div class="row-fluid">
			<div class="span4">  <h1>Acheter un billet.</h1>
      <p>Réservez un billet pour un vol vers un de nos nombreux aéroports partenaires.</p></div>
			<div class="span8">			
				<form action="accueil.php" method="post">
					<table class="table-condensed">
					<tr>
						
						<td>De <select name="aeroport_depart">
							<?php foreach($aeroports as $aeroport){?>
								<option value="<?php echo $aeroport['nom'];?>"><?php echo $aeroport['nom'];?></option>
							<?php } ?>
							</select> </td>
					
						<td>A <select name="aeroport_destin">
							<?php foreach($aeroports as $aeroport){?>
								<option value="<?php echo $aeroport['nom'];?>"><?php echo $aeroport['nom'];?></option>
							<?php } ?>
							</select> </td>
					</tr>
					<tr>
						<td>Date de départ : <input type="text" id="datepicker"></td>
					</tr>
					</table>
					
					<button type="submit" class="btn btn-success">Rechercher</button>

				</form>
			</div>
		</div>
		<!-- RESULTATS -->
		<div class = "row-fluid">
			<div class = "span12">
			<br/>
			<h3>Liste des vols disponibles</h3>
			<!-- résultats des requêtes ici -->
			<?php 
			// 
			if(isset($_POST['aeroport_depart']) AND isset($_POST['aeroport_destin'])){
				if(isset($vols) AND !empty($vols)){
					foreach($vols as $vol){
					?>
					<div class="article">						
						<!--Mise forme d'un vol -->
						<b><?php echo $nom_aeroport_depart ."(". $code_aeroport_depart . ")" . " --> " . $nom_aeroport_destin ."(". $code_aeroport_destin . ")"; ?></b> <br/>
						<?php echo "Heure de départ: " . $vol['hdepart'] . "  Heure d'arrivée: " . $vol['harrivee']; ?>
						<a class="btn btn-primary" href="reserver-vol.php">Réserver</a>
					</div>
					<?php
					}
				}
				else {
					echo $hehe;
				}
			}
			?>
			</div>
		</div>
			
    </div> <!-- /container -->

	<?php include('vue/bas_de_page.php'); ?>

  </body>
</html>
