<div class="large-12 medium-12 columns article-column">
    <h1>Redigera kategori</h1>
    <div class="row">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="state" value="<?php echo ($_REQUEST['state']+1); ?>">

            <div class="large-12 columns">
                <label>
                   <?php echo msg('choose')?> <?php echo msg('category')?>
                    <select name="item">
                        <?php
                        // query to get a list of users
                        $query = "SELECT id, name FROM {$GLOBALS['CONFIG']['db_prefix']}category ORDER BY name";
                        $stmt = $pdo->prepare($query);
                        $stmt->execute();
                        $result = $stmt->fetchAll();

                        foreach($result as $row) {
                            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }
                        ?>
                    </select>
                </label>
            </div>
            <div class="large-12 columns">
                <button class="button success" type="submit" name="submit" value="Update"><?php echo msg('choose')?></button>
                <button class="button" type="Submit" name="cancel" value="Cancel"><?php echo msg('button_cancel')?></button>
            </div>
        </form>
    </div>
</div>