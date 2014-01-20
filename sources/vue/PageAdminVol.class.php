<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/html_default/AbstractAdminHtmlPage.class.php');
class PageAdminVol extends AbstractAdminHtmlPage {

	public function display(){
		parent::display();
	}

	protected function writeContent(){
		$this->writeAjoutVol();
		$this->writeListVols();
	}
	
	private function writeAjoutVol(){
		?><div class="container">
			<!-- FORMULAIRE -->
			<div class="row-fluid">
				<div class="span4">  
					<h1>Ajouter un vol.</h1>
					<p>Choisissez son modèle</p></div>
				<div class="span8">			
					<form action="vol.php" method="post">
						<table>
						<tr>				
							<td>  Avion : <select name="avion">
								<?php
								$avions = $this->getAvionList();
								foreach($avions as $avion){?>
									<option value="<?php echo $avion['immatricule'];?>"><?php echo($avion['modele'].' : '.$avion['immatricule']);?></option>
								<?php } ?>
								</select>
							</td>
							<td>  Liaison : <select name="liaison">
								<?php
								$liaisons = $this->getLiaisonList();
								foreach($liaisons as $liaison){?>
									<option value="<?php echo $liaison['idliaison'];?>"><?php echo($liaison['nom_aero_dep'].' => '.$liaison['nom_aero_arr']);?></option>
								<?php } ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>  Period : <select name="period">
								<?php
								$periods = $this->getPeriodList();
								foreach($periods as $period){?>
									<option value="<?php echo $period['idperiode'];?>"><?php echo ($period['debut'].'->'.$period['fin']);?></option>
								<?php } ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>  
								Heure de départ : <input type="time" name="heureDep"/>
							</td>
							<td>  
								Heure d'arrivée : <input type="time" name="heureArr"/>
							</td>
						</tr>
						</table>
						<button class="btn btn-success" type="submit" >Créer</button>
					</form>
				</div>
			</div>
			<pre>
		<?php
			$message_info = $this->formAddVolTreatment();
			echo($message_info); 
		?></pre>
		</div> <!-- /container --><?php
		LineManager::carriageReturnEqual();
	}
	
	private function getAvionList(){
		$controler = new PageAdminVolControler();
		return $controler->getAvionList();
	}
	
	private function getLiaisonList(){
		$controler = new PageAdminVolControler();
		return $controler->getLiaisonList();
	}
	
	private function getPeriodList(){
		$controler = new PageAdminVolControler();
		return $controler->getPeriodList();
	}
	
	private function formAddVolTreatment(){
		$controler = new PageAdminVolControler();
		return $controler->formAddVolTreatment();
	}
	
	private function writeListVols(){
		$this->formDeleteVolTreatment();
		?><div class="container">
			<form action="vol.php" method="post">
				<table class="table table-bordered table-striped table-condensed">
				   <caption>
					  <h4>Liste des vols</h4>
				   </caption>
				   <thead>
					  <tr>
							<th>Identifiant</th>
							<th>Immatricule</th>
							<th>Modele</th>
							<th>Départ</th>
							<th>Arrivée</th>
							<th>Début</th>
							<th>Fin</th>
							<th>Heure de départ</th>
							<th>Heure d'arrivée</th>
							<th>Sélectionner</th>
					  </tr>
				   </thead>
				   <tbody>
						<?php 
							$vols = $this->getListVols();
							foreach($vols as $vol){ ?>
						  <tr>
							<td><?php echo $vol['idvol'];?></td>
							<td><?php echo $vol['idavion'];?></td>
							<td><?php echo $vol['modele'];?></td>
							<td><?php echo $vol['depart'];?></td>
							<td><?php echo $vol['arrivee'];?></td>
							<td><?php echo $vol['debut'];?></td>
							<td><?php echo $vol['fin'];?></td>
							<td><?php echo $vol['hdepart'];?></td>
							<td><?php echo $vol['harrivee'];?></td>
							<td><input type="radio" name="id" value="<?php echo $vol['idvol'];?>"/></td>
						  </tr>
						<?php } ?>
					</tbody>
				</table>
				<div class="row">
					<div class="span9">
						<input class="btn btn-danger" type="submit" name="supprimer" value="Supprimer" />
					</div>
				</div>
			</form>
		</div> <!-- /container --><?php
		LineManager::carriageReturnEqual();
	}
	
	private function getListVols(){
		$controler = new PageAdminVolControler();
		return $controler->getListVols();
	}
	
	private function formDeleteVolTreatment(){
		$controler = new PageAdminVolControler();
		return $controler->formDeleteVolTreatment();
	}	
}
?>