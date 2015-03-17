<?php
include_once 'db_connect.php';
include_once 'functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true)
{
    $logged = 'in';
}
else
{
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Secure Login: Log In</title>
        <link rel="stylesheet" href="styles/main.css" />
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
    </head>
    <body>
        <?php
        if (isset($_GET['error']))
		{
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 
        <form action="process_login.php" method="post" name="login_form">                      
            Usager: <input type="text" name="Usager" />
            Mot de passe: <input type="password" 
                             name="MotDePasse" 
                             id="MotDePasse"/>
            <input type="button" 
                   value="Login" 
                   onclick="formhash(this.form, this.form.MotDePasse);" /> 
        </form>
 
<?php
        if (login_check($mysqli) == true)
		{
			echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['Usager']) . '.</p>';
            echo '<p>Do you want to change user? <a href="logout.php">Log out</a>.</p>';
			if ($_SESSION['DroitsEnseignant'] == 'Tout les droits')
				echo "<a href='" . "/projet/h2015/equipe6/Admin/Admin homepage.php'>Administrer</a>";
        }
		else
		{
			echo '<p>Currently logged ' . $logged . '.</p>';
			echo "<p>If you don't have a login, please <a href='register.php'>register</a></p>";
        }
?>      
    </body>
</html>
