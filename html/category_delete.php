<div class="large-12 medium-12 columns article-column">
    <h1>Ta bort kategori</h1>
    <div class="row">
        <form action="category.php" method="post" enctype="multipart/form-data">
            <?php
                // query to show item
                $query = "SELECT id, name FROM {$GLOBALS['CONFIG']['db_prefix']}category WHERE id = :item";
                $stmt = $pdo->prepare($query);
                $stmt->execute(array(':item' => $_REQUEST['item']));
                $result = $stmt->fetchAll();

                foreach ($result as $row) :
            ?>
                <input type="hidden" name="id" value="<?php echo $item; ?>">
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
                        <td>Flytta alla filer till papperskorgen</td>
                        <td><input type="checkbox" name="remove-files" value="true"></td>
                    </tr>
                    <tr class="move-files">
                        <td><?php echo msg('label_reassign_to');?></td>
                        <td>
                            <select name="assigned_id">
                                <?php
                                    createCategorySelectItems();
                                    ?>
                            </select>
                        </td>
                    </tr>
                </table>
                <br>
                <?php echo msg('message_are_you_sure_remove')?><br><br>
                <button class="button success" type="submit" name="deletecategory" value="Yes"><?php echo msg('button_yes')?></button>
                <button class="button" type="Submit" name="cancel" value="Cancel"><?php echo msg('button_cancel')?></button>
            <?php endforeach; ?>
        </form>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('[name="remove-files"]').on('change', function (e) {
            if ($(this).is(':checked')) {
                $('.move-files').hide();
            } else {
                $('.move-files').show();
            }
        });
    });
</script>