<div class="large-12 medium-12 columns article-column">
    <h1>Redigera kategori</h1>
    <div class="row">
        <form id="updateCategoryForm" action="category.php?last_message=<?php echo $last_message; ?>" method="POST" enctype="multipart/form-data">

            <?php
                $item = (int)$_REQUEST['item'];
                // query to get a list of users
                $query = "SELECT id, name FROM {$GLOBALS['CONFIG']['db_prefix']}category where id = :item";
                $stmt = $pdo->prepare($query);
                $stmt->execute(array(
                    ':item' => $item
                ));
                $result = $stmt->fetchAll();

                foreach ($result as $row) :
            ?>
                <div class="large-12 columns">
                    <label>
                        <?php echo msg('category')?>
                        <input type="text" name="name" value="<?=$row['name']?>" class="required" maxlength="40">
                        <input type="hidden" name="id" value="<?=$row['id']?>">
                    </label>
                </div>
            <?php endforeach; ?>

            <div class="large-12 columns">
                <button class="button success" type="Submit" name="updatecategory" value="Modify Category"><?php echo msg('area_update_category')?></button>
                <button class="button" type="Submit" name="cancel" value="Cancel"><?php echo msg('button_cancel')?></button>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#updateCategoryForm').validate();
    });
</script>