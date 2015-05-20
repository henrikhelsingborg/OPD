<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow" />

    <title>{$g_title} - {$page_title}</title>

    <link rel="stylesheet" href="http://helsingborg.se/wp-content/themes/Helsingborg/css/app.css">
    <link rel="stylesheet" href="http://helsingborg.se/wp-content/themes/Helsingborg/css/normalize.css">

    <link rel="icon" href="http://helsingborg.se/wp-content/themes/Helsingborg/assets/img/icons/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://helsingborg.se/wp-content/themes/Helsingborg/assets/img/icons/apple-touch-icon-144x144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://helsingborg.se/wp-content/themes/Helsingborg/assets/img/icons/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://helsingborg.se/wp-content/themes/Helsingborg/assets/img/icons/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="http://helsingborg.se/wp-content/themes/Helsingborg/assets/img/icons/apple-touch-icon-precomposed.png">

    {include file='../../templates/common/head_include.tpl'}

    <link rel="stylesheet" href="/templates/hbg/assets/css/hbgdoc.css" type="text/css">
</head>

<body>
    <div class="off-canvas-wrap">
        <div class="inner-wrap">

            <aside class="left-off-canvas-menu">
                <ul role="navigation" class="mobile-nav-list">
                    <li><a href="out.php">Alla</a></li>
                    {foreach from=$categories item=item name=categories}
                        <li><a href="search.php?submit=submit&amp;sort_by=id&amp;where=category&amp;sort_order=asc&amp;keyword={$item.name}&amp;exact_phrase=on">{$item.name}</a></li>
                    {/foreach}
                </ul>
            </aside>

            <a class="exit-off-canvas"></a>

            <nav role="navigation" class="mobile-nav">
                <div role="navigation" class="mobile-navigation clearfix">
                    <a class="show-mobile-nav left-off-canvas-toggle" href="#" aria-expanded="false">Meny</a>
                    <a class="show-mobile-search" href="#">Sök</a>
                </div>
                <div class="mobile-search">
                    <div class="mobile-search-input-container">
                        <form action="search.php" id="searchform" method="get" role="search">
                            <input type="hidden" name="where" value="all">
                            <input type="hidden" name="submit" value="Sök">

                            <input type="text" placeholder="Din Sökning" class="mobile-search-input" name="keyword">
                            <input type="submit" value="sök" class="mobile-search-btn organge">
                        </form>
                    </div>
                </div>
            </nav>

            <div class="main-site-container">
                <div class="site-bg"></div>
                <div class="site-header row">
                    <div class="site-logo large-4 medium-4 columns">
                        <div class="row">
                        <a class="logo-link" href="{$g_base_url}">
                            <img class="logo" alt="helsingborg stad" src="http://helsingborg.se/wp-content/themes/Helsingborg/assets/img/images/hbg-logo.svg">
                        </a>
                        </div>
                    </div>
                    <div class="support-nav large-8 medium-8 columns">
                        <ul class="support-nav-list inline-list row" id="support-nav">
                            <li class="menu-item"><a href="{$g_base_url}/out.php">{$g_lang_home}</a></li>
                            <li class="menu-item"><a href="{$g_base_url}/search.php">{$g_lang_search}</a></li>

                            {if $acceptRevisions eq 'true' && ($can_checkin || $isadmin eq 'yes') }
                                <li class="menu-item"><a href="{$g_base_url}/in.php">{$g_lang_button_check_in}</a></li>
                            {/if}
                            {if $can_add || $isadmin eq 'yes'}
                                <li class="menu-item"><a href="{$g_base_url}/add.php">{$g_lang_button_add_document}</a></li>
                            {/if}
                            {if $isadmin eq 'yes'}
                                <li class="menu-item"><a href="{$g_base_url}/admin.php">{$g_lang_label_admin}</a></li>
                            {/if}

                            {if $userName ne 'public'}
                            <li class="menu-item"><a href="{$g_base_url}/logout.php">{$g_lang_logout}</a></li>
                            {/if}
                        </ul>
                    </div>
                </div>

                <div class="main-content row">
                    {if $lastmessage ne ''}
                    <div class="alert-box radius" id="lastmessage">{$lastmessage}</div>
                    {/if}