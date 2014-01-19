<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/html_default/AbstractAdminHtmlPage.class.php');
class PageAdminEmploye extends AbstractAdminHtmlPage {

	public function display(){
		parent::display();
	}

	protected function writeContent(){
		$this->writeAjoutEmploye();
		$this->writeListEmployes();
	}
	
	private function writeAjoutEmploye(){
		?><div class="container">
			<!-- FORMULAIRE -->
			<div class="row-fluid">
				<div class="span4">  
					<h1>Ajouter un employé.</h1>
					<p>Entrer nom, prénom, adresse, assignement, numéro de sécurité sociale, salaire</p></div>
				<div class="span8">			
					<form action="employe.php" method="post">
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
								<?php
								$assigns = $this->getAssignList();
								foreach($assigns as $assign){?>
									<option value="<?php echo $assign['valAssign'];?>"><?php echo $assign['valAssign'];?></option>
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
			$message_info = $this->formAddEmployeTreatment();
			echo($message_info); 
		?></pre>
		</div> <!-- /container --><?php
		LineManager::carriageReturnEqual();
	}
	
	private function getAssignList(){
		$controler = new PageAdminEmployeControler();
		return $controler->getAssignList();
	}
	
	private function formAddEmployeTreatment(){
		$controler = new PageAdminEmployeControler();
		return $controler->formAddEmployeTreatment();
	}
	
	private function writeListEmployes(){
		$this->formDeleteEmployeTreatment();
		?><div class="container">
			<form action="employe.php" method="post">
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
						<?php 
							$employes = $this->getListEmployes();
							foreach($employes as $employe){ ?>
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
				</div>
			</form>
		</div> <!-- /container --><?php
		LineManager::carriageReturnEqual();
	}
	
	private function getListEmployes(){
		$controler = new PageAdminEmployeControler();
		return $controler->getListEmployes();
	}
	
	private function formDeleteEmployeTreatment(){
		$controler = new PageAdminEmployeControler();
		return $controler->formDeleteEmployeTreatment();
	}	
}
?>