<script type="text/javascript" src="functions.js"></script>

<div class="columns large-9 medium-9 small-12 print-12 left">
    <article class="article">
        <header class="article-header">
            <div class="row">
                <div class="columns large-12">
                    <h1>Ny fil</h1>
                </div>
            </div>
        </header>

        <div class="article-body">
            <div class="gform_wrapper">
            <form id="addeditform" name="main" action="{$smarty.server.PHP_SELF}" method="POST" enctype="multipart/form-data" onsubmit="return checksec();">
                <!-- Hidden fields -->
                <input type="hidden" id="db_prefix" value="{$db_prefix}" />
                {assign var='i' value='0'}
                {foreach from=$t_name item=name name='loop1'}
                <input type="hidden" id="secondary{$i}" name="secondary{$i}" value="" /> <!-- CHM hidden and onsubmit added-->
                <input type="hidden" id="tablename{$i}" name="tablename{$i}" value="{$name}" /> <!-- CHM hidden and onsubmit added-->
                {assign var='i' value=$i+1}
                {/foreach}
                <input id="i_value" type="hidden" name="i_value" value="{$i}" /> <!-- CHM hidden and onsubmit added-->

                <div class="row">
                    <div class="columns large-12">
                        <div class="form-group">
                            <label class="form-label">{$g_lang_label_file_location}</label>
                            <input tabindex="0" name="file[]" type="file" multiple="multiple" class="form-control">
                        </div>
                    </div>
                </div>

                {if $is_admin == true}
                    <div class="row" style="display:none;">
                        <div class="large-6 columns">
                            <label>
                                {$g_lang_editpage_assign_owner}
                                <select name="file_owner">
                                    {foreach from=$avail_users item=user}
                                        <option value="{$user.id}" {$user.selected}>{$user.first_name} {$user.last_name}</option>
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
                                        <option value="{$dept.id}" {$dept.selected}>{$dept.name}</option>
                                    {/foreach}
                                </select>
                            </label>
                        </div>
                    </div>
                {/if}

                <div class="row">
                    <div class="columns large-12">
                        <div class="form-group">
                            <label class="form-label">{$g_lang_category}</label>
                            <select tabindex="2" name="category" class="form-control">
                                {$categoryPicker}
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row" style="display:none;">
                    <div class="large-6 columns">
                        {include file='../common/_filePermissions.tpl'}
                    </div>
                </div>

                <div class="row">
                    <div class="columns large-12">
                        <div class="form-group">
                            <label class="form-label">{$g_lang_label_description}</label>
                            <input tabindex="5" type="Text" name="description" size="50" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="columns large-12">
                        <div class="form-group">
                            <label class="form-label">{$g_lang_label_comment}</label>
                            <textarea tabindex="6" name="comment" rows="4" onchange="this.value=enforceLength(this.value, 255);" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="large-6 columns">
                        <input class="btn btn-submit" type="submit" name="submit" value="{$g_lang_button_save}">
                        <input class="btn btn-warning" type="reset" name="reset" value="{$g_lang_button_reset}">
                    </div>
                </div>
            </form>
            </div>
        </div>

    </article>
</div>