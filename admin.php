<?php
/*
admin.php - provides admin interface
Copyright (C) 2007 Stephen Lawrence Jr., Jon Miner
Copyright (C) 2002-2011 Stephen Lawrence Jr.

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

session_start();
// admin.php - administration functions for admin users
// check for valid session
// includes
include('odm-load.php');

if (!isset($_SESSION['uid']))
{
    redirect_visitor();
}

include('udf_functions.php');

// open a connection to the database
$user_obj = new User($_SESSION['uid'], $pdo);

// Check to see if user is admin
if(!$user_obj->isAdmin())
{
    header('Location:error.php?ec=4');
    exit;
}

$last_message = (isset($_REQUEST['last_message']) ? $_REQUEST['last_message'] : '');
draw_header(msg('label_admin'), $last_message);

include('html/admin.php');

draw_footer();