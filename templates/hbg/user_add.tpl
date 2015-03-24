<div class="large-12 medium-12 columns article-column">
    <h1>Lägg till användare</h1>
    <div class="row">
    <form name="add_user" id="add_user" action="user.php" method="POST" enctype="multipart/form-data">
        {$onBeforeAddUser}

        <div class="large-6 columns">
            <label>
                {$g_lang_label_first_name}
                <input name="first_name" type="text" class="required" minlength="2" maxlength="255">
            </label>
        </div>
        <div class="large-6 columns">
            <label>
                {$g_lang_label_last_name}
                <input name="last_name" type="text" class="required" minlength="2" maxlength="255">
            </label>
        </div>
        <div class="large-6 columns">
            <label>
                {$g_lang_username}
                <input name="username" type="text" class="required" minlength="2" maxlength="25">
            </label>
        </div>

        {if $mysql_auth}
        <div class="large-6 columns">
            <label>
                {$g_lang_userpage_password}
                <input name="password" type="text" value="{$rand_password}" class="required" minlength="5" maxlength="10">
            </label>
        </div>
        {/if}

        <div class="large-6 columns">
            <label>
                {$g_lang_label_phone_number}
                <input name="phonenumber" type="text" maxlength="20">
            </label>
        </div>
        <div class="large-6 columns">
            <label>
                {$g_lang_label_email_address}
                <input name="Email" type="text" class="required email" maxlength="50">
            </label>
        </div>
        <div class="large-12 columns">
            <label>
                {$g_lang_label_department}
                <select name="department">
                    {foreach from=$department_list item=item name=department_list}
                    <option value={$item.id}>{$item.name}</option>
                    {/foreach}
                </select>
            </label>
        </div>
        <div class="large-4 columns">
            <label>
                <input name="admin" type="checkbox" value="1" id="cb_admin"> {$g_lang_label_is_admin}?
            </label>
        </div>
        <div class="large-4 columns">
            <label>
                <input name="can_add" type="checkbox" value="1" id="cb_can_add"  checked="checked"> {$g_lang_userpage_can_add}?
            </label>
        </div>
        <div class="large-4 columns">
            <label>
                <input name="can_checkin" type="checkbox" value="1" id="cb_can_checkin"  checked="checked"> {$g_lang_userpage_can_checkin}?
            </label>
        </div>
        <div class="large-12 columns">
            <label>
                {$g_lang_label_reviewer_for}
                <select name="department_review[]" multiple="multiple" style="height:100px;" />
                {foreach from=$department_list item=item name=department_list}
                    <option value={$item.id}>{$item.name}</option>
                {/foreach}
                </select>
            </label>
        </div>

        <div class="large-12 columns">
            <button id="submitButton" class="button success" type="submit" name="submit" value="Add User">{$g_lang_userpage_button_add_user}</button>
            <button id="cancelButton" class="button" type="submit" name="cancel" value="Cancel">{$g_lang_userpage_button_cancel}</button>
        </div>
    </form>
    </div>
</div>
<script>
    {literal}
    $(document).ready(function(){
        $('#submitButton').click(function(){
            $('#add_user').validate();
        })
    });
    {/literal}
</script>