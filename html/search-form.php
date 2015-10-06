
<form action=<?php echo $_SERVER['PHP_SELF']; ?> method="get" class="search">
    <div class="form-container">
        <div class="row">
            <input type="text" placeholder="Vad letar du efter?" name="keyword" class="form-control" autocomplete="off" style="padding: 20px;font-size: 16pt;">
        </div>
        <div class="row" style="margin-top: 10px;">
            <select name="where" class="form-control" style="margin: 0;">
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
        </div>
        <div class="row" style="margin-top: 10px;">
            <div style="display:inline-block;margin-right:20px;"><input style="position:relative;top:-2px;" type="checkbox" name="exact_phrase" id="checkbox1"><label for="checkbox1"> <?php echo msg('label_exact_phrase');?></label></div>
            <div style="display:inline-block;margin-right:20px;"><input style="position:relative;top:-2px;" type="checkbox" name="case_sensitivity" id="checkbox2"><label for="checkbox2"> <?php echo msg('label_case_sensitive'); ?></label></div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <input class="btn btn-submit" type="submit" name="submit" value="<?php echo msg('search');?>" style="padding:5px 10px;font-size:14pt;">
        </div>
    </div>
</form>                