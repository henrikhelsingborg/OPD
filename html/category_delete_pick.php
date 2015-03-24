<div class="large-12 medium-12 columns article-column">
    <h1>Ta bort kategori</h1>
    <div class="row">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="state" value="<?php echo ($_REQUEST['state']+1); ?>">

            <div class="large-12 columns">
                <label>
                    <?php echo msg('category')?>
                    <select name="item">
                        <?php
                        $query = "SELECT id, name FROM {$GLOBALS['CONFIG']['db_prefix']}category ORDER BY name";
                        $stmt = $pdo->prepare($query);
                        $stmt->execute();
                        $result = $stmt->fetchAll();

                        foreach($result as $row) {
                            $str = '<option value="' . $row['id'] . '"';
                            $str .= '>' . $row['name'] . '</option>';
                            echo $str;
                        }
                        $deletepick='';
                        ?>
                    </select>
                </label>
            </div>
            <div class="large-12 columns">
                <button class="button success" type="submit" name="submit" value="delete"><?php echo msg('button_delete')?></button>
                <button class="button" type="Submit" name="cancel" value="Cancel"><?php echo msg('button_cancel')?></button>
            </div>
        </form>
    </div>
</div>