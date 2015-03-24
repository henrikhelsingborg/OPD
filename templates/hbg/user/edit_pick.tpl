<div class="large-12 medium-12 columns article-column">
    <h1>{$g_lang_userpage_button_modify}</h1>
    <div class="row">
        <form action="user.php" method="POST" enctype="multipart/form-data">
            <div class="large-12 columns">
                <label>
                    {$g_lang_userpage_user}
                    <select name="item">
                        {foreach from=$users item=item name=users}
                            <option value="{$item.id}">{$item.last_name}, {$item.first_name} - {$item.username}</option>
                        {/foreach}
                    </select>
                </label>
            </div>

            <div class="large-12 columns">
                <button class="button success" type="submit" name="submit" value="Modify User">{$g_lang_userpage_button_modify}</button>
                <button class="button" type="submit" name="cancel" value="Cancel">{$g_lang_userpage_button_cancel}</button>
            </div>
        </form>
    </div>
</div>