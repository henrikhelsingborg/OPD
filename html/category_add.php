<div class="large-12 medium-12 columns article-column">
    <h1><?php echo msg('button_add_category')?></h1>
    <div class="row">
        <form id="categoryAddForm" action="category.php?last_message=<?php echo $last_message; ?>" method="get" enctype="multipart/form-data">
            <div class="large-12 columns">
                <label>
                    <?php echo msg('category')?>
                    <input name="category" type="text" class="required" maxlength="40">
                </label>
            </div>

            <div class="large-12 columns">
                <label>
                    Förälder:
                    <select name="parent_id">
                        <option value="">Ingen förälder</option>
                        <?php
                        createCategorySelectItems();
                        ?>
                    </select>
                </label>
            </div>

            <div class="large-12 columns">
                <button class="button success" type="submit" name="submit" value="Add Category"><?php echo msg('button_add_category')?></button>
                <button class="button" type="Submit" name="cancel" value="Cancel"><?php echo msg('button_cancel')?></button>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#categoryAddForm').validate();
    });
</script>