
<div class="columns large-9 medium-9 small-12 print-12 left">
    <article class="article">
        <header class="article-header">
            <div class="row">
                <div class="columns large-12">
                    <h1>Redigera användare</h1>
                </div>
            </div>
        </header>

        <div class="article-body">
            <div class="gform_wrapper">
                <form name="update" id="modifyUserForm" action="user.php" method="POST" enctype="multipart/form-data">

                     <div class="row">
                        <div class="columns large-12">
                            <div class="form-group">
                                <label class="form-label">{$g_lang_userpage_id}</label>
                                <input type="text" disabled value="{$user->id}">
                                <input type="hidden" name="id" value="{$user->id}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="columns large-6">
                            <div class="form-group">
                                <label class="form-label">{$g_lang_userpage_first_name}</label>
                                <input name="first_name" type="text" value="{$user->first_name}" class="required" minlength="2" maxlength="255">
                            </div>
                        </div>

                        <div class="columns large-6">
                            <div class="form-group">
                                <label class="form-label">{$g_lang_userpage_last_name}</label>
                                <input name="last_name" type="text" value="{$user->last_name}" class="required" minlength="2" maxlength="255">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="columns large-6">
                            <div class="form-group">
                                <label class="form-label">{$g_lang_userpage_username}</label>
                                <input name="username" type="text" value="{$user->username}" class="required" minlength="2" maxlength="25">
                            </div>
                        </div>
                        {if $mysql_auth}
                        <div class="columns large-6">
                            <div class="form-group">
                                <label class="form-label">{$g_lang_userpage_password}</label>
                                <input name="password" type="password" maxlength="10" placeholder="{$g_lang_userpage_leave_empty}">
                            </div>
                        </div>
                        {/if}
                    </div>

                    <div class="row">
                        <div class="columns large-6">
                            <div class="form-group">
                                <label class="form-label">{$g_lang_userpage_phone_number}</label>
                                <input name="phonenumber" type="text" value="{$user->phone}" maxlegnth="20">
                            </div>
                        </div>
                        <div class="columns large-6">
                            <div class="form-group">
                                <label class="form-label">{$g_lang_userpage_email}</label>
                                <input name="Email" type="text" value="{$user->email}" class="email required" maxlength="50">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="columns large-12">
                            <div class="form-group">
                                <label class="form-label">{$g_lang_userpage_department}</label>
                                <select name="department" {$mode} class="form-control">
                                    {foreach from=$department_list item=item name=department_list}
                                        {if $item.id == $user_department}
                                            <option selected value="{$item.id}">{$item.name}</option>
                                        {else}
                                            <option value="{$item.id}">{$item.name}</option>
                                        {/if}
                                    {/foreach}
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="columns large-4">
                            <div class="form-group">
                                <label>
                                    <input name="admin" type="checkbox" value="1" {if $is_admin}checked{/if} {$mode} id="cb_admin" /> {$g_lang_userpage_admin}?
                                </label>
                            </div>
                        </div>
                        <div class="columns large-4">
                            <div class="form-group">
                                <label>
                                    <input name="can_add" type="checkbox" value="1" {$can_add} {$mode} id="cb_can_add" /> {$g_lang_userpage_can_add}?
                                </label>
                            </div>
                        </div>
                        <div class="columns large-4">
                            <div class="form-group">
                                <label>
                                    <input name="can_checkin" type="checkbox" value="1" {$can_checkin} {$mode} id="cb_can_checkin" /> {$g_lang_userpage_can_checkin}?
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="columns large-12">
                            <div class="form-group">
                                <button class="btn btn-submit" type="submit" name="submit" value="Update User">{$g_lang_userpage_button_update}</button>
                                <button class="btn btn-warning" type="submit" name="cancel" value="Cancel">{$g_lang_userpage_button_cancel}</button>
                            </div>
                        </div>
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

                </form>
            </div>
        </div>
    </article>
</div>

<script>
    {literal}
        $(document).ready(function () {
            $('#modifyUserForm').validate();
        });
    {/literal}
</script>