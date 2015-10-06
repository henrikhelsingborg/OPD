<div class="columns large-9 medium-9 small-12 print-12 left">
    <article class="article">
        <header class="article-header">
            <div class="row">
                <div class="columns large-12">
                    <h1>{$g_lang_userpage_are_sure} {$full_name[0]} {$full_name[1]}?</h1>
                </div>
            </div>
        </header>

        <div class="article-body">
            <div class="gform_wrapper">
                <form action="user.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="columns large-12">
                            <div class="form-group">
                                <button class="btn btn-submit" type="Submit" name="submit" value="Delete User">{$g_lang_userpage_button_delete}</button>
                                <button class="btn btn-warning" type="Submit" name="cancel" value="Cancel">{$g_lang_userpage_button_cancel}</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </article>
</div>