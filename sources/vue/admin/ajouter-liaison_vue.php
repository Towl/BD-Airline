<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include('vue/head.php');?>
  </head>

  <body>

	<?php include('vue/admin/menu.php');?>

    <div class="container">
		<!-- FORMULAIRE -->
	    <div class="row-fluid">
			<div class="span4">  
				<h1>Ajouter une ligne de vol.</h1>
				<p>Entrer nom, prénom, adresse, assignement, numéro de sécurité sociale, salaire</p></div>
			<div class="span8">			
				<form action="ajouter-liaison.php" method="post">
					<table>
					<tr>				
						<td>Aéroport de départ : <select name="aeroport_depart">
							<?php foreach($aeroports as $aeroport){?>
								<option value="<?php echo $aeroport['idaeroport'];?>"><?php echo $aeroport['nom'];?></option>
							<?php } ?>
							</select> </td>
					
						<td>   Aéroport de destination : <select name="aeroport_destin">
							<?php foreach($aeroports as $aeroport){?>
								<option value="<?php echo $aeroport['idaeroport'];?>"><?php echo $aeroport['nom'];?></option>
							<?php } ?>
							</select> </td>
					</tr>
					</table>
					
					<button type="submit" class="btn btn-success">Créer</button>

				</form>
			</div>
		</div>

	<?php echo $message_info; ?>
    </div> <!-- /container -->

	<?php include('vue/bas_de_page.php'); ?>

  </body>
</html>
