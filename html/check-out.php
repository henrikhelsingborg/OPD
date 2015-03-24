<div class="large-12 medium-12 columns article-column">
    <h1><?php echo msg('area_check_out_file')?></h1>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
        <p>
            <?php echo msg('message_click_to_checkout_document')?>.<br>
            <?php echo msg('message_once_the_document_has_completed')?>&nbsp;<a href="out.php"><?php echo msg('button_continue')?></a>.
        </p>
        <p>
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <input type="hidden" name="access_right" value="<?php echo $_GET['access_right'];?>">
            <span class="row">
            <input class="button alert" type="submit" name="submit" value="<?php echo msg('area_check_out_file')?>">
            </span>
        </p>
    </form>
</div>