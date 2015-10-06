<div class="large-12 medium-12 columns article-column">
    {$mode}
    <h1>{$g_lang_email_note_to_authors}</h1>
        <form name="author_note_form"
            {if $mode eq 'root'}
            action="{$smarty.server.PHP_SELF}?mode=root" method="POST">
            {else}
            action="{$smarty.server.PHP_SELF}" method="POST">
            {/if}

            <div class="row">
                <div class="large-6 columns">
                    <label>
                        {$g_lang_email_custom_comment}
                        <textarea name="comments" cols=45 rows=7 size='220' {$access_mode}></textarea>
                    </label>
                </div>
            </div>

            <div style="display:none">
                <input type="checkbox" name="send_to_all" onchange="send_to_dept.disabled = !send_to_dept.disabled; author_note_form.elements['send_to_users[]'].disabled = !author_note_form.elements['send_to_users[]'].disabled;">
                <input type="checkbox" name="send_to_dept" onchange="check(this.form.elements['send_to_users[]'], this, send_to_all);">
                <select name="send_to_users[]" multiple onchange="check(this, send_to_dept, send_to_all);">
                    <option value="0">no one</option>
                    <option value="owner">file owners</option>
                    {foreach from=$user_info item=user}
                    <option value="{$user.id}">{$user.last_name}, {$user.first_name}</option>
                    {/foreach}
                </select>
                <input type="hidden" name="checkbox" value="{foreach from=$checkbox item=id}{$id} {/foreach}" />
            </div>

            <div class="row">
                <div class="large-12 columns">
                <button class="button success" type="submit" name="submit" value="{$submit_value}">{$submit_value}</button>
                <button class="button" type="submit" name="submit" value="Cancel">{$g_lang_button_cancel}</button>
                </div>
            </div>

        </form>

{literal}
<script type="text/javascript">
function check(select, send_dept, send_all) {
    if(send_dept.checked || select.options[select.selectedIndex].value != "0") {
        send_all.disabled = true;
    }
    else
    {
        send_all.disabled = false;
        for(var i = 1; i < select.options.length; i++)
            select.options[i].selected = false;
        }
    }
</script>
{/literal}