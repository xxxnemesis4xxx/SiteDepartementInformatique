<?php
include_once 'db_connect.php';
include_once 'psl-config.php';
 
$error_msg = "";
 
if (isset($_POST['Prenom'], $_POST['Nom'], $_POST['Usager'], $_POST['p'])) {
    // Sanitize and validate the data passed in
    $Prenom = filter_input(INPUT_POST, 'Prenom', FILTER_SANITIZE_STRING);
    $Nom = filter_input(INPUT_POST, 'Nom', FILTER_SANITIZE_STRING);
    $Usager = filter_input(INPUT_POST, 'Usager', FILTER_SANITIZE_STRING);
 
    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    if (strlen($password) != 128)
	{
        // The hashed pwd should be 128 characters long.
        // If it's not, something really odd has happened
        $error_msg .= '<p class="error">Invalid password configuration.</p>';
    }
 
    // Usager validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //
 
    // check existing Usager
    $prep_stmt = "SELECT ID FROM Enseignants WHERE Usager = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt)
	{
        $stmt->bind_param('s', $Usager);
        $stmt->execute();
        $stmt->store_result();
 
		if ($stmt->num_rows == 1)
		{
			$error_msg .= '<p class="error">Un enseignant avec cet Usager est déjà existant</p>';
			$stmt->close();
		}
		$stmt->close();
	}
	else
	{
			$error_msg .= '<p class="error">Database error line 55</p>';
			$stmt->close();
	}
 
    // TODO: 
    // We'll also have to account for the situation where the user doesn't have
    // rights to do registration, by checking what type of user is attempting to
    // perform the operation.
 
    if (empty($error_msg))
	{
        // Create a random salt
        $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
 
        // Create salted password 
        $password = hash('sha512', $password . $random_salt);
 
        // Insert the new user into the database 
        if ($insert_stmt = $mysqli->prepare("INSERT INTO Enseignants (IDDroits, Prenom, Nom, Usager, MotDePasse, Salt) VALUES (1, ?, ?, ?, ?, ?)"))
		{
            $insert_stmt->bind_param('sssss', $Prenom, $Nom, $Usager, $password, $random_salt);
            // Execute the prepared query.
            if (! $insert_stmt->execute())
			{
                header('Location: error.php?err=Registration failure: INSERT');
            }
        }
        header('Location: register_success.php');
    }
}
