<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
    <head>
        <title>Mon blog</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link href="vue/blog/style.css" rel="stylesheet" type="text/css" /> 
    </head>
        
    <body>
        <h1>Mon super blog !</h1>
        <p>Derniers billets du blog :</p>
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
		?>

	</body>
</html>