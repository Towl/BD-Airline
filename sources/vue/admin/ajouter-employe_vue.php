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
				<h1>Ajouter un employé.</h1>
				<p>Entrer nom, prénom, adresse, assignement, numéro de sécurité sociale, salaire</p></div>
			<div class="span8">			
				<form action="ajouter-employe.php" method="post">
					<table>
					<tr>				
						<td>Nom : <input type="text" name="nom"/> </td>
					
						<td>   Prénom : <input type="text" name="prenom"/></td>
					</tr>
					<tr>
						<td>Adresse : <input type="text" name="adresse" /></td>
						<td>  Numéro de sécurité sociale : <input type="text" name="secu" /></td>
					</tr>
					<tr>
						<td>Salaire : <input type="text" name="salaire"/></td>
						<td>  Assignement : <select name="assign">
							<?php foreach($assigns as $assign){?>
								<option value="<?php echo $assign['valAssign'];?>"><?php echo $assign['valAssign'];?></option>
							<?php } ?>
							</select>
						</td>
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
