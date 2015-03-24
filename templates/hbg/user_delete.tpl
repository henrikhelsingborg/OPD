<div class="large-12 medium-12 columns article-column">
    <h1>{$g_lang_userpage_are_sure} {$full_name[0]} {$full_name[1]}?</h1>
    <div class="row">
        <form action="user.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="{$user_id}">

            <div class="large-12 columns">
                <button class="button success" type="Submit" name="submit" value="Delete User">{$g_lang_userpage_button_delete}</button>
                <button class="button alert" type="Submit" name="cancel" value="Cancel">{$g_lang_userpage_button_cancel}</button>
            </div>
        </form>
    </div>
</div>