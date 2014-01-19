<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/html_default/AbstractAdminHtmlPage.class.php');
class PageAdminAvion extends AbstractAdminHtmlPage {

	public function display(){
		parent::display();
	}

	protected function writeContent(){
		$this->writeAjoutAvion();
		$this->writeListAvions();
	}
	
	private function writeAjoutAvion(){
		?><div class="container">
			<!-- FORMULAIRE -->
			<div class="row-fluid">
				<div class="span4">  
					<h1>Ajouter un avion.</h1>
					<p>Choisissez son modèle</p></div>
				<div class="span8">			
					<form action="avion.php" method="post">
						<table>
						<tr>				
							<td>  Modele : <select name="modele">
								<?php
								$modeles = $this->getModeleList();
								foreach($modeles as $modele){?>
									<option value="<?php echo $modele['idmodele'];?>"><?php echo $modele['idmodele'];?></option>
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
			$message_info = $this->formAddAvionTreatment();
			echo($message_info); 
		?></pre>
		</div> <!-- /container --><?php
		LineManager::carriageReturnEqual();
	}
	
	private function getModeleList(){
		$controler = new PageAdminAvionControler();
		return $controler->getModeleList();
	}
	
	private function formAddAvionTreatment(){
		$controler = new PageAdminAvionControler();
		return $controler->formAddAvionTreatment();
	}
	
	private function writeListAvions(){
		$this->formDeleteAvionTreatment();
		?><div class="container">
			<form action="avion.php" method="post">
				<table class="table table-bordered table-striped table-condensed">
				   <caption>
					  <h4>Liste des avions</h4>
				   </caption>
				   <thead>
					  <tr>
							<th>Identifiant</th>
							<th>Modèle</th>
							<th>Sélectionner</th>
					  </tr>
				   </thead>
				   <tbody>
						<?php 
							$avions = $this->getListAvions();
							foreach($avions as $avion){ ?>
						  <tr>
							<td><?php echo $avion['immatricule'];?></td>
							<td><?php echo $avion['modele'];?></td>
							<td><input type="radio" name="id" value="<?php echo $avion['immatricule'];?>"/></td>
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
	
	private function getListAvions(){
		$controler = new PageAdminAvionControler();
		return $controler->getListAvions();
	}
	
	private function formDeleteAvionTreatment(){
		$controler = new PageAdminAvionControler();
		return $controler->formDeleteAvionTreatment();
	}	
}
?>