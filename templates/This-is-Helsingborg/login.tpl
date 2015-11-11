<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow" />

    <title>{$g_title} - {$page_title}</title>

    <link rel='stylesheet'  href='http://www.helsingborg.se/wp-content/themes/This-is-Helsingborg/assets/css/dist/app.min.css?ver=4.3.1' type='text/css' media='all' />

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
        <main id="main">
            <div class="section-article">
                <div class="container">
                    <div class="row" style="text-align: center;">
                        <img class="logo" alt="helsingborg stad" src="http://www.helsingborg.se/wp-content/themes/This-is-Helsingborg/assets/images/helsingborg.svg" width="250">
                    </div>
                    <div class="row" style="margin-top: 70px;">

                        <div class="login-box large-5 medium-8 large-centered medium-centered columns">
                            <div class="box">
                                <h3 class="box-title">Logga in</h3>
                                <div class="box-content" style="padding: 30px;">
                                    <form action="login.php" method="post">
                                        {if $redirection}
                                            <input type="hidden" name="redirection" value="{$redirection}">
                                        {/if}

                                        <div class="form-group">
                                            <label for="frmuser" class="form-label">{$g_lang_username}</label>
                                            <input name="frmuser" id="frmuser" type="text" class="form-control" />
                                        </div>

                                        <div class="form-group" style="margin-top: 10px;">
                                            <label for="frmpass" class="form-label">{$g_lang_password}</label>
                                            <input name="frmpass" id="frmpass" type="password" class="form-control" />
                                        </div>


                                        <div class="row" style="margin-top: 10px;">
                                            <div class="large-6 columns">
                                                <input type="submit" name="login" class="btn btn-submit" value="{$g_lang_enter}">
                                            </div>
                                        </div>

                                        {if $g_allow_password_reset eq 'True'}
                                        <div class="row">
                                            <div class="large-6 columns">
                                                <a href="{$g_base_url}/forgot_password.php">{$g_lang_forgotpassword}</a>
                                            </div>
                                        </div>
                                        {/if}
                                    </form>
                                </div>
                            </div>
                        </div>