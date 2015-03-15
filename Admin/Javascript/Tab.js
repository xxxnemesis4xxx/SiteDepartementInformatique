function ChangeTab(name)
{
	document.getElementById('Tab header '+ anc_onglet).className = 'TabIdle Tab';
	document.getElementById('Tab header '+ name).className = 'TabSelected Tab';
	document.getElementById('Tab content '+ anc_onglet).style.display = 'none';
	document.getElementById('Tab content '+ name).style.display = 'block';
	anc_onglet = name;
}

function CreateTab(Nom, Extension)
{
	var data = new FormData();
	data.append('NomPageAdmin', Nom);
	data.append('Extension', Extension);
	
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
			var NewSpanHeader = document.createElement("span");
			NewSpanHeader.id = 'Tab header ' + Nom;
			NewSpanHeader.className = "TabIdle Tab";
			NewSpanHeader.onclick = ChangeTab.bind(NewSpanHeader, Nom);
			NewSpanHeader.innerHTML = Nom;
			AdminTabs.appendChild(NewSpanHeader);
			
			var NewDivContent = document.createElement("div");
			NewDivContent.id = 'Tab content ' + Nom;
			NewDivContent.className = "TabContent";
			NewDivContent.innerHTML = xmlhttp.responseText;
			AdminContent.appendChild(NewDivContent);
			
			var NewContent = document.getElementById('Tab content ' + Nom);
			var Scripts = NewContent.getElementsByTagName('script');
			
			for(var i = Scripts.length - 1; i >= 0; --i)
			{
				CompilerJavascript(Scripts[i], NewDivContent);
			}
		}
	};
	var url = "/projet/h2015/equipe6/Admin/Code PHP/Compiler Page Admin.php";
	xmlhttp.open('POST', url);
	xmlhttp.send(data);
}

function CompilerJavascript(ActiveScript, Container)
{
	var NewScript = document.createElement("script");
	
	if (ActiveScript.src != "")
		NewScript.src = ActiveScript.src;
		
	if (ActiveScript.innerHTML != "")
		NewScript.innerHTML = ActiveScript.innerHTML;
		
	Container.removeChild(ActiveScript);
	Container.appendChild(NewScript);
}