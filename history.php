<?php
/*
history.php - display revision history
Copyright (C) 2002, 2003, 2004 Stephen Lawrence Jr., Khoa Nguyen
Copyright (C) 2005-2013 Stephen Lawrence Jr.

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


// check session and $id
session_start();

include('odm-load.php');

if (!isset($_SESSION['uid']))
{
    redirect_visitor();
}

$last_message = (isset($_REQUEST['last_message']) ? $_REQUEST['last_message'] : '');

if (!isset($_REQUEST['id']) || $_REQUEST['id'] == '')
{
    header('Location:error.php?ec=2');
    exit;
}

draw_header(msg('area_view_history'), $last_message);
//revision parsing
if(strchr($_REQUEST['id'], '_') )
{
    list($_REQUEST['id'], $revision_id) = explode('_' , $_REQUEST['id']);
}
$datafile = new FileData($_REQUEST['id'], $pdo);
// verify
if ($datafile->getError() != NULL)
{
    header('Location:error.php?ec=2');
    exit;
}
else
{
// obtain data from resultset

$owner_full_name = $datafile->getOwnerFullName();
$owner = $owner_full_name[1].', '.$owner_full_name[0];
$real_name = $datafile->getRealName();
$category = $datafile->getCategoryName();
$created = $datafile->getCreatedDate();
$description = $datafile->getDescription();
$comments = $datafile->getComment();
$status = $datafile->getStatus();

// corrections
if ($description == '')
{
    $description = msg('message_no_description_available');
}
if ($comments == '')
{
    $comments = msg('message_no_author_comments_available');
}
if($datafile->isArchived())
{
    $filename = $GLOBALS['CONFIG']['archiveDir'] . $_REQUEST['id'] . '.dat';
}
else
{
    $filename = $GLOBALS['CONFIG']['dataDir'] . $_REQUEST['id'] . '.dat';
}

include('html/history.php');

// Call the plugin API
callPluginMethod('onAfterHistory',$datafile->getId());
draw_footer();
}

