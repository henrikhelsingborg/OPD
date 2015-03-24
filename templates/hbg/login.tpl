<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow" />

    <title>HbgDoc - {$page_title}</title>

    <link rel="stylesheet" href="http://helsingborg.se/wp-content/themes/Helsingborg/css/app.css">
    <link rel="stylesheet" href="http://helsingborg.se/wp-content/themes/Helsingborg/css/normalize.css">
    <link rel="stylesheet" href="/templates/hbg/assets/css/hbgdoc.css" type="text/css" />

    <link rel="icon" href="http://helsingborg.se/wp-content/themes/Helsingborg/assets/img/icons/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://helsingborg.se/wp-content/themes/Helsingborg/assets/img/icons/apple-touch-icon-144x144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://helsingborg.se/wp-content/themes/Helsingborg/assets/img/icons/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://helsingborg.se/wp-content/themes/Helsingborg/assets/img/icons/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="http://helsingborg.se/wp-content/themes/Helsingborg/assets/img/icons/apple-touch-icon-precomposed.png">
</head>

<body>
    <div class="off-canvas-wrap">
        <div class="inner-wrap">
        <div class="main-site-container login">
            <img class="logo" alt="helsingborg stad" src="http://helsingborg.se/wp-content/themes/Helsingborg/assets/img/images/hbg-logo.svg">

            <div class="main-page-layout row">
                <div class="main-area large-12 columns">
                    <div class="main-content row">
                        <div class="login-box large-5 medium-8 large-centered medium-centered columns">
                            <form action="login.php" method="post">
                                {if $redirection}
                                    <input type="hidden" name="redirection" value="{$redirection}">
                                {/if}

                                <div class="row">
                                    <div class="large-12 columns">
                                        <label>
                                            {$g_lang_username}
                                            <input name="frmuser" type="text" />
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-12 columns">
                                        <label>
                                            {$g_lang_password}
                                            <input name="frmpass" type="password" />
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-6 columns">
                                        <input type="submit" name="login" class="button organge" value="{$g_lang_enter}">
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
            </div>
        </div>
        </div>
    </div>
</body>
</html>