<div class="columns large-9 medium-9 small-12 print-12 left">
    <article class="article">
        <header class="article-header">
            <div class="row">
                <div class="columns large-12">
                    <h1>{$g_lang_userpage_button_modify}</h1>
                </div>
            </div>
        </header>

        <div class="article-body">
            <div class="gform_wrapper">
                <form action="user.php" method="post" enctype="multipart/form-data">

                    <div class="row">
                        <div class="columns large-12">
                            <div class="form-group">
                                <label class="form-label">{$g_lang_userpage_user}</label>
                                <select name="item" class="form-control">
                                    {foreach from=$user_list item=item name=user_list}
                                        <option value="{$item.id}">{$item.last_name}, {$item.first_name} - {$item.username}</option>
                                    {/foreach}
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="columns large-12">
                            <div class="form-group">
                                <button class="btn btn-submit" type="submit" name="submit" value="Delete">{$g_lang_userpage_button_delete}</button>
                                <button class="btn btn-warning" type="submit" name="cancel" value="Cancel">{$g_lang_userpage_button_cancel}</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </article>
</div>