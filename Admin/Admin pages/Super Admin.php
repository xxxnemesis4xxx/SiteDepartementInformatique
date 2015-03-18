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
<script type="text/javascript" src="/projet/h2015/equipe6/Admin/Javascript/Super Admin.js"></script>

<div>
	<select style="display: block;width:200px;" id="ChoixPageAdmin" size="5" onchange="ChoisirPageAdmin()">
		<?php 
			$root = $_SERVER['DOCUMENT_ROOT'] . "/projet/h2015/equipe6";
			$PageAdminFolder = "/Admin/Admin pages";
			$FinalPageAdminFolder = "$root$PageAdminFolder";
			foreach (new DirectoryIterator($FinalPageAdminFolder) as $fileInfo)
			{
				if ($fileInfo->isDot())
					continue;

				$FileName = $fileInfo->getBasename();
				echo "<option value='$FileName'>$FileName</option>";
			}
		?>
	</select>
	<input type='button' value='Créer nouvelle page' onclick="CreerNouvellePageAdmin()">
	<input type='button' value='Renommer page' onclick="RenommerPageAdmin()">
	<input type='button' value='Supprimer page actuelle' onclick="SupprimerPageAdmin()">
</div>
<textarea id="AdminPageEditor" style="display: block;width:100%;height:700px;" >
</textarea>
<input type='button' value='Sauvegarder' onclick="SauvegarderPageAdmin()">

<script type="text/javascript" src="/projet/h2015/equipe6/Admin/Javascript/Init Super Admin.js"></script>
<?php else : ?>
            <p>
                <span class="error">Vous n'avez pas le droit d'accéder à cette Page!</span> Vous devez vous <a href="http://205.236.12.52/projet/h2015/equipe6/Connexion/index.php">connecter</a>.
            </p>
        <?php endif; ?>