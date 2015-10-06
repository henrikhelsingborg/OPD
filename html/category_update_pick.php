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
               <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

                    <div class="row">
                        <div class="columns large-12">
                            <div class="form-group">
                                <label class="form-label"><?php echo msg('choose')?> <?php echo msg('category')?></label>
                                <select name="item" class="form-control">
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
                                <button class="btn btn-submit" type="submit" name="submit" value="Update"><?php echo msg('choose')?></button>
                                <button class="btn btn-warning" type="Submit" name="cancel" value="Cancel"><?php echo msg('button_cancel')?></button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </article>
</div>