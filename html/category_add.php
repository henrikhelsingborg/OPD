<div class="columns large-9 medium-9 small-12 print-12 left">
    <article class="article">
        <header class="article-header">
            <div class="row">
                <div class="columns large-12">
                    <h1><?php echo msg('button_add_category')?></h1>
                </div>
            </div>
        </header>

        <div class="article-body">
            <div class="gform_wrapper">
                <form id="categoryAddForm" action="category.php?last_message=<?php echo $last_message; ?>" method="get" enctype="multipart/form-data">
                    
                    <div class="row">
                        <div class="columns large-12">
                            <div class="form-group">
                                <label class="form-label"><?php echo msg('category')?></label>
                                <input name="category" type="text" class="required" maxlength="40">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="columns large-12">
                            <div class="form-group">
                                <label class="form-label">Förälder</label>
                                <select name="parent_id" class="form-control">
                                    <option value="">Ingen förälder</option>
                                    <?php
                                    createCategorySelectItems();
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="columns large-12">
                            <div class="form-group">
                                <button class="btn btn-submit" type="submit" name="submit" value="Add Category"><?php echo msg('button_add_category')?></button>
                                <button class="btn btn-warning" type="Submit" name="cancel" value="Cancel"><?php echo msg('button_cancel')?></button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </article>
</div>

<script>
    $(document).ready(function(){
        $('#categoryAddForm').validate();
    });
</script>