<div class="large-12 medium-12 columns article-column">
    <h1>Checka in</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

        <table class="display large-6">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo msg('label_filename');?>:</td>
                    <td><?php echo $real_name; ?></td>
                </tr>
                <tr>
                    <td><?php echo msg('label_description');?>:</td>
                    <td><?php echo $description; ?></td>
                </tr>
                <tr>
                    <td><?php echo msg('label_file_location');?>:</td>
                    <td><input name="file" type="file"></td>
                </tr>
                <tr>
                    <td valign="top"><?php echo msg('label_note_for_revision_log');?>:</td>
                    <td><textarea name="note"></textarea></td>
                </tr>
            </tbody>
        </table>

        <input class="button success" type="submit" name="submit" value="<?php echo msg('button_check_in')?>" style="margin-top: 20px;">
    </form>
</div>
<script type="text/javascript">
    function check(select, send_dept, send_all)
    {
        if(send_dept.checked || select.options[select.selectedIndex].value != "0")
            send_all.disabled = true;
        else
        {
            send_all.disabled = false;
            for(var i = 1; i < select.options.length; i++)
                select.options[i].selected = false;
        }
    }
</script>