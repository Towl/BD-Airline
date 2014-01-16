<?php include_once('modele/fonctions_diverses.php'); ?>
	<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="./accueil.php">Compagnie XYZ</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
			<?php if (curPageName() == "admin.php"){ ?> 
              <li class="active"><a href="./admin.php">Liste des Employés</a></li>
			 <?php } 
			 else {?>
			  <li><a href="./admin.php">Liste des Employés</a></li>
			 <?php } ?>
			 <?php if (curPageName() == "listeliaisons.php"){ ?> 
              <li class="active"><a href="./listeliaisons.php">Liste des liaisons</a></li>
			 <?php } 
			 else {?>
              <li><a href="./listeliaisons.php">Liste des liaisons</a></li>
			 <?php } ?>
              
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>