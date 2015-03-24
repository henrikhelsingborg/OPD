<div class="large-12 medium-12 columns article-column">
    <h1>Administration: Vad vill du göra?</h1>

    <div class="row admin">
        <?php if($user_obj->isRoot()) : ?>
        <div class="large-3 columns left">
            <div class="panel radius no-padding">
                <ul class="side-nav no-padding">
                    <li class="side-nav-heading"><strong><?php echo msg('users')?></strong></li>
                    <li><a href="<?php echo 'user.php?submit=adduser&state=' . ($_REQUEST['state']+1); ?>"><?php echo msg('label_add')?></a></li>
                    <li><a href="<?php echo 'user.php?submit=updatepick&state=' . ($_REQUEST['state']+1); ?>"><?php echo msg('label_update')?></a></li>
                    <li><a href="<?php echo 'user.php?submit=deletepick&state=' . ($_REQUEST['state']+1); ?>"><?php echo msg('label_delete')?></a></li>
                    <!--<li><a href="<?php echo 'user.php?submit=showpick&state=' . ($_REQUEST['state']+1); ?>"><?php echo msg('label_display')?></a></li>-->
                </ul>
            </div>
        </div>
        <?php endif; ?>

        <?php if($user_obj->isRoot()) : ?>
        <!--
        <div class="large-3 columns left">
            <div class="panel radius no-padding">
                <ul class="side-nav no-padding">
                    <li class="side-nav-heading"><strong><?php echo msg('label_department')?></strong></li>
                    <li><a href="<?php echo 'department.php?submit=add&state=' . ($_REQUEST['state']+1); ?>"><?php echo msg('label_add')?></a></li>
                    <li><a href="<?php echo 'department.php?submit=updatepick&state=' . ($_REQUEST['state']+1); ?>"><?php echo msg('label_update')?></a></li>
                    <li><a href="<?php echo 'department.php?submit=deletepick&state=' . ($_REQUEST['state']+1); ?>"><?php echo msg('label_delete')?></a></li>
                    <li><a href="<?php echo 'department.php?submit=showpick&state=' . ($_REQUEST['state']+1); ?>"><?php echo msg('label_display')?></a></li>
                </ul>
            </div>
        </div>
        -->
        <?php endif; ?>

        <?php if($user_obj->isRoot()) : ?>
        <div class="large-3 columns left">
            <div class="panel radius no-padding">
                <ul class="side-nav no-padding">
                    <li class="side-nav-heading"><strong><?php echo msg('category')?></strong></li>
                    <li><a href="<?php echo 'category.php?submit=add&state=' . ($_REQUEST['state']+1); ?>"><?php echo msg('label_add')?></a></li>
                    <li><a href="<?php echo 'category.php?submit=updatepick&state=' . ($_REQUEST['state']+1); ?>"><?php echo msg('label_update')?></a></li>
                    <li><a href="<?php echo 'category.php?submit=deletepick&state=' . ($_REQUEST['state']+1); ?>"><?php echo msg('label_delete')?></a></li>
                    <!--<li><a href="<?php echo 'category.php?submit=showpick&state=' . ($_REQUEST['state']+1); ?>"><?php echo msg('label_display')?></a></li>-->
                </ul>
            </div>
        </div>
        <?php endif; ?>

        <?php if($user_obj->isRoot()) : ?>
        <div class="large-3 columns left">
            <div class="panel radius no-padding">
                <ul class="side-nav no-padding">
                    <li class="side-nav-heading"><strong><?php echo msg('files')?></strong></li>
                    <li><a href="<?php echo 'delete.php?mode=view_del_archive&state=' . ($_REQUEST['state']+1); ?>"><?php echo msg('label_delete_undelete')?></a></li>
                    <li><a href="<?php echo 'toBePublished.php?mode=root&state=' . ($_REQUEST['state']+1); ?>"><?php echo msg('label_reviews')?></a></li>
                    <li><a href="<?php echo 'rejects.php?mode=root&state=' . ($_REQUEST['state']+1); ?>"><?php echo msg('label_rejections')?></a></li>
                    <?php if ($GLOBALS['CONFIG']['acceptRevisions']) : ?>
                        <li><a href="<?php echo 'check_exp.php?&state=' . ($_REQUEST['state']+1); ?>"><?php echo msg('label_check_expiration')?></a></li>
                        <li><a href="<?php echo 'file_ops.php?&state=' . ($_REQUEST['state']+1); ?>&amp;submit=view_checkedout"><?php echo msg('label_checked_out_files')?></a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <?php endif; ?>
        <div class="clearfix"></div>
    </div>

    <div class="row admin">
        <?php if($user_obj->isRoot()) : ?>
        <div class="large-3 columns left">
            <div class="panel radius no-padding">
                <ul class="side-nav no-padding">
                    <li class="side-nav-heading"><strong><?php echo msg('label_settings')?></strong></li>
                    <li><a href="<?php echo 'settings.php?submit=update&state=' . ($_REQUEST['state']+1); ?>"><?php echo msg('adminpage_edit_settings'); ?></a></li>
                    <!--<li><a href="<?php echo 'filetypes.php?submit=update&state=' . ($_REQUEST['state']+1); ?>"><?php echo msg('adminpage_edit_filetypes'); ?></a></li>-->
                </ul>
            </div>
        </div>
        <?php endif; ?>

        <?php if($user_obj->isRoot()) : ?>
        <div class="large-3 columns left">
            <div class="panel radius no-padding">
                <ul class="side-nav no-padding">
                    <li class="side-nav-heading"><strong><?php echo msg('adminpage_reports')?></strong></li>
                    <li><a href="<?php echo 'access_log.php?submit=update&state=' . ($_REQUEST['state']+1); ?>"><?php echo msg('adminpage_access_log');?></a></li>
                    <li><a href="reports/file_list.php"><?php echo msg('adminpage_reports_file_list');?></a></li>
                </ul>
            </div>
        </div>
        <?php endif; ?>
        <div class="clearfix"></div>
    </div>
</div>