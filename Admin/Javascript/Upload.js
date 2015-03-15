var CreerNouveauDossier = function ()
{
	var NomDossier = prompt("Entrez un nom de nouveau dossier", "Nouveau dossier");
    
    if (NomDossier != null)
	{
		var data = new FormData();
		data.append('NomDossier', NomDossier);

		var xmlhttp;
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp = new XMLHttpRequest();
		}
		else {// code for IE6, IE5
		    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
	
		xmlhttp.onreadystatechange = function () {
		    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			
				var NewOption= document.createElement("option");
				NewOption.value = NomDossier;
				NewOption.innerHTML = NomDossier;
				ChoixDossier.appendChild(NewOption);
				
				if (xmlhttp.responseText != "")
					ActiveThumbnailsContainer.innerHTML = xmlhttp.responseText;
		    }
		};

		var url = "/projet/h2015/equipe6/Admin/Code PHP/Create Dossier.php";
		xmlhttp.open('POST', url);
		xmlhttp.send(data);
	}
}
var RenommerDossier = function ()
{
    if (ChoixDossier.selectedIndex >= 0)
	{
		var NomDossier = prompt("Entrez un nom", ChoixDossier.value);
		
		if (NomDossier != null)
		{
			var data = new FormData();
			data.append('NomDossierAncien', ChoixDossier.value);
			data.append('NomDossierNouveau', NomDossier);

			var xmlhttp;
			if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			}
			else {// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
		
			xmlhttp.onreadystatechange = function () {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					ChoixDossier.options[ ChoixDossier.selectedIndex ].value = NomDossier;
					ChoixDossier.options[ ChoixDossier.selectedIndex ].innerHTML = NomDossier;

					if (xmlhttp.responseText != "")
						ActiveThumbnailsContainer.innerHTML = xmlhttp.responseText;
				}
			};

			var url = "/projet/h2015/equipe6/Admin/Code PHP/Renommer Dossier.php";
			xmlhttp.open('POST', url);
			xmlhttp.send(data);
		}
	}
}
var SupprimerDossierActuel = function ()
{
    if (ChoixDossier.selectedIndex >= 0 && confirm("Voulez-vous vraiment supprimer ce dossier?"))
	{
		var data = new FormData();
		data.append('NomDossier', ChoixDossier.value);

		var xmlhttp;
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp = new XMLHttpRequest();
		}
		else {// code for IE6, IE5
		    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
	
		xmlhttp.onreadystatechange = function () {
		    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				ChoixDossier.remove(ChoixDossier.selectedIndex);
				ChoisirDossier();
				
				if (xmlhttp.responseText != "")
					ActiveThumbnailsContainer.innerHTML = xmlhttp.responseText;
		    }
		};

		var url = "/projet/h2015/equipe6/Admin/Code PHP/Supprimer Dossier.php";
		xmlhttp.open('POST', url);
		xmlhttp.send(data);
	}
}
var ChoisirDossier = function ()
{
    if (ChoixDossier.selectedIndex >= 0)
	{
		var data = new FormData();
		data.append('NomDossier', ChoixDossier.value);

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
		        var Output = "";
				var res = xmlhttp.responseText.split(";");
				for (i = 0; i < res.length; i++)
				{
					if (res[i] == '')
						continue;

					Output += CreateThumnail(res[i] , ChoixDossier.value);
				}
		        TumbnailsContainer.innerHTML = Output;
		    }
		};
		var url = "/projet/h2015/equipe6/Admin/Code PHP/Choisir Dossier.php";
		xmlhttp.open('POST', url);
		xmlhttp.send(data);
	}
}
var CreateThumnail = function (NomImage, CheminDossier)
{
	var CheminDossierComplet = "/projet/h2015/equipe6/Images/" + CheminDossier + "/";
	var Output = "";
	Output += "<div class='Thumbnail'";
	if (typeof UsingCKEditor != 'undefined')
		Output += "onclick='SelectionnerImage(this, \"" + CheminDossierComplet + NomImage + "\")'";
	Output += ">";
	if (typeof UsingCKEditor == 'undefined')
		Output += "<a href='" + CheminDossierComplet + NomImage + "'>";
	
	Output += "<img src='" + CheminDossierComplet + "mini/" + NomImage + "' class='Miniature' alt='' />";
	if (typeof UsingCKEditor == 'undefined')
		Output += "</a>";
	
	Output += "<br />";
	Output += "<div>";
	Output += "<button class='close pull-right' onclick='SupprimerImage(this, \"" + NomImage;
	Output += "\")'>&times;</button>";
	Output += "</div>";
	Output += "<br />";
	Output += "</div>";
	return Output;
}

var SelectionnerImage = function (SelectedItem, NomImage)
{
	var nodes = SelectedItem.parentNode.childNodes;
	for(var i = 0; i < nodes.length; i++)
	{
		 nodes[i].className = "Thumbnail";
	}
	SelectedItem.className = "Thumbnail Selected";
	ImageChoisie = NomImage;
}

var EnvoyerImage = function (ActiveThumbnailsContainer, InputFile) {

    if (InputFile.files.length === 0) {
        return;
    }
    InitialisationEnvoi(InputFile);
	var UploadPath = 'projet/h2015/equipe6/Images/' + ChoixDossier.value + '/';

    var data = new FormData();
    data.append('SelectedFile', InputFile.files[0]);
    data.append('UploadPath', UploadPath);

    var xmlhttp;
    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
	
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			var FileName = InputFile.files[0].name;
            BoutonVoirImage.href = UploadPath + FileName;
            NomImage.innerHTML = FileName;
			BoutonFermer.setAttribute('onclick',"FermerForm(" + InputFile.id + ")");
            var Output = CreateThumnail(FileName , ChoixDossier.value);
            ActiveThumbnailsContainer.innerHTML += Output;
			if (xmlhttp.responseText != "")
				ActiveThumbnailsContainer.innerHTML = xmlhttp.responseText;
        }
    };

    ProgressionHttp(xmlhttp);

    var url = "/projet/h2015/equipe6/Admin/Code PHP/UploadAjax.php";
    xmlhttp.open('POST', url);
    xmlhttp.send(data);
}

var InitialisationEnvoi = function (_file) {
    BoiteDeContenu.style.visibility = "visible";

    Image.file = _file.files[0];

    var reader = new FileReader();
    reader.onload = (function (aImg) {
        return function (e) {
            aImg.src = e.target.result;
        };
    })(Image);
    reader.readAsDataURL(_file.files[0]);
}

var ProgressionHttp = function (xmlhttp) {
    xmlhttp.upload.addEventListener('progress', function (e) {
        var ProgressValue = Math.ceil(e.loaded / e.total) * 100;
        if (ProgressValue > 10) {
            if (ProgressValue < 100) {
                _progress.style.width = ProgressValue + '%';
                _progress.innerHTML = ProgressValue + '%';
            }
            else {
                _progress.style.width = '100%';
                _progress.innerHTML = "Téléversement terminé";
            }
        }
    }, false);
}

var FermerForm = function (InputFile) {
    InputFile.parentNode.reset();
    BoiteDeContenu.style.visibility = "hidden";
}

function SupprimerImage(TagImage, NomImage) {
	if (confirm("Voulez-vous vraiment supprimer cette image?"))
	{
    	var data = new FormData();
		data.append('NomDossier', ChoixDossier.value);
		data.append('NomImage', NomImage);

	    var xmlhttp;
	    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
	        xmlhttp = new XMLHttpRequest();
	    }
	    else {// code for IE6, IE5
	        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	    }

	    xmlhttp.onreadystatechange = function () {
	        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	            Succes(xmlhttp.responseText);
	        }
	    }
		var url = "/projet/h2015/equipe6/Admin/Code PHP/Supprimer Image.php";
		xmlhttp.open('POST', url);
		xmlhttp.send(data);

	    function Succes(response) {
	        var TagASupprimer = TagImage.parentNode.parentNode;
	        TagASupprimer.parentNode.removeChild(TagASupprimer);
	    }
	}
}

