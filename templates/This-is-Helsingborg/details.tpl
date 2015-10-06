<form name="data">
    <input type="hidden" name="to" value="{$file_detail.to_value}" />
    <input type="hidden" name="subject" value="{$file_detail.subject_value}" />
    <input type="hidden" name="comments" value="{$file_detail.comments_value}" />
</form>

<div class="large-12 medium-12 columns article-column">
    <h1>{$file_detail.realname}</h1>
    <table class="large-6">
        <tbody>
            <tr>
                <td>{$g_lang_category}:</td>
                <td>{$file_detail.category}</td>
            </tr>
            <tr>
                <td>{$g_lang_label_size}:</td>
                <td>{$file_detail.filesize}</td>
            </tr>
            <tr>
                <td>{$g_lang_label_created_date}:</td>
                <td>{$file_detail.created}</td>
            </tr>
            {if $userName ne 'public'}
            <!--
            <tr>
                <td>{$g_lang_owner}:</td>
                <td><a href="mailto:{$file_detail.owner_email}?Subject=Regarding%20your%20document:{$file_detail.realname}&Body=Hello%20{$file_detail.owner_fullname}"> {$file_detail.owner}</a></td>
            </tr>
            -->
            {/if}
            <tr>
                <td>{$g_lang_label_description}:</td>
                <td>{$file_detail.description}</td>
            </tr>
            <tr>
                <td>{$g_lang_label_comment}:</td>
                <td>{$file_detail.comment}</td>
            </tr>
            <!--
            <tr>
                <td>{$g_lang_revision}:</td>
                <td>{$file_detail.revision}</td>
            </tr>
            -->
            <tr>
                <td>Antal nedladdningar:</td>
                <td>{$file_detail.downloads}</td>
            </tr>
            {if $file_detail.file_under_review}
            <tr>
                <td>{$g_lang_label_reviewer}:</td>
                <td>{$file_detail.reviewer} (<a href='javascript:showMessage()'>{$g_lang_message_reviewers_comments_re_rejection}</a>)</td>
            </tr>
            {/if}
            {if $file_detail.status gt 0}
            <tr>
                <td valign=top align=right>{$g_lang_detailspage_file_checked_out_to}:</td>
                <td><a href="mailto:{$checkout_person_email}?Subject=Regarding%20your%20checked-out%20document:{$file_detail.realname}&amp;Body=Hello%20{$checkout_person_full_name.$fullname[0]}">{$checkout_person_full_name[1]}, {$checkout_person_full_name[0]}</a></td>
            </tr>
            {/if}
        </tbody>
    </table>

    {if $view_link ne ''}
    <a href="{$view_link}" class="button success">{$g_lang_detailspage_view}</a>
    {/if}
    {if $acceptRevisions eq 'true'}
    <a href="{$history_link}" class="button secondary">{$g_lang_detailspage_history}</a>
    {/if}
    {if $check_out_link ne '' && $acceptRevisions eq 'true'}
    <a href="{$check_out_link}" class="button secondary">{$g_lang_detailspage_check_out}</a>
    {/if}
    {if $edit_link ne ''}
    <a href="{$edit_link}" class="button secondary">{$g_lang_detailspage_edit}</a>
    <a href="javascript:my_delete()" class="button alert">{$g_lang_detailspage_delete}</a>
    {/if}
</div>


{literal}
<script type="text/javascript">
    var message_window;
    var mesg_window_frm;
    function my_delete()
    {
        if (window.confirm("{/literal}{$g_lang_detailspage_are_sure}{literal}"))  {
            window.location = "{/literal}{$my_delete_link}{literal}";
        }
    }
    function sendFields()
    {
        mesg_window_frm = message_window.document.author_note_form;
        if(mesg_window_frm) {
            mesg_window_frm.to.value = document.data.to.value;
            mesg_window_frm.subject.value = document.data.subject.value;
            mesg_window_frm.comments.value = document.data.comments.value;
        }
    }
    function showMessage()
    {
        message_window = window.open('{/literal}{$comments_link}{literal}' , 'comment_wins', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=no,width=450,height=200');
        message_window.focus();
        setTimeout("sendFields();", 500);
    }
</script>
{/literal}
