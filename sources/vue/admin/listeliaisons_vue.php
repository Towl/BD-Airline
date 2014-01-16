<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include('vue/head.php');?>
  </head>

  <body>

	<?php include('vue/admin/menu.php');?>
	

    <div class="container">
	<form action="listeliaisons.php" method="post">
	<table class="table table-bordered table-striped table-condensed">
		   <caption>
			  <h4>Liste des liaisons</h4>
		   </caption>
		   <thead>
			  <tr>
					<th>Aéroport de départ</th>
					<th>Ville et Pays de départ</th>
					<th>Aéroport d'arrivée</th>
					<th>Ville et Pays d'arrivée</th>
					<th></th>
					<th>Sélectionner</th>
			  </tr>
		   </thead>
		   <tbody>
				<?php foreach($liaisons as $liaison){ ?>
				  <tr>
					<td><?php echo $liaison['nom_depart'];?></td>
					<td><?php echo $liaison['ville_depart'];?>, <?php echo $liaison['pays_depart'];?></td>
					<td><?php echo $liaison['nom_destin'];?></td>
					<td><?php echo $liaison['ville_destin'];?>, <?php echo $liaison['pays_destin'];?></td>
					<td><a href="detailliaison.php?id=<?php echo $liaison['idliaison'];?>">détails</a></td>
					<td><input type="radio" name="id" value="<?php echo $liaison['idliaison'];?>"/></td>
				  </tr>
				<?php } ?>
			</tbody>
		</table>
	<div class="row">
		<div class="span9">
			<input class="btn btn-danger" type="submit" name="supprimer" value="Supprimer" />			
		</div>
		<div class="span3">
			<a href="ajouter-liaison.php" class="btn btn-success">Ajouter nouvelle liaison</a>
		</div>
	</div>

	</form>
    </div> <!-- /container -->

	<?php include('vue/bas_de_page.php'); ?>

  </body>
</html>