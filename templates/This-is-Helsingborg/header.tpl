<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow" />

    <title>{$g_title} - {$page_title}</title>

    <link rel='stylesheet'  href='http://helsingborg.dev/wp-content/themes/This-is-Helsingborg/assets/css/dist/app.min.css?ver=4.3.1' type='text/css' media='all' />

    <link rel="icon" href="http://helsingborg.se/wp-content/themes/Helsingborg/assets/img/icons/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://helsingborg.se/wp-content/themes/This-is-Helsingborg/assets/images/icons/apple-touch-icon-144x144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://helsingborg.se/wp-content/themes/This-is-Helsingborg/assets/images/icons/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://helsingborg.se/wp-content/themes/This-is-Helsingborg/assets/images/icons/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="http://helsingborg.se/wp-content/themes/This-is-Helsingborg/assets/images/icons/apple-touch-icon-precomposed.png">

    {include file='../common/head_include.tpl'}

    <link rel="stylesheet" href="{$g_base_url}/templates/This-is-Helsingborg/assets/css/hbgdoc.css" type="text/css">
</head>

<body>
    <div class="site-wrapper">
        <a href="#main" class="btn btn-default btn-offcanvas" tabindex="1">Hoppa till innehållet</a>

        <div data-prompt-wrapper="alert"></div>

        <header class="site-header">
            <div class="container">
                <div class="row">
                    <div class="columns large-12">
                        <a href="/" class="logotype" data-tooltip="focus">
                            <img src="http://helsingborg.dev/wp-content/themes/This-is-Helsingborg/assets/images/helsingborg.svg" alt="Helsingborg Stad">
                            <span class="tooltip" style="width:131px;">
                                Gå till startsidan
                            </span>
                        </a>

                        <nav class="nav-topmenu">
                            <form action="search.php" id="searchform" method="get" class="search" role="search">
                                <input type="hidden" name="where" value="all">
                                <input type="hidden" name="submit" value="Sök">

                                <div class="form-container">
                                    <div class="input-group">
                                        <div class="form-element">
                                            <input type="search" value="" placeholder="Vad letar du efter?" name="keyword" class="form-control" autocomplete="off">
                                        </div>
                                        <div class="form-element">
                                            <button type="submit" class="form-control btn btn-submit"><i class="fa fa-search"></i>Sök</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </nav>

                        <a href="/" class="logotype logotype-mobile">
                            <img src="http://helsingborg.dev/wp-content/themes/This-is-Helsingborg/assets/images/helsingborg.svg" alt="Helsingborg Stad">
                        </a>

                        <button class="btn btn-mobile-menu" data-action="toggle-mobile-menu"><i class="hbg-hamburger"></i><span>Meny</span></button>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="nav-mainmenu-container">
                <div class="container">
                    <div class="row">
                        <div class="columns large-12">
                            <nav class="navbar navbar-mainmenu">
                                <ul class="nav">
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
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Mobile menu wrapper -->

        <main id="main">
            {if $lastmessage ne ''}
            <div class="alert alert-warning" id="lastmessage">{$lastmessage}</div>
            {/if}

            <div class="section-article">
                <div class="container">
                    <div class="row">




