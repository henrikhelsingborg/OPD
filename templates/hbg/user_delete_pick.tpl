<div class="large-12 medium-12 columns article-column">
    <h1>Ta bort användare</h1>
    <div class="row">
        <form action="user.php" method="post" enctype="multipart/form-data">
            <div class="large-12 columns">
                <label>
                    {$g_lang_userpage_user}
                    <select name="item">
                        {foreach from=$user_list item=item name=user_list}
                            <option value="{$item.id}">{$item.last_name}, {$item.first_name} - {$item.username}</option>
                        {/foreach}
                    </select>
                </label>
            </div>

            <div class="large-12 columns">
                <button class="button alert" type="submit" name="submit" value="Delete">{$g_lang_userpage_button_delete}</button>
                <button class="button" type="submit" name="cancel" value="Cancel">{$g_lang_userpage_button_cancel}</button>
            </div>
        </form>
    </div>
</div>