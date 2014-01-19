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
              <li <?php if (curPageName() == "accueil.php"){ echo('class="active"');}?>>
				<a href="./accueil.php">Accueil</a>
			  </li>
              <li <?php if (curPageName() == "listeaeroports.php"){echo('class="active"');}?>>
				<a href="./listeaeroports.php">Liste des aéroports desservis</a>
			  </li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>