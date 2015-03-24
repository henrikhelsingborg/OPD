<div class="large-12 medium-12 columns article-column">
    <h1>Ta bort avdelning</h1>
    <div class="row">
        <form action="department.php" method="POST" enctype="multipart/form-data">
            <?php
                // query to show item
                $query = "SELECT id, name FROM {$GLOBALS['CONFIG']['db_prefix']}department where id = :item";
                $stmt = $pdo->prepare($query);
                $stmt->execute(array(':item' => $_REQUEST['item']));
                $result = $stmt->fetchAll();

                foreach ($result as $row) :
            ?>
                <input type="hidden" name="id" value="<?php echo (int) $_REQUEST['item']; ?>">
                <table class="display">
                    <tr>
                        <td width="250"><?=msg('label_id')?></td>
                        <td><?=$row['id']?></td>
                    </tr>
                    <tr>
                        <td><?=msg('label_name')?></td>
                        <td><?=$row['name']?></td>
                    </tr>
                    <tr>
                        <td><?php echo msg('label_reassign_to');?></td>
                        <td>
                            <select name="assigned_id">
                                <?php
                                    foreach ($reassign_list_query_result as $row) {
                                        echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                </table>
                <br>
                <?php echo msg('message_are_you_sure_remove')?><br><br>
                <button class="button success" type="submit" name="deletedepartment" value="Yes"><?php echo msg('button_yes')?></button>
                            <button class="button" type="submit" name="submit" value="Cancel"><?php echo msg('button_cancel')?></button>
            <?php endforeach; ?>
        </form>
    </div>
</div>