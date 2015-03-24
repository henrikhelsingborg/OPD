<?php
/*
in.php - display files checked out to user, offer link to check back in
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


// check session
session_start();

// includes
include('odm-load.php');

if (!isset($_SESSION['uid']))
{
    redirect_visitor();
}

$user_obj = new User($_SESSION['uid'], $pdo);

if(!$user_obj->canCheckIn()){
    redirect_visitor('out.php');
}

$last_message = (isset($_REQUEST['last_message']) ? $_REQUEST['last_message'] : '');

draw_header(msg('button_check_in'), $last_message);

// query to get list of documents checked out to this user
$query = "
  SELECT
    d.id,
    u.last_name,
    u.first_name,
	d.realname,
    d.created,
    d.description,
    d.status
  FROM
    {$GLOBALS['CONFIG']['db_prefix']}data as d,
    {$GLOBALS['CONFIG']['db_prefix']}user as u
  WHERE
    d.status = :uid
  AND
    d.owner = u.id
";
$stmt = $pdo->prepare($query);
$stmt->execute(array(
    ':uid' => $_SESSION['uid']
));
$result = $stmt->fetchAll();

// how many records?
$count = $stmt->rowCount();
if ($count == 0)
{
    include('html/in-empty.php');
}
else
{
    include('html/in.php');
}

draw_footer();