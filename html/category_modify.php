<div class="columns large-9 medium-9 small-12 print-12 left">
    <article class="article">
        <header class="article-header">
            <div class="row">
                <div class="columns large-12">
                    <h1>Redigera kategori</h1>
                </div>
            </div>
        </header>

        <div class="article-body">
            <div class="gform_wrapper">
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
                        
                        <div class="row">
                            <div class="columns large-12">
                                <div class="form-group">
                                    <label class="form-label"><?php echo msg('category')?></label>
                                    <input type="text" name="name" value="<?=$row['name']?>" class="required" maxlength="40">
                                    <input type="hidden" name="id" value="<?=$row['id']?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="columns large-12">
                                <div class="form-group">
                                    <label class="form-label">Förälder<?php echo strtolower(msg('category'))?></label>
                                    <select name="parent_id" class="form-control">
                                        <option value="">Ingen förälder</option>
                                        <?php
                                        createCategorySelectItems();
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    
                    <div class="row">
                    <div class="large-12 columns">
                        <button class="btn btn-submit" type="Submit" name="updatecategory" value="Modify Category"><?php echo msg('area_update_category')?></button>
                        <button class="btn btn-warning" type="Submit" name="cancel" value="Cancel"><?php echo msg('button_cancel')?></button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </article>
</div>

<script>
    $(document).ready(function(){
        $('#updateCategoryForm').validate();
    });
</script>