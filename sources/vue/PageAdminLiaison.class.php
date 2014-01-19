<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/html_default/AbstractAdminHtmlPage.class.php');
class PageAdminLiaison extends AbstractAdminHtmlPage {

	public function display(){
		parent::display();
	}

	protected function writeContent(){
		$this->writeAjoutLiaison();
		$this->writeListLiaisons();
	}
	
	private function writeAjoutLiaison(){
		?><div class="container">
			<!-- FORMULAIRE -->
			<div class="row-fluid">
				<div class="span4">  
					<h1>Ajouter une liaison.</h1>
					<p>Choisissez les deux aéroports</p></div>
				<div class="span8">			
					<form action="liaison.php" method="post">
						<table>
						<tr>				
							<td>  Aéroport de départ : <select name="idDep">
								<?php
								$aeroports = $this->getAeroportList();
								foreach($aeroports as $aeroport){?>
									<option value="<?php echo $aeroport['idaeroport'];?>"><?php echo $aeroport['nom'];?></option>
								<?php } ?>
								</select>
							</td>
						</tr>
						<tr>				
							<td>  Aéroport d'arrivée : <select name="idArr">
								<?php
								foreach($aeroports as $aeroport){?>
									<option value="<?php echo $aeroport['idaeroport'];?>"><?php echo $aeroport['nom'];?></option>
								<?php } ?>
								</select>
							</td>
						</tr>
						</table>
						<button class="btn btn-success" type="submit" >Créer</button>
					</form>
				</div>
			</div>
			<pre>
		<?php
			$message_info = $this->formAddLiaisonTreatment();
			echo($message_info); 
		?></pre>
		</div> <!-- /container --><?php
		LineManager::carriageReturnEqual();
	}
	
	private function getAeroportList(){
		$controler = new PageAdminLiaisonControler();
		return $controler->getAeroportList();
	}
	
	private function formAddLiaisonTreatment(){
		$controler = new PageAdminLiaisonControler();
		return $controler->formAddLiaisonTreatment();
	}
	
	private function writeListLiaisons(){
		$this->formDeleteLiaisonTreatment();
		?><div class="container">
			<form action="liaison.php" method="post">
				<table class="table table-bordered table-striped table-condensed">
				   <caption>
					  <h4>Liste des liaisons</h4>
				   </caption>
				   <thead>
					  <tr>
							<th>Aéroport de départ</th>
							<th>Aéroport d'arrivée</th>
							<th>Sélectionner</th>
					  </tr>
				   </thead>
				   <tbody>
						<?php 
							$liaisons = $this->getListLiaisons();
							foreach($liaisons as $liaison){ ?>
						  <tr>
							<td><?php echo $liaison['nom_aero_dep'];?></td>
							<td><?php echo $liaison['nom_aero_arr'];?></td>
							<td><input type="radio" name="id" value="<?php echo($liaison['idliaison']);?>"/></td>
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
	
	private function getListLiaisons(){
		$controler = new PageAdminLiaisonControler();
		return $controler->getListLiaisons();
	}
	
	private function formDeleteLiaisonTreatment(){
		$controler = new PageAdminLiaisonControler();
		return $controler->formDeleteLiaisonTreatment();
	}	
}
?>