<?php

use Source\Models\Auth;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <?= $head; ?>


    <link rel="stylesheet" href="<?= theme("/assets/style.css", CONF_VIEW_ADMIN); ?>"/>
    <link rel="icon" type="image/png" href="<?= theme("/assets/images/favicon.png", CONF_VIEW_ADMIN); ?>"/>

    <style>
        span.twitter-typeahead .tt-suggestion:focus, span.twitter-typeahead .tt-suggestion:hover {background-color: var(--bs-<?=$user->color?>);}
        .dropdown-item.active, .dropdown-item:active, .dropdown-item:hover {background-color: var(--bs-<?=$user->color?>);}
        .page-link {color: var(--bs-<?=$user->color?>);}
        .pagination {--bs-link-hover-color: var(--bs-<?=$user->color?>);}
        .page-item.active .page-link {color: var(--bs-<?=$user->text?>);background-color: var(--bs-<?=$user->color?>);border-color: var(--bs-<?=$user->color?>);}
        .custom-tooltip {--bs-tooltip-bg: var(--bd-<?=$user->color?>);--bs-tooltip-color: var(--bs-<?=$user->text?>);}

        .nav-item .nav-link:hover, .nav-item .nav-link.active {background-color: rgba(0, 0, 0, .5);}
    </style>

</head>
<body>

<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
    </symbol>
    <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
    </symbol>
    <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
    </symbol>
    <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
    </symbol>
</svg>

<div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
    <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
            id="bd-theme"
            type="button"
            aria-expanded="false"
            data-bs-toggle="dropdown"
            aria-label="Toggle theme (auto)">
        <svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#circle-half"></use></svg>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
    </button>
    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
                <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#sun-fill"></use></svg>
                Light
                <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
            </button>
        </li>
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
                <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
                Dark
                <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
            </button>
        </li>
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
                <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#circle-half"></use></svg>
                Auto
                <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
            </button>
        </li>
    </ul>
</div>

<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="calendar3" viewBox="0 0 16 16">
        <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
        <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
    </symbol>
    <symbol id="list" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
    </symbol>
</svg>

<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">Company name</a>

    <ul class="navbar-nav flex-row d-md-none">
        <li class="nav-item text-nowrap">
            <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle search">
                <svg class="bi"><use xlink:href="#search"/></svg>
            </button>
        </li>
        <li class="nav-item text-nowrap">
            <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <svg class="bi"><use xlink:href="#list"/></svg>
            </button>
        </li>
    </ul>

    <div id="navbarSearch" class="navbar-search w-100 collapse">
        <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-<?=$user->color?>">
            <div class="offcanvas-md offcanvas-end bg-<?=$user->color?>" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                        <span>Saved reports</span>
                        <a class="link-secondary" href="#" aria-label="Add a new report">
                            <svg class="bi"><use xlink:href="#plus-circle"/></svg>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-auto">

                        <?php
                        $nav = function ($icon, $href, $title) use ($app) {
                            $user = Auth::user();
                            $active = (explode("/", $app)[0] == explode("/", $href)[0] ? "active" : false);
                            $url = url("/admin/{$href}");
                            return "<li class=\"nav-item\"><a class=\"nav-link d-flex align-items-center gap-2 {$active} text-{$user->text}\" href=\"{$url}\"><i class=\"bi bi-{$icon} me-2 mb-2\"></i>{$title}</a><li>";
                        };

                        echo $nav("house-gear", "dash","Dashboard");
                        echo $nav("postcard-heart", "control/home","Control");
                        echo $nav("pencil-square", "site/home", "Site");
                        echo $nav("pencil-square", "blog/home", "Blog");
                        echo $nav("question-circle", "faq/home", "FAQs");
                        echo $nav("user", "users/home", "Usuários");
                        ?>
                    </ul>

                    <hr class="my-3">

                    <ul class="nav flex-column mb-auto">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="#">
                                <svg class="bi"><use xlink:href="#gear-wide-connected"/></svg>
                                Settings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="#">
                                <svg class="bi"><use xlink:href="#door-closed"/></svg>
                                Sign out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="row">
                <?= $this->section("content"); ?>
            </div>
        </div>
    </div>



        <footer class="bd-footer py-4 py-md-5 bg-body-tertiary text-center">
            <div class="container-xl py-4 py-md-5 px-4 px-md-3 text-body-secondary">
                <div class="row">
                    <div class="col-lg-3 mb-3">
                        <a data-bs-togglee="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip"
                           data-bs-title="Agenda de Ramais" class="d-inline-flex align-items-center mb-2 text-body-emphasis text-decoration-none" href="<?=url("/contatos")?>" aria-label=Contatos">
                            <i class="bi bi-book fs-1 mb-3 me-2 text-danger fw-bold"></i>
                            <span class="text-danger fw-bold fs-6">SMSUB AGENDA</span>
                        </a>
                        <ul class="list-unstyled small">
                            <li class="mb-2">Desenvolvido com todo amor pela equipe de <strong>SMSUB - COTI - Coordenação de Tecnologia da Informação</strong>.</li>
                            <li class="mb-2">Código licenciado <a data-bs-togglee="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip"
                                                                  data-bs-title="Liçenca de Software" class="text-decoration-none text-danger fw-bold" href="https://github.com/rrrjesus/agenda/blob/main/LICENSE" target="_blank" rel="license noopener">MIT</a></li>
                            <li class="mb-2">Versão Atual v2.0.2.</li>
                            <li class="mb-2">Código Fonte <a data-bs-togglee="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="GitHub do Desenvolvedor" class="text-decoration-none text-danger fw-bold" href="https://github.com/rrrjesus" target="_blank" rel="noopener"><i class="bi bi-github"></i> @rrrjesus/agenda</a>.</li>
                        </ul>
                    </div>

                    <div class="col-lg-2 mb-3">
                        <h5>Mais</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a data-bs-togglee="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="Acessar Home"  class="text-decoration-none text-danger fw-bold" href="<?= url(); ?>">Home</a></li>
                            <li class="mb-2"><a data-bs-togglee="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="Acessar Contatos" class="text-decoration-none text-danger fw-bold" href="<?= url("/contatos"); ?>">Contatos</a></li>
                            <?php if(!empty($user->id)):?>
                                <li class="mb-2"><a data-bs-togglee="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="Acessar Painel" class="text-decoration-none text-danger fw-bold" href="<?= url("/dashboard"); ?>">Painel</a></li>
                            <?php else: ?>
                                <li class="mb-2"><a data-bs-togglee="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="Login no Painel" class="text-decoration-none text-danger fw-bold" href="<?= url("/entrar"); ?>">Entrar</a></li>
                            <?php endif;?>
                        </ul>
                    </div>

                    <div class="col-12 col-lg-4 mb-3">
                        <h5>Contato:</h5>
                        <ul class="list-unstyled small">
                            <li class="mb-2"><p><b>Telefone:</b><br> +55 11 4934-3131</p></li>
                            <li class="mb-2"><p><b>E-mail:</b><br>
                                    <a class="text-decoration-none text-danger fw-bold" href="mailto:<?=CONF_SITE_EMAIL?>" data-bs-togglee="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="E-mail de COTI - Suporte"><?=CONF_SITE_EMAIL?></a></p></li>
                            <li class="mb-2"><p><b>Endereço:</b><br><a class="text-decoration-none text-danger fw-bold" data-bs-togglee="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="Endereço no Google Maps de SMSUB"  target="_blank" href="https://www.google.com/maps/place/Condom%C3%ADnio+do+Edif%C3%ADcio+Martinelli/@-23.5455906,-46.6350075,15z/data=!4m6!3m5!1s0x94ce5854575bec47:0xcff6dbd0a9dd6bac!8m2!3d-23.5455906!4d-46.6350075!16s%2Fm%2F047d5rn?entry=ttu">
                                        <i class="bi bi-pin-map-fill"></i> </a> Rua São Bento, 405 / Rua Líbero Badaró, 504 - Edifício Martinelli - 10º, 23º e 24º andar - Centro - São Paulo</p></li>
                        </ul>
                    </div>

                    <div class="col-lg-2">
                        <h5>Social:</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a target="_blank" class="text-decoration-none text-danger fw-bold"
                                                href="https://www.facebook.com/<?= CONF_SOCIAL_FACEBOOK_PAGE; ?>" data-bs-togglee="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="<?=CONF_SITE_NAME?> no Facebook"><i class="bi bi-facebook"></i> /SMSUB</a></li>
                            <li class="mb-2"><a target="_blank" class="text-decoration-none text-danger fw-bold"
                                                href="https://www.instagram.com/<?= CONF_SOCIAL_INSTAGRAM_PAGE; ?>" data-bs-togglee="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="<?=CONF_SITE_NAME?> no Instagram"><i class="bi bi-instagram"></i> @SMSUB</a></li>
                            <li class="mb-2"><a target="_blank" class="text-decoration-none text-danger fw-bold" href="https://www.youtube.com/<?= CONF_SOCIAL_YOUTUBE_PAGE; ?>"
                                                data-bs-togglee="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="<?=CONF_SITE_NAME?> no YouTube"><i class="bi bi-youtube"></i> /SMSUB</a></li>
                        </ul>
                    </div>

                    <p data-bs-toggle="tooltip" data-bs-placement="left" title="Termos da <?=CONF_SITE_DESC?>" class="termos text-center p-3"> &copy; 2023, SMSUB todos os direitos reservados</p>
                </div>
            </div>
        </footer>

</div>
<div class="flex-shrink-0 p-3 bg-<?=$user->color?>" style="width: 280px;">
    <a href="/" class="d-flex align-items-center pb-3 mb-3 link-body-emphasis text-decoration-none border-bottom">
        <svg class="bi pe-none me-2" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
        <span class="fs-5 fw-semibold text-light">Collapsible</span>
    </a>
    <ul class="list-unstyled ps-0">
        <?php
            $nav = function ($icon, $href, $colapse, $title) use ($app) {
            $true = (explode("/", $app)[0] == explode("/", $href)[0] ? "true" : false);
            $url = url("/admin/{$href}");
            return "<li class=\"mb-1\"><button class=\"btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed\"
                    data-bs-toggle=\"collapse\" data-bs-target=\"#{$colapse}-collapse\" aria-expanded=\"{$true}\"><i class=\"bi bi-{$icon} me-2 mb-2\"></i>{$title}</button>
                     <div class=\"collapse\" id=\"{$colapse}-collapse\">
                     <ul class=\"btn-toggle-nav list-unstyled fw-normal pb-1 small\">
                     <li><a href=\"#\" class=\"link-body-emphasis d-inline-flex text-decoration-none rounded\">Updates</a></li>
                     </ul>
                     </div>
                     <li><!--<li class=\"border-top my-3\"></li>-->";
        };

        echo $nav("house-gear", "dash", "dash","Dashboard");
        echo $nav("postcard-heart", "control/home", "control","Control");
        echo $nav("pencil-square", "site/home", "site","Site");
        echo $nav("pencil-square", "blog/home", "blog","Blog");
        echo $nav("question-circle", "faq/home", "faqs","FAQs");
        echo $nav("user", "users/home", "users","Usuários");
        ?>
    </ul>
</div>

<div class="dash">
    <aside class="dash_sidebar">
        <article class="dash_sidebar_user">
            <?php
            $photo = $user->photo();
            $userPhoto = ($photo ? image($photo, 300, 300) : theme("/assets/images/avatar.jpg", CONF_VIEW_ADMIN));
            ?>
            <div><img class="dash_sidebar_user_thumb" src="<?= $userPhoto; ?>" alt="" title=""/></div>
            <h3 class="dash_sidebar_user_name">
                <a href="<?= url("/admin/users/user/" . $user->id); ?>"><?= $user->fullName(); ?></a>
            </h3>
        </article>



        <ul class="dash_sidebar_nav">
            <?php
            $nav = function ($icon, $href, $title) use ($app) {
                $active = (explode("/", $app)[0] == explode("/", $href)[0] ? "active" : null);
                $url = url("/admin/{$href}");
                return "<li class=\"dash_sidebar_nav_li {$active}\"><a class=\"icon-{$icon}\" href=\"{$url}\"><i class=\"bi bi-{$icon} pe-2\"></i>{$title}</a></li>";
            };

            echo $nav("house-gear", "dash", "Dashboard");
            echo $nav("postcard-heart", "control/home", "Control");
            echo $nav("pencil-square", "site/home", "Site");
            echo $nav("pencil-square", "blog/home", "Blog");
            echo $nav("question-circle", "faq/home", "FAQs");
            echo $nav("user", "users/home", "Usuários");
            echo "<li class=\"dash_sidebar_nav_li\"><a class=\"icon-link\" href=\"" . url() . " \" target=\"_blank\">Ver site</a></li>";

            echo $nav("sign-out on_mobile", "logoff", "Sair");
            ?>
        </ul>
    </aside>
    <section class="dash_content">
        <div class="dash_userbar">
            <div class="dash_userbar_box">
                <div class="dash_content_box">
                    <h1 class="icon-cog transition"><a href="<?= url("/admin/dash"); ?>">Café<b>Admin</b></a></h1>
                    <div class="dash_userbar_box_bar">
                        <span class="notification_center_open icon-bell"
                              data-count="<?= url("/admin/notifications/count"); ?>"
                              data-notify="<?= url("/admin/notifications/list"); ?>">0</span>
                        <span class="no_mobile icon-clock-o"><?= date("d/m H\hi"); ?></span>
                        <a class="no_mobile icon-sign-out" title="Sair" href="<?= url("/admin/logoff"); ?>">Sair</a>
                        <span class="icon-menu icon-notext mobile_menu transition"></span>
                    </div>
                </div>
            </div>

            <div class="notification_center"></div>
        </div>

        <div class="dash_content_box">
            <?= $this->section("content"); ?>
        </div>
    </section>
</div>

<!--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-53658515-18"></script>-->
<script src="<?= theme("/assets/scripts.js", CONF_VIEW_ADMIN); ?>"></script>
<?= $this->section("scripts"); ?>

</body>
</html>