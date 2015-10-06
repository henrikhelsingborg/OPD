<div class="columns large-9 medium-9 small-12 print-12 left">
    <article class="article">
        <header class="article-header">
            <div class="row">
                <div class="columns large-12">
                    <h1>Ta bort kategori</h1>
                </div>
            </div>
        </header>

        <div class="article-body">
            <div class="gform_wrapper">
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
                                <td width="250"><strong><?=msg('label_id')?></strong></td>
                                <td><?=$row['id']?></td>
                            </tr>
                            <tr>
                                <td><strong><?=msg('label_name')?></strong></td>
                                <td><?=$row['name']?></td>
                            </tr>
                            <tr>
                                <td><strong>Flytta alla filer till papperskorgen</strong></td>
                                <td><input type="checkbox" name="remove-files" value="true"></td>
                            </tr>
                            <tr class="move-files">
                                <td><strong><?php echo msg('label_reassign_to');?></strong></td>
                                <td>
                                    <select name="assigned_id" class="form-control">
                                        <?php
                                            createCategorySelectItems();
                                            ?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <br>
                        <?php echo msg('message_are_you_sure_remove')?><br><br>
                        <button class="btn btn-submit" type="submit" name="deletecategory" value="Yes"><?php echo msg('button_yes')?></button>
                        <button class="btn btn-warning" type="Submit" name="cancel" value="Cancel"><?php echo msg('button_cancel')?></button>
                    <?php endforeach; ?>

                </form>
            </div>
        </div>
    </article>
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