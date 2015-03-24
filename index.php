<?php
/*
index.php - main login form
Copyright (C) 2002-2013 Stephen Lawrence Jr.

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
*/

// Report all PHP errors (bitwise 63 may be used in PHP 3)
// includes
session_start();

/*
 * Test to see if we have the config.php file. If not, must not be installed yet.
*/

if(!file_exists('config.php'))
{
    if (
        !extension_loaded('pdo')
        || !extension_loaded('pdo_mysql')
    ) {
        echo "<p>PHP pdo Extensions not loaded. <a href='./'>try again</a>.</p>";
        exit;
    }

    // A config file doesn't exist
    include('html/missing-config.php');

    exit;
}

require_once ('odm-load.php');

if (!isset($_REQUEST['last_message']))
{
    $_REQUEST['last_message'] = '';
}

// Call the plugin API
callPluginMethod('onBeforeLogin');

// Autologin
if(isset($_SESSION['uid']))
{
        // redirect to main page
        if(isset($_REQUEST['redirection']))
        {
            redirect_visitor($_REQUEST['redirection']);
        }
        else
        {
            redirect_visitor('out.php');
        }
} else {
    $publicUserQuery = "SELECT id FROM {$GLOBALS['CONFIG']['db_prefix']}user WHERE username = 'public' LIMIT 1";
    $stmt = $pdo->prepare($publicUserQuery);
    $stmt->execute();
    $result = $stmt->fetch();

    if (!$result) {
        redirect_visitor('login.php');
        exit;
    }

    $_SESSION['uid'] = $result['id'];

    redirect_visitor('out.php');
}

callPluginMethod('onAfterLogin');

draw_footer();
