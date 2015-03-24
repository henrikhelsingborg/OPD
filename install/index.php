<?php
/*
install/index.php - Automated setup/upgrade script. Remove after installation
Copyright (C) 2002-2014  Stephen Lawrence

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 3
of the License, or any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
*/
// Sanity check.
if ( false ) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Error: PHP is not running</title>
</head>
<body>
	<h1 id="logo"><img alt="OpenDocMan" src="../images/logo.gif" /></h1>
	<h2>Error: PHP is not running</h2>
	<p>OpenDocMan requires that your web server is running PHP. Your server does not have PHP installed, or PHP is turned off.</p>
</body>
</html>
<?php
exit;
}

session_start();

if ( file_exists('../config.php') && (!isset($_SESSION['datadir']) ) )
{
    echo "<p>Looks like the file 'config.php' already exists. If you need to re-install, please delete it or rename it first. You may then <a href='./'>try again</a>.</p>";
    exit;
}
// Search for the config file in parent folder
// If not found, redirect to index for install routine
if(file_exists('../config.php'))
{
    include('../config.php');
}
else
{
    Header('Location: ../index.php');
}

// Lets get a connection going

$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";
try {
    $pdo = new PDO($dsn, DB_USER, DB_PASS);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . " - Please make sure you have created a database<br/>";
    die();
}
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow" />

    <title>HbgDoc (OpenDocMan) - Configuration</title>

    <link rel="stylesheet" href="http://helsingborg.se/wp-content/themes/Helsingborg/css/app.css">
    <link rel="stylesheet" href="http://helsingborg.se/wp-content/themes/Helsingborg/css/normalize.css">
    <link rel="stylesheet" href="/templates/common/css/install.css" type="text/css" />

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
                    <a class="logo-link" href="http://helsingborg.se">
                        <img class="logo" alt="helsingborg stad" src="http://helsingborg.se/wp-content/themes/Helsingborg/assets/img/images/hbg-logo.svg">
                    </a>
                </div>
            </div>
            <div class="main-page-layout row">
                <div class="main-area large-12 columns">
                    <div class="main-content row">
                        <div class="news-section large-12 medium-12 columns">
                            <div class="white-box orbit-container">
                                <h1 class="left">Databasinstallation</h1>
                                <!--<a href="../docs/opendocman.txt" target="#main" class="right">Öppna installationsinstruktioner (engelska)</a>-->
                                <div class="clearfix"></div>
                                <?php
                                    if(!isset($_REQUEST['op']))
                                    {
                                        $_REQUEST['op'] = '';
                                    }

                                    switch($_REQUEST['op'])
                                    {
                                        case "install":
                                            do_install();
                                            break;

                                        case "commitinstall":

                                            break;
                                        // User has version 1.0 and is upgrading
                                        case "update_10":
                                            do_update_10();
                                            do_update_11rc1();
                                            do_update_11rc2();
                                            do_update_11();
                                            do_update_12rc1();
                                            do_update_12p1();
                                            do_update_12p3();
                                            do_update_124();
                                            do_update_1252();
                                            do_update_1256();
                                            do_update_1257();
                                            do_update_1261();
                                            do_update_1262();
                                            do_update_1263();
                                    do_update_128();
                                            do_update_129();
                                            break;
                                        // User has version 11rc1 and is upgrading
                                        case "update_11rc1":
                                            do_update_11rc1();
                                            do_update_11rc2();
                                            do_update_11();
                                            do_update_12rc1();
                                            do_update_12p1();
                                            do_update_12p3();
                                            do_update_124();
                                            do_update_1252();
                                            do_update_1256();
                                            do_update_1257();
                                            do_update_1261();
                                            do_update_1262();
                                            do_update_1263();
                                    do_update_128();
                                            do_update_129();
                                            break;

                                        // User has version 11rc2 and is upgrading
                                        case "update_11rc2":
                                            do_update_11rc2();
                                            do_update_11();
                                            do_update_12rc1();
                                            do_update_12p1();
                                            do_update_12p3();
                                            do_update_124();
                                            do_update_1252();
                                            do_update_1256();
                                            do_update_1257();
                                            do_update_1261();
                                            do_update_1262();
                                            do_update_1263();
                                    do_update_128();
                                            do_update_129();
                                            break;

                                        // User has version 11 and is upgrading
                                        case "update_11":
                                            do_update_11();
                                            do_update_12rc1();
                                            do_update_12p1();
                                            do_update_12p3();
                                            do_update_124();
                                            do_update_1252();
                                            do_update_1256();
                                            do_update_1257();
                                            do_update_1261();
                                            do_update_1262();
                                            do_update_1263();
                                    do_update_128();
                                            do_update_129();
                                            break;

                                        // User has version 12rc1 and is upgrading
                                        case "update_12rc1":
                                            do_update_12rc1();
                                            do_update_12p1();
                                            do_update_12p3();
                                            do_update_124();
                                            do_update_1252();
                                            do_update_1256();
                                            do_update_1257();
                                            do_update_1261();
                                            do_update_1262();
                                            do_update_1263();
                                    do_update_128();
                                            do_update_129();
                                            break;

                                        // User has version 12p1 and is upgrading
                                        case "update_12p1":
                                            do_update_12p1();
                                            do_update_12p3();
                                            do_update_124();
                                            do_update_1252();
                                            do_update_1256();
                                            do_update_1257();
                                            do_update_1261();
                                            do_update_1262();
                                            do_update_1263();
                                    do_update_128();
                                            do_update_129();
                                            break;

                                        // User has version 12p3 and is upgrading
                                        case "update_12p3":
                                            do_update_12p3();
                                            do_update_124();
                                            do_update_1252();
                                            do_update_1256();
                                            do_update_1257();
                                            do_update_1261();
                                            do_update_1262();
                                            do_update_1263();
                                    do_update_128();
                                            do_update_129();
                                            break;

                                        // User has version 124 and is upgrading
                                        case "update_124":
                                            do_update_124();
                                            do_update_1252();
                                            do_update_1256();
                                            do_update_1257();
                                            do_update_1261();
                                            do_update_1262();
                                            do_update_1263();
                                    do_update_128();
                                            do_update_129();
                                            break;

                                        // User has version 1252 and is upgrading
                                        case "update_1252":
                                            do_update_1252();
                                            do_update_1256();
                                            do_update_1257();
                                            do_update_1261();
                                            do_update_1262();
                                            do_update_1263();
                                    do_update_128();
                                            do_update_129();
                                            break;

                                        // User has version 1256 and is upgrading
                                        case "update_1256":
                                            do_update_1256();
                                            do_update_1257();
                                            do_update_1261();
                                            do_update_1262();
                                            do_update_1263();
                                    do_update_128();
                                            do_update_129();
                                            break;

                                        // User has version 1257 or 126beta and is upgrading
                                        case "update_1257":
                                            do_update_1257();
                                            do_update_1261();
                                            do_update_1262();
                                            do_update_1263();
                                    do_update_128();
                                            do_update_129();
                                            break;

                                        // User has version 1261 and is upgrading
                                        case "update_1261":
                                            do_update_1261();
                                            do_update_1262();
                                            do_update_1263();
                                    do_update_128();
                                            do_update_129();
                                            break;

                                        // User has version 1262 and is upgrading
                                        case "update_1262":
                                            do_update_1262();
                                            do_update_1263();
                                    do_update_128();
                                            do_update_129();
                                            break;

                                        // User has version 1262 and is upgrading
                                        case "update_1263":
                                            do_update_1263();
                                    do_update_128();
                                            do_update_129();
                                            break;

                                // User has DB version 128 and is upgrading
                                case "update_128":
                                   do_update_128();
                                           do_update_129();
                                   break;

                                       // User has DB version 129 and is upgrading
                                case "update_129":
                                           do_update_129();
                                   break;

                                        default:
                                            print_intro();
                                            break;
                                    }

                                    function do_install()
                                    {
                                        global $pdo;

                                        define('ODM_INSTALLING', 'true');
                                        //echo 'Checking that templates_c folder is writeable...<br />';
                                        if(!is_writeable('../templates_c'))
                                        {
                                            echo 'templates_c folder is <strong>Not writeable</strong> - Fix and go <a href="javascript: history.back()" class="button">Back</a><br />';
                                            exit;
                                        }
                                        else
                                        {
                                            //echo 'OK<br />';
                                        }
                                        //echo '<br />installing...<br>';
                                        // Create database
                                        $query = "CREATE DATABASE IF NOT EXISTS `" . DB_NAME . "`";
                                        $stmt = $pdo->prepare($query);
                                        $stmt->execute();
                                        //echo 'Database Created<br />';

                                        include('../config.php');
                                        include_once("odm.php");
                                        //echo 'All Done with installation! <p><strong>Username: admin</strong></p><p><strong>Password (WRITE IT DOWN): ' . $_SESSION['adminpass'] . '</strong></p></br />Click <a href="../settings.php?submit=update">HERE</a> to edit your site settings';

                                        ?>
                                        <p>
                                            Installationen är nu slutförd.<br>
                                            Inloggning sker med administrationskontot (admin) med det lösenord du valde tidigare.
                                        </p>
                                        <p>
                                            <a href="../" class="button">Klicka här för att komma till sidan</a>
                                        </p>
                                        <?php
                                    } // End Install

                                    /**
                                     * Call each version, starting with the oldest. Upgrade from one to the next until done
                                     */

                                    function do_update_10()
                                    {
                                        echo 'Uppdaterar till version 1.0...<br>';
                                        include("../config.php");
                                        include("upgrade_10.php");
                                        echo 'Allt klart! Klicka <a href="../index.php">här</a> för att logga in<br>';
                                    }
                                    function do_update_11rc1()
                                    {
                                        echo 'Uppdaterar till version 1.1rc1...<br>';
                                        include("../config.php");
                                        include("upgrade_11rc1.php");
                                        echo 'Allt klart! Klicka <a href="../index.php">här</a> för att logga in<br>';
                                    }

                                    function do_update_11rc2()
                                    {
                                        echo 'Uppdaterar till version 1.1rc2...<br>';
                                        include("../config.php");
                                        include("upgrade_11rc2.php");
                                        echo 'Allt klart! Klicka <a href="../index.php">här</a> för att logga in<br>';
                                    }

                                    function do_update_11()
                                    {
                                        echo 'Uppdaterar till version 1.1...<br>';
                                        include("../config.php");
                                        include("upgrade_11.php");
                                        echo 'Allt klart! Klicka <a href="../index.php">här</a> för att logga in<br>';
                                    }

                                    function do_update_12rc1()
                                    {
                                        echo 'Uppdaterar till version 1.2rc1...<br>';
                                        include("../config.php");
                                        include("upgrade_12rc1.php");
                                        echo 'All Done with update! Click <a href="../index.php">HERE</a> to login<br>';
                                    }

                                    function do_update_12p1()
                                    {
                                        echo 'Uppdaterar till version 1.2p1...<br>';
                                        include("../config.php");
                                        include("upgrade_12p1.php");
                                        echo 'Allt klart! Klicka <a href="../index.php">här</a> för att logga in<br>';
                                    }

                                    function do_update_12p3()
                                    {
                                        echo 'Uppdaterar till version 1.2p3...<br>';
                                        include("../config.php");
                                        include("upgrade_12p3.php");
                                        echo 'Allt klart! Klicka <a href="../index.php">här</a> för att logga in<br>';
                                    }

                                    function do_update_124()
                                    {
                                        echo 'Uppdaterar till version 1.2.4...<br>';
                                        include("../config.php");
                                        include("upgrade_124.php");
                                        echo 'Allt klart! Klicka <a href="../index.php">här</a> för att logga in<br>';
                                    }

                                    function do_update_1252()
                                    {
                                        echo 'Uppdaterar till version 1.2.5.2...<br>';
                                        include("../config.php");
                                        include("upgrade_1252.php");
                                        echo 'Allt klart! Klicka <a href="../index.php">här</a> för att logga in<br>';
                                    }

                                    function do_update_1256()
                                    {
                                        echo 'Uppdaterar till version 1.2.5.6...<br />';
                                        include("../config.php");
                                        include("upgrade_1256.php");
                                        echo 'Allt klart! Klicka <a href="../index.php">här</a> för att logga in<br>';
                                    }

                                    function do_update_1257()
                                    {
                                        echo 'Uppdaterar till version 1.2.5.7...<br />';
                                        include("../config.php");
                                        include("upgrade_1257.php");
                                        echo 'Allt klart! Klicka <a href="../index.php">här</a> för att logga in<br>';
                                    }
                                    function do_update_1261()
                                    {
                                        echo 'Uppdaterar till version 1.2.6.1...<br />';
                                        include("../config.php");
                                        include("upgrade_1261.php");
                                        echo 'Allt klart! Klicka <a href="../index.php">här</a> för att logga in<br>';
                                    }
                                    function do_update_1262()
                                    {
                                        echo 'Uppdaterar till version 1.2.6.2...<br />';
                                        include("../config.php");
                                        include("upgrade_1262.php");
                                        echo 'Allt klart! Klicka <a href="../index.php">här</a> för att logga in<br>';
                                    }
                                    function do_update_1263()
                                    {
                                        echo 'Uppdaterar till version 1.2.6.3...<br />';
                                        include("../config.php");
                                        include("upgrade_1263.php");
                                        echo 'Allt klart! Klicka <a href="../index.php">här</a> för att logga in<br>';
                                    }
                                    function do_update_128()
                                    {
                                        echo 'Uppdaterar till versions 1.2.8...<br />';
                                        include("../config.php");
                                        include("upgrade_128.php");
                                        echo 'Allt klart! Klicka <a href="../index.php">här</a> för att logga in<br>';
                                    }

                                    function do_update_129()
                                    {
                                        echo 'Uppdaterar till versions 1.2.9...<br />';
                                        include("../config.php");
                                        include("upgrade_129.php");
                                        echo 'Allt klart! Klicka <a href="../index.php">här</a> för att logga in<br>';
                                    }

                                    function print_intro()
                                    {
                                        global $pdo;
                                        include_once('../version.php');

                                        $query = "SHOW TABLES LIKE :table";
                                        $stmt = $pdo->prepare($query);
                                        $stmt->execute(array(
                                            ":table" =>  $_SESSION['db_prefix'] . 'odmsys'
                                        ));
                                        $result = $stmt->fetchAll();

                                        if (count($result) == 0) {
                                            $db_version = 'Unknown';
                                        } else {
                                            // Ok, db is there. Lets check the db version now
                                            $query2 = "SELECT sys_value from {$_SESSION['db_prefix']}odmsys WHERE sys_name='version'";
                                            $stmt = $pdo->prepare($query2);
                                            $stmt->execute();
                                            $result_array = $stmt->fetch();
                                            $db_version = (!empty($result_array['sys_value']) ? $result_array['sys_value'] : 'Unknown');
                                        }
                                    ?>
                                <div data-alert class="alert-box warning radius">
                                    <strong>OBS:</strong> Denna installation tar inte hänsyn till existerande tabeller med samma tabellprefix. Alla eventuella dubletter kommer att skrivas över - all befintlig data i databasen går därmed förlorad.
                                </div>

                                <p>
                                    <a href="index.php?op=install" class="button" onclick="javascript:return confirm('Är du säker? Existerande data med samma tabellprefix kommer gå förlorade.');">Installera nu</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

<!--
        <table align="center">
            <tr>
                <td><strong>Please BACKUP all data and files before proceeding!</strong><br><br></td>
            </tr>
            <tr>
                <td>
                    Please choose one from the following based on your current version.<br><br>
                    Note: If you are updating and your current version # is lower than the newest upgrade listed below then you have <br />
                    database updates to perform. <br /><br />
                </td>
            </tr>
            <tr>
                <td>Your current DB version: <strong><?php echo $db_version; ?></strong><br /><br /></td>
            </tr>
            <tr>
                <td>1) New Installation<br /><br /></td>
            </tr>
            <tr>
                <td><a href="index.php?op=install" onclick="javascript:return confirm('are you sure? This will modify the database you have configured in config.php. Only use this option for a FRESH INSTALL.');">New installation of the v<?php echo $GLOBALS['CONFIG']['current_version']; ?> release of OpenDocMan (Will wipe any current data!)</a><br><br></td>
            </tr>
	    <tr>
		<td><a href="index.php?op=update_129">Upgrade from version version 1.2.9</a><br><br></td>
	    </tr>
            <tr>
                <td> or <br /><br /></td>
            </tr>
            <tr>
                <td>2) Upgrade your current from a previous version<br /><br /></td>
            </tr>
            <tr>
                <td><a href="index.php?op=update_128">Upgrade from DB version 1.2.8</a><br><br></td>
            </tr>
            <tr>
                <td><a href="index.php?op=update_1263">Upgrade from DB version 1.2.6.3</a><br><br></td>
            </tr>
            <tr>
                <td><a href="index.php?op=update_1262">Upgrade from DB version 1.2.6.2</a><br><br></td>
            </tr>
            <tr>
                <td><a href="index.php?op=update_1261">Upgrade from DB version 1.2.6.1</a><br><br></td>
            </tr>
            <tr>
                <td><a href="index.php?op=update_1257">Upgrade from DB version 1.2.5.7</a><br><br></td>
            </tr>
            <tr>
                <td><a href="index.php?op=update_1256">Upgrade from DB version 1.2.5.6</a><br><br></td>
            </tr>
            <tr>
                <td><a href="index.php?op=update_1252">Upgrade from DB version 1.2.5.2</a><br><br></td>
            </tr>
            <tr>
                <td><a href="index.php?op=update_124">Upgrade from DB version 1.2.4</a><br><br></td>
            </tr>
            <tr>
                <td><a href="index.php?op=update_12p3">Upgrade from DB version 1.2p3</a><br><br></td>
            </tr>
            <tr>
                <td><a href="index.php?op=update_12p1">Upgrade from DB version 1.2p1</a><br><br></td>
            </tr>
            <tr>
                <td><a href="index.php?op=update_12rc1">Upgrade from DB version 1.2rc(x)</a><br><br></td>
            </tr>
            <tr>
                <td><a href="index.php?op=update_11">Upgrade from DB version 1.1</a><br><br></td>
            </tr>
            <tr>
                <td><a href="index.php?op=update_11rc2">Upgrade from DB version 1.1rc2</a><br><br></td>
            </tr>
            <tr>
                <td><a href="index.php?op=update_11rc1">Upgrade from DB version 1.1rc1</a><br><br></td>
            </tr>
            <tr>
                <td><a href="index.php?op=update_10">Upgrade from DB version 1.0</a><br><br></td>
            </tr>
        </table>
        -->
            <?php
        }

?>
    </body>
</html>
