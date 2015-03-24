<div class="large-12 medium-12 columns article-column">
    <h1>Sök</h1>
    <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="get">
        <div class="row">
            <div class="large-6 columns">
                <label>
                    <?php echo msg('label_search_term');?>
                    <input type="Text" name="keyword">
                </label>
            </div>
        </div>
        <div class="row">
            <div class="large-6 columns">
                <label>
                    <?php echo msg('search');?>
                    <select name="where">
                        <!--<option value="author"><?php echo msg('author'). " (".msg('label_last_name')." ".msg('label_first_name').")";?></option>-->
                        <!-- <option value="department"><?php echo msg('department');?></option> -->
                        <option value="category"><?php echo msg('category');?></option>
                        <option value="descriptions"><?php echo msg('label_description');?></option>
                        <option value="filenames"><?php echo msg('label_filename');?></option>
                        <option value="comments"><?php echo msg('label_comment');?></option>
                        <!-- <option value="file_id"><?php echo msg('file');?> #</option> -->
                        <?php udf_functions_search_options(); ?>
                        <option value="all" selected><?php echo msg('searchpage_all_meta');?></option>
                    </select>
                </label>
            </div>
        </div>
        <div class="row checkboxes">
            <div class="large-6 columns">
                <label>
                    <input type="checkbox" name="exact_phrase" id="checkbox1"><label for="checkbox1"><?php echo msg('label_exact_phrase');?></label>
                    <input type="checkbox" name="case_sensitivity" id="checkbox2"><label for="checkbox2"><?php echo msg('label_case_sensitive'); ?></label>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="large-6 columns">
                <input class="positive button success" type="submit" name="submit" value="<?php echo msg('search');?>">
            </div>
        </div>
    </form>
</div>