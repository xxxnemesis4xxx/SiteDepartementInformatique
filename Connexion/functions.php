<?php
include_once 'psl-config.php';
 
function sec_session_start()
{
    $session_name = 'sec_session_id';   // Set a custom session name
    $secure = SECURE;
    // This stops JavaScript being able to access the session id.
    $httponly = true;
    // Forces sessions to only use cookies.
    if (ini_set('session.use_only_cookies', 1) === FALSE)
	{
        header("Location: error.php?err=Could not initiate a safe session (ini_set)");
        exit();
    }
    // Gets current cookies params.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"],
        $cookieParams["path"], 
        $cookieParams["domain"], 
        $secure,
        $httponly);
    // Sets the session name to the one set above.
    session_name($session_name);
    session_start();            // Start the PHP session 
    session_regenerate_id(true);    // regenerated the session, delete the old one. 
}
function login($Usager, $password, $mysqli) {
    // Using prepared statements means that SQL injection is not possible. 
    if ($stmt = $mysqli->prepare("SELECT ID, Usager, MotDePasse, Salt 
        FROM Enseignants
		WHERE Usager = ?
        LIMIT 1"))
	{
        $stmt->bind_param('s', $Usager);  // Bind "$Usager" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($user_id, $Usager, $db_password, $salt);
        $stmt->fetch();
 
        // hash the password with the unique salt.
        $password = hash('sha512', $password . $salt);
        if ($stmt->num_rows == 1)
		{
            // If the user exists we check if the account is locked
            // from too many login attempts 
            if (checkbrute($user_id, $mysqli) == true)
			{
                // Account is locked 
                // Send an email to user saying their account is locked
                return false;
            }
			else
			{
                // Check if the password in the database matches
                // the password the user submitted.
                if ($db_password == $password)
				{
                    // Password is correct!
					
					if ($stmt = $mysqli->prepare("SELECT D.NomDroit FROM Enseignants E JOIN Droits D ON E.IDDroits = D.ID WHERE E.ID = ?"))
					{
						$stmt->bind_param('i', $user_id);  // Bind "$user_id to parameter.
						$stmt->execute();    // Execute the prepared query.
						$stmt->store_result();
						
						// get variables from result.
						$stmt->bind_result($DroitsEnseignant);
						$stmt->fetch();
					}
					
					if ($stmt->num_rows == 1)
					{
						// Get the user-agent string of the user.
						$user_browser = $_SERVER['HTTP_USER_AGENT'];
						// XSS protection as we might print this value
						$user_id = preg_replace("/[^0-9]+/", "", $user_id);
						$_SESSION['user_id'] = $user_id;
						// XSS protection as we might print this value
						$Usager = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $Usager);
						$_SESSION['Usager'] = $Usager;
						$_SESSION['DroitsEnseignant'] = $DroitsEnseignant;
						$_SESSION['login_string'] = hash('sha512', $password . $user_browser);
						
						// Login successful.
						return true;
					}
				}
				else
				{
                    // Password is not correct
                    // We record this attempt in the database
                    $now = time();
                    $mysqli->query("INSERT INTO NombreConnexion(EnseignantID, DateConnexion)
                                    VALUES ('$user_id', '$now')");
                    return false;
                }
            }
        } else {
            // No user exists.
            return false;
        }
    }
}
function checkbrute($user_id, $mysqli)
{
    // Get timestamp of current time 
    $now = time();
 
    // All login attempts are counted from the past 2 hours. 
    $valid_attempts = $now - (2 * 60 * 60);
 
    if ($stmt = $mysqli->prepare("SELECT DateConnexion 
									FROM NombreConnexion 
									WHERE EnseignantID = ? 
									AND DateConnexion > '$valid_attempts'")) {
        $stmt->bind_param('i', $user_id);
 
        // Execute the prepared query. 
        $stmt->execute();
        $stmt->store_result();
 
        // If there have been more than 5 failed logins 
        if ($stmt->num_rows > 5) {
            return true;
        } else {
            return false;
        }
    }
}
function login_check($mysqli)
{
    // Check if all session variables are set 
    if (isset($_SESSION['user_id'], $_SESSION['Usager'], $_SESSION['login_string']))
	{
        $user_id = $_SESSION['user_id'];
        $login_string = $_SESSION['login_string'];
        $username = $_SESSION['Usager'];
 
        // Get the user-agent string of the user.
        $user_browser = $_SERVER['HTTP_USER_AGENT'];
 
        if ($stmt = $mysqli->prepare("SELECT MotDePasse FROM Enseignants WHERE ID = ? LIMIT 1"))
		{
            // Bind "$user_id" to parameter. 
            $stmt->bind_param('i', $user_id);
            $stmt->execute();   // Execute the prepared query.
            $stmt->store_result();
 
            if ($stmt->num_rows == 1) {
                // If the user exists get variables from result.
                $stmt->bind_result($password);
                $stmt->fetch();
                $login_check = hash('sha512', $password . $user_browser);
 
                if ($login_check == $login_string)
				{
                    // Logged In!!!! 
                    return true;
                }
				else
				{
                    // Not logged in 
                    return false;
                }
            }
			else
			{
                // Not logged in 
                return false;
            }
        }
		else
		{
            // Not logged in 
            return false;
        }
    }
	else
	{
        // Not logged in 
        return false;
    }
}
function esc_url($url)
{
 
    if ('' == $url)
	{
        return $url;
    }
 
    $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);
 
    $strip = array('%0d', '%0a', '%0D', '%0A');
    $url = (string) $url;
 
    $count = 1;
    while ($count)
	{
        $url = str_replace($strip, '', $url, $count);
    }
 
    $url = str_replace(';//', '://', $url);
 
    $url = htmlentities($url);
 
    $url = str_replace('&amp;', '&#038;', $url);
    $url = str_replace("'", '&#039;', $url);
 
    if ($url[0] !== '/')
	{
        // We're only interested in relative links from $_SERVER['PHP_SELF']
        return '';
    } else {
        return $url;
    }
}
