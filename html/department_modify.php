<div class="large-12 medium-12 columns article-column">
    <h1>Redigera avdelning</h1>
    <div class="row">
        <form action="department.php" id="modifyDeptForm" method="POST" enctype="multipart/form-data">

            <?php
                $query = "SELECT id, name FROM {$GLOBALS['CONFIG']['db_prefix']}department where id = :item";
                $stmt = $pdo->prepare($query);
                $stmt->execute(array(':item' => $_REQUEST['item']));
                $result = $stmt->fetchAll();

                foreach ($result as $row) :
            ?>
            <div class="large-12 columns">
                <label>
                    <?php echo msg('department')?>
                    <input type="text" name="name" value="<?php echo $row['name']; ?>" class="required" maxlength="40">
                </label>
            </div>

            <?php callPluginMethod('onDepartmentEditForm', $row['id']); ?>
            <?php endforeach; ?>

            <div class="large-12 columns">
                <button class="button success" type="submit" name="submit" value="Update Department"><?php echo msg('button_save')?></button>
                <button class="button" type="submit" name="submit" value="Cancel"><?php echo msg('button_cancel')?></button>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#modifyDeptForm').validate();
    });
</script>