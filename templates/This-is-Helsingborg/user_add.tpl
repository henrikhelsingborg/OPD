<div class="columns large-9 medium-9 small-12 print-12 left">
    <article class="article">
        <header class="article-header">
            <div class="row">
                <div class="columns large-12">
                    <h1>Lägg till användare</h1>
                </div>
            </div>
        </header>

        <div class="article-body">
            <div class="gform_wrapper">
                <form name="add_user" id="add_user" action="user.php" method="POST" enctype="multipart/form-data">
                    {$onBeforeAddUser}

                    <div class="row">
                        <div class="columns large-12">
                            <div class="form-group">
                                <label class="form-label">{$g_lang_label_first_name}</label>
                                <input name="first_name" type="text" class="required" minlength="2" maxlength="255" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="columns large-12">
                            <div class="form-group">
                                <label class="form-label">{$g_lang_label_last_name}</label>
                                <input name="last_name" type="text" class="required" minlength="2" maxlength="255" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="columns large-12">
                            <div class="form-group">
                                <label class="form-label">{$g_lang_username}</label>
                                <input name="username" type="text" class="required" minlength="2" maxlength="25">
                            </div>
                        </div>
                    </div>

                    {if $mysql_auth}
                    <div class="row">
                        <div class="columns large-12">
                            <div class="form-group">
                                <label class="form-label">{$g_lang_userpage_password}</label>
                                <input name="password" type="text" value="{$rand_password}" class="required" minlength="5" maxlength="10">
                            </div>
                        </div>
                    </div>
                    {/if}

                    <div class="row">
                        <div class="columns large-12">
                            <div class="form-group">
                                <label class="form-label">{$g_lang_label_phone_number}</label>
                                <input name="phonenumber" type="text" maxlength="20">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="columns large-12">
                            <div class="form-group">
                                <label class="form-label">{$g_lang_label_email_address}</label>
                                <select name="department" class="form-control">
                                    {foreach from=$department_list item=item name=department_list}
                                    <option value={$item.id}>{$item.name}</option>
                                    {/foreach}
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="columns large-12">
                            <div class="form-group">
                                <label class="form-label">{$g_lang_label_department}</label>
                                <select name="department">
                                    {foreach from=$department_list item=item name=department_list}
                                    <option value={$item.id}>{$item.name}</option>
                                    {/foreach}
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="columns large-12">
                            <div class="form-group">
                                <label>
                                    <input name="admin" type="checkbox" value="1" id="cb_admin"> {$g_lang_label_is_admin}?
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="columns large-12">
                            <div class="form-group">
                                <label>
                                    <input name="can_checkin" type="checkbox" value="1" id="cb_can_checkin"  checked="checked"> {$g_lang_userpage_can_checkin}?
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="columns large-12">
                            <div class="form-group">
                                <label class="form-label">{$g_lang_label_reviewer_for}</label>
                                <select name="department_review[]" multiple="multiple" style="height:100px;" />
                                    {foreach from=$department_list item=item name=department_list}
                                        <option value={$item.id}>{$item.name}</option>
                                    {/foreach}
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="columns large-12">
                            <div class="form-group">
                                <button id="submitButton" class="btn btn-submit" type="submit" name="submit" value="Add User">{$g_lang_userpage_button_add_user}</button>
                                <button id="cancelButton" class="btn btn-warning" type="submit" name="cancel" value="Cancel">{$g_lang_userpage_button_cancel}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </article>
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