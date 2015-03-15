var CreateActivite = function ()
{
    var data = new FormData();
    data.append('ActiviteNom', ActiviteNom.value);
    data.append('ActiviteDate', ActiviteDate.value);
    data.append('ActivitePrix', ActivitePrix.value);
    data.append('ActiviteLimite', ActiviteLimite.value);

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
			if (xmlhttp.responseText[0] != "1")
				ContainerActivite.innerHTML = xmlhttp.responseText;
			else
			{
				var res = xmlhttp.responseText.split(";");
				
				var Output = "";
				Output += '<table style="width:100%">';
				Output += '<caption style="text-align: left">';
				Output += 'Nom : ' + ActiviteNom.value + '  Date : ' + ActiviteDate.value + '  Prix : ';
				if (ActivitePrix.value > 0)
					Output += ActivitePrix.value;
				else
					Output += "Gratuit";
				Output += '<input type="button" value="Supprimer" onclick="DeleteActivite(this, ' + res[1] + ')">';
				Output += '</caption>';
				Output += "<tr>";
				Output += "<th>";
				Output += "Prenom";
				Output += "</th>";
				Output += "<th>";
				Output += "Nom";
				Output += "</th>";
				Output += "<th>";
				Output += "Date inscription";
				Output += "</th>";
				Output += "<th>";
				Output += "Status";
				Output += "</th>";
				Output += "</tr>";
				Output += '</table>';
				ContainerActivite.innerHTML += Output;
			}
        }
    };

    var url = "Code PHP/Create Activite.php";
    xmlhttp.open('POST', url);
    xmlhttp.send(data);
}
var DeleteActivite = function (Sender, id)
{
    var data = new FormData();
    data.append('id', id);

    var xmlhttp;
    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
	
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			ContainerActivite.removeChild(Sender.parentNode.parentNode);
			if (xmlhttp.responseText != "1")
				ContainerActivite.innerHTML = xmlhttp.responseText;
        }
    };

    var url = "Code PHP/Delete Activite.php";
    xmlhttp.open('POST', url);
    xmlhttp.send(data);
}
