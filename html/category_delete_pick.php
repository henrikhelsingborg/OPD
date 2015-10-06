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
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="state" value="<?php echo ($_REQUEST['state']+1); ?>">

                    <div class="row">
                        <div class="columns large-12">
                            <div class="form-group">
                                <label class="form-label"><?php echo msg('category')?></label>
                                <select name="item" class="form-control">
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
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="columns large-12">
                            <div class="form-group">
                                <button class="btn btn-submit" type="submit" name="submit" value="delete"><?php echo msg('button_delete')?></button>
                                <button class="btn btn-warning" type="Submit" name="cancel" value="Cancel"><?php echo msg('button_cancel')?></button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </article>
</div>