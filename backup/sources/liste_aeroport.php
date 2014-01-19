<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include('head.php');?>
  </head>

  <body>

	<?php include('menu.php');?>

    <div class="container">

		<?php
		foreach($aeroports as $aeroport){
		?>
		<div>
			<h3><?php echo $aeroport['code']; ?>
				<em> <?php echo $aeroport['nom']; ?></em>
			</h3>
			
			<p>
			<?php echo $aeroport['ville']; ?>, <?php echo $aeroport['pays']; ?>
			</p>
		</div>
		<?php
		}
		
		echo $liaisons[0][0] . " -> " . $liaisons[1][0];
		
		?>

    </div> <!-- /container -->

	<?php include('bas_de_page.php'); ?>

  </body>
</html>
