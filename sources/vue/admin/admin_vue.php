<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include('vue/head.php');?>
  </head>

  <body>

	<?php include('vue/admin/menu.php');?>
	

    <div class="container">

	<form action="admin.php" method="post">
		<table class="table table-bordered table-striped table-condensed">
		   <caption>
			  <h4>Liste des employés</h4>
		   </caption>
		   <thead>
			  <tr>
					<th>Nom</th>
					<th>Prénom</th>
					<th>Adresse</th>
					<th>Assignation</th>
					<th>Salaire</th>
					<th>Numéro de sécurité sociale</th>
					<th></th>
					<th>Sélectionner</th>
			  </tr>
		   </thead>
		   <tbody>
				<?php foreach($employes as $employe){ ?>
				  <tr>
					<td><?php echo $employe['nom'];?></td>
					<td><?php echo $employe['prenom'];?></td>
					<td><?php echo $employe['adresse'];?></td>
					<td><?php echo $employe['assign'];?></td>
					<td><?php echo $employe['salaire'];?></td>
					<td><?php echo $employe['secu'];?></td>
					<td><a href="detailemploye.php?id=<?php echo $employe['id'];?>">détails</a></td>
					<td><input type="radio" name="id" value="<?php echo $employe['id'];?>"/></td>
				  </tr>
				<?php } ?>
			</tbody>
		</table>
	<div class="row">
		<div class="span9">
			<input class="btn btn-danger" type="submit" name="supprimer" value="Supprimer" />
		</div>
		<div class="span3">
			<a href="ajouter-employe.php" class="btn btn-success">Ajouter employé</a>
		</div>
	</div>

	</form>

	
    </div> <!-- /container -->

	<?php include('vue/bas_de_page.php'); ?>

  </body>
</html>