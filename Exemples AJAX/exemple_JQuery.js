function refreshTable(){
	var month = $("#MonthRestraint").val();
	var year = $("#YearRestraint").val();
	$.post('./finances/table.php',
			{	month: month,
				year: year},
			function(data,status){
				if (status != "success" || data.indexOf('error',0)>=0){
					alert('Il y a un Problème ! Appellez Franck !\n\nStatus de la requète : '+status+'\nReponse du serveur : '+data);
				}
				else if(data === ""){
					alert('La réponse est vide !');
				}
				else{
					document.getElementById("DepenseTable").innerHTML = data;
				}
			}
		);
}

$(function(){
	$(".pop").popover();
	$('.alert-hideable').hide();
	$(".pop").blur(function(){
		$(".pop").popover('hide');
	});
	$(".hiderButton").click(function() {
		$(this).parent().hide(200);
	});
	refreshTable();
});

$(function() {
	$("#Refresh").click(function(event){
		event.preventDefault();
		refreshTable();
	});
});

$(function() {
	$("#AddDepenseButton").click(function(event) {
		event.preventDefault();
		var error = "";
		var label = $("#DepenseLabel").val();
		if (label === "") {
			$("#DepenseLabel").focus();
			$("#DepenseLabel").popover('show');
			error = "Label";
		}
		
		var categorie = $("#DepenseCategorie").val();
		
		var montant = $("#DepenseMontant").val().replace(",",".");
		if (montant === "" && error === "") {
			$("#DepenseMontant").focus();
			$("#DepenseMontant").popover('show');
			error = "Montant";
		}
		
		var auteur = $("#DepenseAuteur").val();
		
		var date = $("#DepenseDate").val();
		if (date === "" && error === "") {
			$("#DepenseDate").focus();
			$("#DepenseDate").popover('show');
			error = "Date";
		}
		
		if(error == ""){
			$.post('./finances/addDepense.php',
				{
					label: label,
					categorie: categorie,
					montant: montant,
					auteur: auteur,
					date: date
				},
				function(data, status){
					if (status!="success" || data.indexOf('error',0)>=0){
						alert('Il y a un Problème ! Appellez Franck !\n\nStatus de la requète : '+status+'\nReponse du serveur : '+data);
					}
					else if(data == "1"){
						$('#error').hide(100);
						$('#valid').show(200);
					}
					else {
						alert('Le server n\'a pas compris la requète !');
					}
				}
			);
		}
		else {
			$('#valid').hide(100);
			$('#error .alert-content').text('Le champs : '+error+' est incorrecte !');
			$('#error').show(200);
		}
	});
});