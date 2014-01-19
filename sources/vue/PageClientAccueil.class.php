<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/html_default/AbstractClientHtmlPage.class.php');
class PageClientAccueil extends AbstractClientHtmlPage {

	public function display(){
		parent::display();
	}

	protected function writeContent(){
		?><div class="container">
		<!-- FORMULAIRE -->
			<div class="row-fluid">
				<div class="span4">  <h1>Acheter un billet.</h1>
				<p>Réservez un billet pour un vol vers un de nos nombreux aéroports partenaires.</p></div>
				<div class="span8">			
					<form action="accueil.php" method="post">
						<table class="table-condensed">
						<tr><?php $aeroports = $this->getAeroportsList();?>
							<td>De <select name="aeroport_depart">
								<?php foreach($aeroports as $aeroport){?>
									<option value="<?php echo $aeroport;?>"><?php echo $aeroport;?></option>
								<?php } ?>
								</select>
							</td>
						
							<td>A <select name="aeroport_destin">
								<?php foreach($aeroports as $aeroport){?>
									<option value="<?php echo $aeroport;?>"><?php echo $aeroport;?></option>
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
					$message = $this->getFligths();
					if(isset($_POST['vols']) AND !empty($_POST['vols'])){
						foreach($_POST['vols'] as $vol){
						?>
						<div class="article">						
							<!--Mise forme d'un vol -->
							<b><?php echo $_POST['nom_aeroport_depart'] ."(". $_POST['code_aeroport_depart'] . ")" . " --> " . $_POST['nom_aeroport_destin']."(". $_POST['code_aeroport_destin'] . ")"; ?></b> <br/>
							<?php echo "Heure de départ: " . $vol['hdepart'] . "  Heure d'arrivée: " . $vol['harrivee']; ?>
							<a class="btn btn-primary" href="reserver-vol.php">Réserver</a>
						</div>
						<?php
						}
					}
					else {
						echo $message;
					}
				}
				?>
				</div>
			</div>
		</div> <!-- /container --><?php
		LineManager::carriageReturnEqual();
	}
	
	private function getAeroportsList(){
		$controler = new PageClientAccueilControler();
		return $controler->getDisplayableAeroportsList();
	}
	
	private function getFligths(){
		$controler = new PageClientAccueilControler();
		return $controler->getAvailableFlights();
	}	
	
	protected function writeFoot(){
		parent::writeFoot();
		?><!-- pour le selecteur de date -->
		<link href="ressources/css/jquery-ui-1.10.3.custom.min.css" rel="stylesheet">
		<script src="ressources/js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
		<script src="ressources/js/datepicker.js" type="text/javascript"></script>
		<?php
	}
}
?>
