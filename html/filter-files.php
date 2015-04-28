<div class="sidebar sidebar-left large-3 medium-3 columns">
    <div class="row">
        <form action="search.php" id="searchform" method="get" class="search-inputs large-12 columns" role="search">
            <input type="hidden" name="where" value="all">
            <input type="hidden" name="submit" value="Sök">
            <input type="text" placeholder="Vad letar du efter?" id="s" name="keyword" class="input-field" value="">
            <input type="submit" class="button search organge" value="Sök" id="searchsubmit">
        </form>
    </div>
    <div class="row">
        <nav class="main-nav large-12 columns show-for-medium-up">
            <ul class="main-nav-list">
                <li><a href="out.php">Alla</a></li>
                <?php createMenu(); ?>
            </ul>
        </nav>
    </div>
</div>

<!--
<div class="sidebar sidebar-left large-3 medium-3 columns">
    <form name="browser_sort">
        <h3><?php echo msg('label_browse_by');?></h3>
        <div class="row">
            <div class="large-12 columns">
                <label>
                    <select name='category' onChange='loadItem(this)' width='0' size='1'>
                        <option id='0' selected><?php echo msg('label_select_one');?></option>
                        <option id='1' value='author'><?php echo msg('author');?></option>
                        <option id='2' value='department'><?php echo msg('label_department');?></option>
                        <option id='3' value='category'><?php echo msg('label_file_category');?></option>
                        <?php
                        udf_functions_java_options(4);
                        ?>
                    </select>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
                <label>
                    <select name='category_item' onChange='loadOrder(this)'>
                        <option id='0' selected><?php echo msg('label_empty');?></option>
                    </select>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
                <label>
                    <select name='category_item_order' onChange='load(this)'>
                        <option id='0' selected><?php echo msg('label_empty');?></option>
                    </select>
                </label>
            </div>
        </div>
    </form>
</div>
-->