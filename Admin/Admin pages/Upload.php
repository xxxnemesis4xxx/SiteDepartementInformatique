<?php
				header('Content-Type: text/html; charset=utf-8');
				setlocale(LC_ALL, 'fr_CA');
?>
<?php
	include_once $_SERVER['DOCUMENT_ROOT'] . '/projet/h2015/equipe6/Connexion/db_connect.php';
	include_once $_SERVER['DOCUMENT_ROOT'] . '/projet/h2015/equipe6/Connexion/functions.php';
	 
	sec_session_start();
?>
<?php if (login_check($mysqli) == true && isset($_SESSION['DroitsEnseignant']) && $_SESSION['DroitsEnseignant'] == "Tout les droits") : ?>
<link rel="stylesheet" type="text/css" href="/projet/h2015/equipe6/Admin/CSS/Upload.css">

<style>
	.Miniature
	{
		width: 50px;
		height: 50px;
	}
	.Thumbnail
	{
		display: inline-block;
		padding: 1px 5px;
	}
</style>

<script type="text/javascript" src="/projet/h2015/equipe6/Admin/Javascript/Upload.js"></script>
<ul>
	<li style="list-style: none;font-size:26px;">
		<a href="http://205.236.12.52/projet/h2015/equipe6/Admin/Admin%20homepage.php" style="border : 2px solid black;background-color:gray">
			<span style="color:rgb(255,224,100)">Retour</span>
		</a>
	</li>
</ul>
<div>
	<select style="display: block;width:200px;" id="ChoixDossier" size="5" onchange="ChoisirDossier()">
		<?php
			if (isset($UsingCKEditor))
				echo '<script type="text/javascript">var UsingCKEditor = true;</script>';

			$root = $_SERVER['DOCUMENT_ROOT'] . "/projet/h2015/equipe6";
			$UploadFolder = "/Images";
			$FinalUploadFolder = "$root$UploadFolder";
			foreach (new DirectoryIterator($FinalUploadFolder) as $fileInfo)
			{
				if (!$fileInfo->IsDir() || $fileInfo->isDot())
					continue;

				$FileName = $fileInfo->getBasename();
				echo "<option value='$FileName'>$FileName</option>";
			}
		?>
	</select>
	<input type='button' value='Créer nouveau dossier' onclick="CreerNouveauDossier()">
	<input type='button' value='Renommer dossier actuel' onclick="RenommerDossier()">
	<input type='button' value='Supprimer dossier actuel' onclick="SupprimerDossierActuel()">
</div>

<div id="BoiteDeContenu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<img id="Aperçu"/>
	<div class="progress" id="Contenantprogressbar">
		<div class="progress bar" role="progressbar" style="width: 10%; height:100%" id="Barre de progression">
		0%
		</div>
	</div>
	<a id="BoutonVoirImage" href="">Voir Image</a>
	<button data-dismiss="modal" id="BoutonFermer" onclick="FermerForm()">Fermer</button>
	<label id="LabelNomImage">Nom image</label>
</div>

<br />
<div id="Images">
	<form  method="post" enctype="multipart/form-data">
		Choisir image:  <input type='file' id='InputFile' accept="image/*">
						<input type='button' value='Envoyer' onclick="EnvoyerImage(TumbnailsContainer, InputFile)">
						<input type="hidden" name="MAX_FILE_SIZE" value="2097153">

	</form>
	<br />
	<div id="Thumbnails" style="width:100%;">
	</div>
</div>

<script type="text/javascript" src="/projet/h2015/equipe6/Admin/Javascript/Init Upload.js"></script>
<script type="text/javascript">
ChoisirDossier(ChoixDossier);
</script>
<?php else : ?>
            <p>
                <span class="error">Vous n'avez pas le droit d'accéder à cette Page!</span> Vous devez vous <a href="http://205.236.12.52/projet/h2015/equipe6/Connexion/index.php">connecter</a>.
            </p>
        <?php endif; ?>
