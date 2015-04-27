<?php
/*
category.php - Administer Categories
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

// check for valid session
session_start();

// includes
include('odm-load.php');

if (!isset($_SESSION['uid']))
{
    redirect_visitor();
}

$user_obj = new User($_SESSION['uid'], $pdo);
// Check to see if user is admin
if(!$user_obj->isAdmin())
{
    header('Location:error.php?ec=4');
    exit;
}

$last_message = (isset($_REQUEST['last_message']) ? $_REQUEST['last_message'] : '');

if(isset($_GET['submit']) && $_GET['submit'] == 'add')
{
    draw_header(msg('area_add_new_category'), $last_message);
        include('html/category_add.php');
    draw_footer();
}
elseif(isset($_REQUEST['submit']) && $_REQUEST['submit']=='Add Category')
{
    // Make sure they are an admin
    if (!$user_obj->isAdmin())
    {
        header('Location:error.php?ec=4');
        exit;
    }

    $query = "INSERT INTO {$GLOBALS['CONFIG']['db_prefix']}category (name, parent_id) VALUES (:category, :parent_id)";
    $stmt = $pdo->prepare($query);
    $stmt->execute(array(
        ':category' => $_REQUEST['category'],
        ':parent_id' => $_REQUEST['parent_id']
    ));

    // back to main page
    $last_message = urlencode(msg('message_category_successfully_added'));
    header('Location:admin.php?last_message=' . $last_message);
}
elseif(isset($_REQUEST['submit']) && $_REQUEST['submit'] == 'delete')
{
    // If demo mode, don't allow them to update the demo account
    if ($GLOBALS['CONFIG']['demo'] == 'True')
    {
        draw_header(msg('area_delete_category'), $last_message);
        echo msg('message_sorry_demo_mode');
        draw_footer();
        exit;
    }

    draw_header(msg('area_delete_category'), $last_message);

    $item = (int) $_REQUEST['item'];

        include('html/category_delete.php');
    draw_footer();
}
elseif(isset($_REQUEST['deletecategory']))
{
    // Delete category
    //
    //
    // Make sure they are an admin
    if (!$user_obj->isAdmin()) {
        header('Location:error.php?ec=4');
        exit;
    }

    $query = "DELETE FROM {$GLOBALS['CONFIG']['db_prefix']}category where id=:id";
    $stmt = $pdo->prepare($query);
    $stmt->execute(array(':id' => $_REQUEST[id]));

    // Set all old category_id's to the new re-assigned category
    $query = "UPDATE {$GLOBALS['CONFIG']['db_prefix']}data SET category = :assigned_id WHERE category = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute(array(
        ':assigned_id' => $_REQUEST['assigned_id'],
        ':id' => $_REQUEST[id]
    ));

    // back to main page
    $last_message = urlencode(msg('message_category_successfully_deleted') . ' id:' . $_REQUEST['id']);
    header('Location: admin.php?last_message=' . $last_message);
}
elseif(isset($_REQUEST['submit']) && $_REQUEST['submit'] == 'deletepick')
{
    $deletepick='';
    draw_header(msg('area_delete_category'). ' : ' .msg('choose'), $last_message);
        include('html/category_delete_pick.php');
    draw_footer();
}
elseif(isset($_REQUEST['submit']) && $_REQUEST['submit'] == 'Show Category')
{
    // query to show item
    draw_header(msg('area_view_category'), $last_message);
    $category_id = (int) $_REQUEST['item'];

    // Select name
    $query = "SELECT name FROM {$GLOBALS['CONFIG']['db_prefix']}category WHERE id = :category_id";
    $stmt = $pdo->prepare($query);
    $stmt->execute(array(
        ':category_id' => $category_id
    ));
    $result = $stmt->fetchAll();

    echo('<table name="main" cellspacing="15" border="0">');
    foreach($result as $row) {
        echo '<th>' . msg('label_name') . '</th><th>' . msg('label_id') . '</th>';
        echo '<tr>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $category_id . '</td>';
        echo '</tr>';
    }
    ?>
<form action="admin.php?last_message=<?php echo $last_message; ?>" method="POST" enctype="multipart/form-data">
    <tr>
        <td colspan="4" align="center"><div class="buttons"><button class="regular" type="submit" name="submit" value="Back"><?php echo msg('button_back')?></button></div></td>
    </tr>
</form>
</table>
<!-- ADD THE LIST OF FILES HERE -->
<?php
    echo msg('categoryviewpage_list_of_files_title') . '<br />';
    $query = "SELECT id, realname FROM `{$GLOBALS['CONFIG']['db_prefix']}data` WHERE category = :category_id";
    $stmt = $pdo->prepare($query);
    $stmt->execute(array(
        ':category_id' => $category_id
    ));
    $result = $stmt->fetchAll();

    foreach($result as $row) {
        echo '<a href="edit.php?id=' . $row['id'] . '&state=3">ID: ' . $row['id'] . ',' . $row['realname'] . '</a><br />';
    }

    draw_footer();
}
elseif(isset($_REQUEST['submit']) && $_REQUEST['submit'] == 'showpick')
{
    draw_header(msg('area_view_category') . ' : ' . msg('choose'), $last_message);
    ?>
    <table border="0" cellspacing="5" cellpadding="5">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>?last_message=<?php echo $last_message; ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="state" value="<?php echo ($_REQUEST['state']+1); ?>">
            <tr>
                <td><b><?php echo msg('category')?></b></td>
                <td colspan="3"><select name="item">
                            <?php
                            $query = "SELECT id, name FROM {$GLOBALS['CONFIG']['db_prefix']}category ORDER BY name";
                            $stmt = $pdo->prepare($query);
                            $stmt->execute();
                            $result = $stmt->fetchAll();

                            foreach($result as $row) {
                                echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                            }
                            ?>
                    </select></td>

                <td></td>
                <td colspan="3" align="center">
                    <div class="buttons">
                        <button class="positive" type="Submit" name="submit" value="Show Category"><?php echo msg('area_view_category')?></button>
                        <button class="negative cancel" type="Submit" name="cancel" value="Cancel"><?php echo msg('button_cancel')?></button>
                    </div>
                </td>
            </tr>
        </form>
    </table>
</body>
</html>
    <?php
    draw_footer();
}
elseif(isset($_REQUEST['submit']) && $_REQUEST['submit'] == 'Update')
{
    draw_header(msg('area_update_category'), $last_message);
        include('html/category_modify.php');
    draw_footer();
}
elseif(isset($_REQUEST['submit']) && $_REQUEST['submit'] == 'updatepick')
{
    draw_header(msg('area_update_category'). ': ' .msg('choose'), $last_message);
        include('html/category_update_pick.php');
    draw_footer();
}
elseif(isset($_REQUEST['updatecategory']))
{
    // Make sure they are an admin
    if (!$user_obj->isAdmin())
    {
        header('Location: error.php?ec=4');
        exit;
    }
    $id = (int) $_REQUEST['id'];

    $query = "UPDATE {$GLOBALS['CONFIG']['db_prefix']}category SET name = :name, parent_id = :parent_id where id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute(array(
        ':name' => $_REQUEST['name'],
        'parent_id' => $_REQUEST['parent_id'],
        ':id' => $id
    ));

    // back to main page
    $last_message = urlencode(msg('message_category_successfully_updated') .' : ' . $_REQUEST['name']);
    header('Location: admin.php?last_message=' . $last_message);
}
elseif (isset($_REQUEST['cancel']) && $_REQUEST['cancel'] == 'Cancel')
{
    $last_message=urlencode(msg('message_action_cancelled'));
    header ('Location: admin.php?last_message=' . $last_message);
}