var CreerNouvellePageAdmin = function ()
{
	var NomPageAdmin = prompt("Entrez un nom pour la nouvelle page", "Nouvelle page.php");
    
    if (NomPageAdmin != null)
	{
		var Input = NomPageAdmin.split('.');
		if (Input.length != 2)
		{
			window.alert("Nom de fichier invalide");
			return;
		}
		var data = new FormData();
		data.append('NomPageAdmin', NomPageAdmin);

		var xmlhttp;
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp = new XMLHttpRequest();
		}
		else {// code for IE6, IE5
		    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
	
		xmlhttp.onreadystatechange = function ()
		{
		    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
				CreateTab(Input[0], '.' + Input[1]);
				var NewOption= document.createElement("option");
				NewOption.value = NomPageAdmin;
				NewOption.innerHTML = NomPageAdmin;
				ChoixPageAdmin.appendChild(NewOption);
								
				if (xmlhttp.responseText != "")
					AdminPageEditor.innerHTML = xmlhttp.responseText;
		    }
		};

		var url = "/projet/h2015/equipe6/Admin/Code PHP/Create Page Admin.php";
		xmlhttp.open('POST', url);
		xmlhttp.send(data);
	}
}
var RenommerPageAdmin = function ()
{
    if (ChoixPageAdmin.selectedIndex >= 0)
	{
		var NomPageAdmin = prompt("Entrez un nom", ChoixPageAdmin.value);
		
		if (NomPageAdmin != null)
		{
			var Input = NomPageAdmin.split('.');
			if (Input.length != 2)
			{
				window.alert("Nom de fichier invalide");
				return;
			}
		
			var data = new FormData();
			data.append('NomPageAdminAncien', ChoixPageAdmin.value);
			data.append('NomPageAdminNouveau', NomPageAdmin);

			var xmlhttp;
			if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			}
			else {// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
		
			xmlhttp.onreadystatechange = function () {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					
					var NomPageAdminAncien = ChoixPageAdmin.value.split('.')[0];
					var SelectedHeader = document.getElementById('Tab header ' + NomPageAdminAncien);
					var SelectedContent = document.getElementById('Tab content ' + NomPageAdminAncien);
					
					ChoixPageAdmin.options[ ChoixPageAdmin.selectedIndex ].value = NomPageAdmin;
					ChoixPageAdmin.options[ ChoixPageAdmin.selectedIndex ].innerHTML = NomPageAdmin;

					var NomPageAdminNouveau = Input[0];
					SelectedHeader.id = 'Tab header ' + NomPageAdminNouveau;
					SelectedHeader.innerHTML = NomPageAdminNouveau;
					SelectedHeader.onclick = ChangeTab.bind(SelectedHeader, NomPageAdminNouveau);
					SelectedContent.id = 'Tab content ' + NomPageAdminNouveau;
				
					if (xmlhttp.responseText != "")
						AdminPageEditor.innerHTML = xmlhttp.responseText;
				}
			};

			var url = "/projet/h2015/equipe6/Admin/Code PHP/Renommer Page Admin.php";
			xmlhttp.open('POST', url);
			xmlhttp.send(data);
		}
	}
}
var SupprimerPageAdmin = function ()
{
    if (ChoixPageAdmin.selectedIndex >= 0 && confirm("Voulez-vous vraiment supprimer cette page?"))
	{
		var data = new FormData();
		data.append('NomPageAdmin', ChoixPageAdmin.value);

		var xmlhttp;
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp = new XMLHttpRequest();
		}
		else {// code for IE6, IE5
		    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
	
		xmlhttp.onreadystatechange = function ()
		{
		    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
				var NomPage = ChoixPageAdmin.value.split('.')[0];
				var SelectedHeader = document.getElementById('Tab header ' + NomPage);
				var SelectedContent = document.getElementById('Tab content ' + NomPage);
				SelectedHeader.parentNode.removeChild(SelectedHeader);
				SelectedContent.parentNode.removeChild(SelectedContent);
				
				ChoixPageAdmin.remove(ChoixPageAdmin.selectedIndex);
				ChoisirPageAdmin();
				if (xmlhttp.responseText != "")
					AdminPageEditor.innerHTML = xmlhttp.responseText;
		    }
		};

		var url = "/projet/h2015/equipe6/Admin/Code PHP/Supprimer Page Admin.php";
		xmlhttp.open('POST', url);
		xmlhttp.send(data);
	}
}
var ChoisirPageAdmin = function ()
{
    if (ChoixPageAdmin.selectedIndex >= 0)
	{
		var data = new FormData();
		data.append('NomPageAdmin', ChoixPageAdmin.value);

		var xmlhttp;
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp = new XMLHttpRequest();
		}
		else {// code for IE6, IE5
		    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
	
		xmlhttp.onreadystatechange = function ()
		{
		    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
		        AdminPageEditor.innerHTML = xmlhttp.responseText;
		    }
		};
		var url = "/projet/h2015/equipe6/Admin/Code PHP/Choisir Page Admin.php";
		xmlhttp.open('POST', url);
		xmlhttp.send(data);
	}
}
var SauvegarderPageAdmin = function ()
{
    if (ChoixPageAdmin.selectedIndex >= 0)
	{
		var data = new FormData();
		data.append('NomPageAdmin', ChoixPageAdmin.value);
		data.append('ContenuPageAdmin', AdminPageEditor.value);

		var xmlhttp;
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp = new XMLHttpRequest();
		}
		else {// code for IE6, IE5
		    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
	
		xmlhttp.onreadystatechange = function ()
		{
		    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
				var ActiveAdminPage = document.getElementById('Tab content ' + ChoixPageAdmin.value.split('.')[0] + '');
				
				var ScriptsOld = ActiveAdminPage.getElementsByTagName('script');
				
				for(var i = 0; i < ScriptsOld.length; i++)
				{
					ActiveAdminPage.removeChild(ScriptsOld[i--]);
				}
				
				ActiveAdminPage.innerHTML = xmlhttp.responseText;
				
				var Scripts = ActiveAdminPage.getElementsByTagName('script');
				var CopyScript = [];
				
				//Faire un copie des scripts car CompilerJavascript va changer le de Scripts.
				for(var i = 0; i < Scripts.length; i++)
				{
					CopyScript[i] = Scripts[i];
				}
				
				for(var i = 0; i < CopyScript.length; i++)
				{
					CompilerJavascript(CopyScript[i], ActiveAdminPage);
				}
		    }
			else if (xmlhttp.readyState == 4)
			{
				AdminPageEditor.innerHTML = xmlhttpxmlhttp.statusText;
			}
		};
		var url = "/projet/h2015/equipe6/Admin/Code PHP/Sauvegarder Page Admin.php";
		xmlhttp.open('POST', url);
		xmlhttp.send(data);
	}
}