<script type="text/javascript" src="functions.js"></script>

<div class="large-12 medium-12 columns article-column">
    <h1>{$g_lang_detailspage_edit}: {$realname}</h1>

    <form id="addeditform" name="main" class="display dataTable" action="{$smarty.server.PHP_SELF}" method="POST" enctype="multipart/form-data" onsubmit="return checksec();">

        <!-- Hidden fields -->
        <input type="hidden" id="db_prefix" value="{$db_prefix}" />
        {assign var='i' value='0'}
        {foreach from=$t_name item=name name='loop1'}
        <input type="hidden" id="secondary{$i}" name="secondary{$i}" value="" /> <!-- CHM hidden and onsubmit added-->
        <input type="hidden" id="tablename{$i}" name="tablename{$i}" value="{$name}" /> <!-- CHM hidden and onsubmit added-->
        {assign var='i' value=$i+1}
        {/foreach}
        <input type="hidden" id="id" name="id" value="{$file_id}" />
        <input id="i_value" type="hidden" name="i_value" value="{$i}" />

        {if $is_admin == true }
            <div class="row" style="display:none;">
                <div class="large-6 columns">
                    <label>
                        {$g_lang_editpage_assign_owner}
                        <select name="file_owner">
                            {foreach from=$avail_users item=user}
                                <option value="{$user.id}" {if $pre_selected_owner eq $user.id}selected='selected'{/if}>{$user.first_name} {$user.last_name}</option>
                            {/foreach}
                        </select>
                    </label>
                </div>
            </div>
            <div class="row" style="display:none;">
                <div class="large-6 columns">
                    <label>
                        {$g_lang_editpage_assign_department}
                        <select name="file_department">
                            {foreach from=$avail_depts item=dept}
                                <option value="{$dept.id}" {if $pre_selected_department eq $dept.id}selected='selected'{/if}>{$dept.name}</option>
                            {/foreach}
                        </select>
                    </label>
                </div>
            </div>
        {/if}
        <div class="row">
            <div class="large-6 columns">
                <label>
                    {$g_lang_category}
                    <select tabindex=2 name="category" >
                        {foreach from=$cats_array item=cat}
                            <option value="{$cat.id}" {if $pre_selected_category eq $cat.id}selected='selected'{/if}>{$cat.name}</option>
                        {/foreach}
                    </select>
                </label>
            </div>
        </div>
        <div class="row"  style="display:none;">
            <div class="large-6 columns">
                <label>
                    {include file='../../templates/common/_filePermissions.tpl'}
                </label>
            </div>
        </div>
        <div class="row">
            <div class="large-6 columns">
                <label>
                    {$g_lang_label_description}
                    <input tabindex="5" type="Text" name="description" size="50" value="{$description}">
                </label>
            </div>
        </div>
        <div class="row">
            <div class="large-6 columns">
                <label>
                    {$g_lang_label_comment}
                    <textarea tabindex="6" name="comment" rows="4" onchange="this.value=enforceLength(this.value, 255);">{$comment}</textarea>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="large-6 columns">
                <input class="button success" type="submit" name="submit" value="{$g_lang_button_save}">
                <input class="button alert" type="reset" name="reset" value="{$g_lang_button_reset}">
            </div>
        </div>


    </form>
</div>