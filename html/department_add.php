<div class="large-12 medium-12 columns article-column">
    <h1>Lägg till avdelning</h1>
    <div class="row">
        <form id="addDepartmentForm" action="department.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="submit" value="Add Department">

            <?php callPluginMethod('onDepartmentAddForm'); ?>

            <div class="large-12 columns">
                <label>
                    <?php echo msg('department')?>
                    <input name="department" type="text" class="required" minlength="2">
                </label>
            </div>
            <div class="large-12 columns">
                <button class="button success" type="submit" name="submit" value="Add Department"><?php echo msg('button_add_department')?></button>
                <button class="button" type="submit" name="submit" value="Cancel"><?php echo msg('button_cancel')?></button>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#addDepartmentForm').validate();
    });
</script>