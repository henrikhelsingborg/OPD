<div class="large-12 medium-12 columns article-column">
    <h1>Redigera användare</h1>
    <div class="row">
        <form name="update" id="modifyUserForm" action="user.php" method="POST" enctype="multipart/form-data">
            <div class="large-12 columns">
                <label>
                    {$g_lang_userpage_id}
                    <input type="text" disabled value="{$user->id}">
                    <input type="hidden" name="id" value="{$user->id}">
                </label>
            </div>
            <div class="large-6 columns">
                <label>
                    {$g_lang_userpage_first_name}
                    <input name="first_name" type="text" value="{$user->first_name}" class="required" minlength="2" maxlength="255">
                </label>
            </div>
            <div class="large-6 columns">
                <label>
                    {$g_lang_userpage_last_name}
                    <input name="last_name" type="text" value="{$user->last_name}" class="required" minlength="2" maxlength="255">
                </label>
            </div>
            <div class="large-6 columns">
                <label>
                    {$g_lang_userpage_username}
                    <input name="username" type="text" value="{$user->username}" class="required" minlength="2" maxlength="25">
                </label>
            </div>
            <div class="large-6 columns">
                <label>
                    {$g_lang_userpage_phone_number}
                    <input name="phonenumber" type="text" value="{$user->phone}" maxlegnth="20">
                </label>
            </div>
            {if $mysql_auth}
            <div class="large-6 columns">
                <label>
                    {$g_lang_userpage_password}
                    <input name="password" type="password" maxlength="10" placeholder="{$g_lang_userpage_leave_empty}">
                </label>
            </div>
            {/if}
            <div class="large-6 columns">
                <label>
                    {$g_lang_userpage_email}
                    <input name="Email" type="text" value="{$user->email}" class="email required" maxlength="50"></td>
                </label>
            </div>
            <div class="large-12 columns">
                <label>
                    {$g_lang_userpage_department}
                    <select name="department" {$mode}>
                        {foreach from=$department_list item=item name=department_list}
                            {if $item.id == $user_department}
                                <option selected value="{$item.id}">{$item.name}</option>
                            {else}
                                <option value="{$item.id}">{$item.name}</option>
                            {/if}
                        {/foreach}
                    </select>
                </label>
            </div>
            <div class="large-4 columns">
                <label>
                    <input name="admin" type="checkbox" value="1" {if $is_admin}checked{/if} {$mode} id="cb_admin" /> {$g_lang_userpage_admin}?
                </label>
            </div>
            <div class="large-4 columns">
                <label>
                    <input name="can_add" type="checkbox" value="1" {$can_add} {$mode} id="cb_can_add" /> {$g_lang_userpage_can_add}?
                </label>
            </div>
            <div class="large-4 columns">
                <label>
                    <input name="can_checkin" type="checkbox" value="1" {$can_checkin} {$mode} id="cb_can_checkin" /> {$g_lang_userpage_can_checkin}?
                </label>
            </div>
            <div class="large-12 columns" id="userReviewDepartmentRow" {if $display_reviewer_row}style="display: none;"{/if}>
                <label>
                    {$g_lang_userpage_reviewer_for}
                    <select class="multiView" id="userReviewDepartmentsList" name="department_review[]" multiple="multiple" {$mode} >
                        {foreach from=$department_select_options item=item name=department_select_options}
                            {$item}
                        {/foreach}
                    </select>
                </label>
            </div>

            <div class="large-12 columns">
                <button class="button success" type="submit" name="submit" value="Update User">{$g_lang_userpage_button_update}</button>
                <button class="button" type="submit" name="cancel" value="Cancel">{$g_lang_userpage_button_cancel}</button>
            </div>
        </form>
    </div>
</div>

<script>
    {literal}
        $(document).ready(function () {
            $('#modifyUserForm').validate();
        });
    {/literal}
</script>