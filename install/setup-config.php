<?php
/**
 * Retrieves and creates the config.php file.
 *
 * The permissions for the base directory must allow for writing files in order
 * for the config.php to be created using this page.
 *
 * @package OpenDocMan
 * @subpackage Administration
 */
session_start();
/**
 * We are installing.
 *
 * @package OpenDocMan
 */
define('ODM_INSTALLING', true);

/**
 * We are blissfully unaware of anything.
 */
define('ODM_SETUP_CONFIG', true);

/**
 * Disable error reporting
 *
 * Set this to error_reporting( E_ALL ) or error_reporting( E_ALL | E_STRICT ) for debugging
 */
error_reporting(0);

define( 'ABSPATH', dirname(dirname(__FILE__)) . '/' );

/**#@-*/

if (!file_exists(ABSPATH . 'config-sample.php'))
{
	echo ('Det verkar som att filen "config-sample.php" inte finns på servern. Vänligen lägg till filen i rootmappen för installationen.');
        exit;
}

$configFile = file(ABSPATH . 'config-sample.php');

// Check if config.php has been created
if (file_exists(ABSPATH . 'config.php'))
{
	echo ("<p>Filen 'config.php' finns redan. Om du behöver skapa en ny fil vänligen radera den nuvarande först. Du kan köra <a href='./'>installationsscriptet</a> nu.</p>");
        exit;

}

if (isset($_GET['step']))
	$step = $_GET['step'];
else
	$step = 0;

/**
 * Display setup config.php file header.
 *
 */
function display_header() {
	header( 'Content-Type: text/html; charset=utf-8' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>HbgDoc (OpenDocMan) - Configuration</title>

    <link rel="stylesheet" href="http://helsingborg.se/wp-content/themes/Helsingborg/css/app.css">
    <link rel="stylesheet" href="http://helsingborg.se/wp-content/themes/Helsingborg/css/normalize.css">
    <link rel="stylesheet" href="/templates/common/css/install.css" type="text/css" />

    <script type="text/javascript" src="../includes/jquery.min.js"></script>
    <script type="text/javascript" src="../includes/jquery.validate.min.js"></script>
    <script type="text/javascript" src="../includes/additional-methods.min.js"></script>

    <link rel="icon" href="http://helsingborg.se/wp-content/themes/Helsingborg/assets/img/icons/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://helsingborg.se/wp-content/themes/Helsingborg/assets/img/icons/apple-touch-icon-144x144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://helsingborg.se/wp-content/themes/Helsingborg/assets/img/icons/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://helsingborg.se/wp-content/themes/Helsingborg/assets/img/icons/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="http://helsingborg.se/wp-content/themes/Helsingborg/assets/img/icons/apple-touch-icon-precomposed.png">
</head>
<body>
<div class="off-canvas-wrap">
<div class="inner-wrap">
<div class="main-site-container">
    <div class="site-bg"></div>
    <div class="site-header row">
        <div class="site-logo large-4 medium-4 columns">
            <a class="logo-link" href="/">
                <img class="logo" alt="helsingborg stad" src="http://helsingborg.se/wp-content/themes/Helsingborg/assets/img/images/hbg-logo.svg">
            </a>
        </div>
    </div>

    <div class="main-page-layout row">
            <div class="main-area large-12 columns">
                <div class="main-content row">
                <div class="news-section large-12 medium-12 columns">
                <div class="white-box orbit-container">
<?php
}//end function display_header();

switch($step) {
	case 0:
		display_header();
?>
<h1>Konfigurera &amp; Installera</h1>
<p>Välkommen till HbgDoc (Baserat på OpenDocMan). Innan du kan använda systemet måste denna installationsprocess köras. Vi behöver lite information om din databas för att kunna installera systemet. Detta behöver vi veta:</p>
<p>
<ol>
	<li>Databasens namn</li>
	<li>Databasens användarnamn</li>
	<li>Databasens lösenord</li>
	<li>Databasens serveradress</li>
	<li>Tabellprefix (om du vill köra mer än en instans av systemet från en och samma databas)</li>
</ol>
</p>
<p><strong>Du behöver också skapa upp en mapp där de uppladdade filerna ska sparas (din "dokumentmapp").</strong><br>
Mappen måste vara skrivbar och den bör ligga utanför den publika webbmappen.</p>

<p class="step"><a href="setup-config.php?step=1" class="button">Fortsätt</a></p>
<?php
	break;

	case 1:
		display_header();
	?>
<form method="post" id="configform" action="setup-config.php?step=2">
    <h1>Konfigurera &amp; Installera</h1>
    <div class="row">
        <div class="large-12 columns">
            <label>
                Databasens namn
                <input name="dbname" id="dbname" type="text" size="25" value="opendocman" class="required" minlength="2" />
                <small>Namnet på databasen där du vill installera HbgDoc.</small>
            </label>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <label>
                Databasens användarnamn
                <input name="uname" id="uname" type="text" size="25" value="username" class="required" minlength="2"/>
                <small>Användarnamnet på den databasanvändare du vill ansluta till databasen med.</small>
            </label>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <label>
                Databasens lösenord
                <input name="pwd" id="pwd" type="text" size="25" value="password" />
                <small>Lösenordet till den databasanvändare du vill ansluta till databasen med.</small>
            </label>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <label>
                Databasserver
                <input name="dbhost" id="dbhost" type="text" size="25" value="localhost" class="required" minlength="2"/>
                <small>Adress till databasservern.</small>
            </label>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <label>
                Tabellprefix
                <input name="prefix" id="prefix" type="text" value="hbg_" size="8" class="required" minlength="2"/>
                <small>Om du ska köra flera parallella installationer i samma databas, ändra detta fält för att sätta ett prefix på tabellnamnen.</small>
            </label>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <label>
                Administratörslösenord
                <input name="adminpass" id="adminpass" type="text" value="" size="8" class="required" minlength="5"/>
                <small>Önskat lösenord på det administratörskonto som automatiskt skapas i installationen.</small>
            </label>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <label>
                Sökväg till dokumentmapp
                <input name="datadir" id="datadir" type="text" value="<?php echo dirname($_SERVER['DOCUMENT_ROOT']);?>/odm_data/" size="45" class="required" minlength="2"/>
                <small>Sökväg till den mapp där du avser att uppladdade filer ska sparas. Observera att mappen måste vara skrivbar.</small>
            </label>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <label>
                Bas URL
                <input name="baseurl" id="baseurl" type="text" size="45" class="required url2" minlength="2" value="http://<?php echo $_SERVER['HTTP_HOST'];?>/documents"/>
                <small>Ange den url som HbgDoc kommer köras från.</small>
            </label>
        </div>
    </div>

	<p class="step"><input name="submit" type="submit" value="Submit" class="button" /></p>
</form>
<script>
    $("#configform").validate();
</script>
<?php
	break;

	case 2:
        // Test the db connection.
	/**#@+
	 * @ignore
	 */
	define('DB_NAME', trim($_POST['dbname']));
	define('DB_USER', trim($_POST['uname']));
	define('DB_PASS', trim($_POST['pwd']));
	define('DB_HOST', trim($_POST['dbhost']));

	// We'll fail here if the values are no good.
		$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";
		try {
			$pdo = new PDO($dsn, DB_USER, DB_PASS);
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$dbname  = sanitizeme(trim($_POST['dbname']));
	$uname   = sanitizeme(trim($_POST['uname']));
	$passwrd = sanitizeme(trim($_POST['pwd']));
	$dbhost  = sanitizeme(trim($_POST['dbhost']));
	$prefix  = sanitizeme(trim($_POST['prefix']));
        $adminpass  = sanitizeme(trim($_POST['adminpass']));
        $datadir  = sanitizeme(trim($_POST['datadir']));
        $baseurl  = sanitizeme(trim($_POST['baseurl']));

        // Clean up the datadir a bit to make sure it ends with slash
        if(substr($datadir,-1) != '/')
        {
            $datadir .= '/';
        }

        // If no prefix is set, use default
        if ( empty($prefix) )
		$prefix = 'odm_';

        // Require values from form fields
	// Validate $prefix: it can only contain letters, numbers and underscores
	if ( preg_match( '|[^a-z0-9_]|i', $prefix ) )
		die('<strong>ERROR</strong>: "Table Prefix" can only contain numbers, letters, and underscores.' );
         $_SESSION['db_prefix'] = $prefix;
         $_SESSION['datadir'] = $datadir;
         $_SESSION['baseurl'] = $baseurl;
         $_SESSION['adminpass'] = $adminpass;

        // Here we check their datadir value and try to create the folder. If we cannot, we will warn them.
        if(!is_dir($datadir))
        {
            if(!mkdir($datadir))
            {
                echo 'Kunde inte skapa upp dokumentmappen. Du måste skapa upp den manuellt här: ' . $datadir;
            }
        }
        elseif(!is_writable($datadir))
        {
            echo 'Dokumentmappen finns, men servern kan inte skriva till mappen. Kontrollera att mappen är skrivbar: ' . $datadir;
        }

        // Verify the templates_c is writeable
        if(!is_writable(ABSPATH . '/templates_c'))
        {
            echo 'Kunde inte skriva till mappen <kbd>templates_c</kbd>. Kontrollera <kbd>' . ABSPATH . '/templates_c</kbd> är skrivbar.';
        }

        // We also need to guess at their base_url value

        // Now replace the default config values with the real ones
	foreach ($configFile as $line_num => $line) {
		switch (substr($line,0,16)) {
			case "define('DB_NAME'":
				$configFile[$line_num] = str_replace("database_name_here", $dbname, $line);
				break;
			case "define('DB_USER'":
				$configFile[$line_num] = str_replace("'username_here'", "'$uname'", $line);
				break;
			case "define('DB_PASS'":
				$configFile[$line_num] = str_replace("'password_here'", "'$passwrd'", $line);
				break;
			case "define('DB_HOST'":
				$configFile[$line_num] = str_replace("localhost", $dbhost, $line);
				break;
			case '$GLOBALS[\'CONFIG':
				$configFile[$line_num] = str_replace('odm_', $prefix, $line);
				break;
		}
	}
	if ( ! is_writable(ABSPATH) ) {
		display_header();
?>
<p>Tyvärr kunde inte konfigurationsfilen <kbd>config.php</kbd> sparas automatiskt.<br>
Skapa en ny fil i rooten för denna installation och döp den till <kbd>config.php</kbd>, klistra in innehållet i rutan nedan i din nyskapade fil.</p>
<p>
<textarea cols="98" rows="15" class="code"><?php
		foreach( $configFile as $line ) {
			echo htmlentities($line, ENT_COMPAT, 'UTF-8');
		}
?></textarea>
</p>
<p>När du är klar, klicka på "Fortsätt".</p>
<p class="step"><a href="index.php" class="button">Fortsätt</a></p>
<?php
        }else {

		$handle = fopen(ABSPATH . 'config.php', 'w');
		foreach( $configFile as $line ) {
			fwrite($handle, $line);
		}
		fclose($handle);
		chmod(ABSPATH . 'config.php', 0666);
		display_header();
?>
<p>Konfigurationsfilen skapades. Nu kan du fortsätta för att installera alla tabeller till databasen.</p>

<p class="step"><a href="index.php" class="button">Installera</a></p>
<?php
        }
	break;
}

function cleanInput($input)
{

    $search = array(
            '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
            '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
            '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
            '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
    );
    $output = preg_replace($search, '', $input);
    return $output;
}

function sanitizeme($input)
{
    if (is_array($input))
    {
        foreach($input as $var=>$val)
        {
            $output[$var] = sanitizeme($val);
        }
    }
    else
    {
        if (get_magic_quotes_gpc())
        {
            $input = stripslashes($input);
        }
        //echo "Raw Input:" . $input . "<br />";
        $input  = cleanInput($input);
        $input = strip_tags($input); // Remove HTML
        $input = htmlspecialchars($input); // Convert characters
        $input = trim(rtrim(ltrim($input))); // Remove spaces
        $input = $input; // Prevent SQL Injection
        $output=$input;
    }
    if(isset($output) && $output != '')
    {
        return $output;
    }
    else
    {
        return false;
    }
}
?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
