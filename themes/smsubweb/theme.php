<?php
    $user = (new \Source\Models\Auth())->user();
?>
<!-- SMSUB AGENDA -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <?= $head;?>

    <link rel="icon" type="image/png" href="<?= theme("/assets/images/favicon.png"); ?>"/>
    <link rel="stylesheet" href="<?= theme("/assets/style.css"); ?>"/>
</head>
<body>

<div class="ajax_load">
    <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
            <p class="ajax_load_box_title">Aguarde, carregando ...</p>
    </div>
</div>

<!--HEADER-->
<header class="main_header gradient gradient-<?=CONF_SITE_BASECOLOR?>">
    <div class="container">
        <div class="main_header_logo">
            <div class="main_header_logo">
                <h1><a class="icon icon-leanpub icon-notext transition" title="Home" href="<?= url(); ?>"> <strong>SMSUB</strong> AGENDA</a></h1>
            </div>
        </div>

        <nav class="main_header_nav">
            <span class="main_header_nav_mobile j_menu_mobile_open icon-menu icon-notext radius transition"></span>
            <div class="main_header_nav_links j_menu_mobile_tab">

                <span class="main_header_nav_mobile_close j_menu_mobile_close icon-error icon-notext transition"></span>
                <a class="link transition radius" title="Home" href="<?= url(); ?>"><i class="bi bi-house-door"></i> Home</a>
                <a class="link transition radius" title="Home" href="<?= url("/contatos"); ?>"><i class="bi bi-telephone-x"></i> Contatos</a>
                <a class="link transition radius" title="Sobre" href="<?= url("/sobre"); ?>">Sobre</a>
                <a class="link transition radius" title="Sobre" target="_blank" href="http://<?=CONF_DB_HOST?>/agendav1/">Antiga</a>
            <?php if(!empty($user->id)):?>
                <a class="btn btn-success link-light icon-user dropdown-toggle" title="Entrar" data-bs-toggle="dropdown" aria-expanded="false" href="<?= url("/entrar"); ?>"><?=$user->functional_record?></a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item icon-phone" title="Site" href="<?= url("/dashboard"); ?>"> Painel</a></li>
                    <li><a class="dropdown-item icon-user" href="#">Perfil</a></li>
                    <li><a class="dropdown-item icon-sign-out" href="<?= url("/dashboard/sair"); ?>">Sair</a></li>
                </ul>
            <?php else:?>
                <a class="link login transition radius icon-sign-in" title="Entrar" href="<?= url("/entrar"); ?>">Entrar</a>
            <?php endif;?>
            </div>
        </nav>
    </div>
</header>



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

<!--CONTENT-->
<main class="main_content">
    <?= $this->section("content"); ?>
</main>

<?php if ($this->section("optout")): ?>
    <?= $this->section("optout"); ?>
<?php else: ?>
    <article class="footer_optout">
        <div class="footer_optout_content content">
            <span class="icon icon-leanpub icon-notext icon-notext"></span>
            <h2>Comece a utilizar a agenda inteligente agora mesmo</h2>
            <p>É rápida, simples e funcional!</p>
        </div>
    </article>
<?php endif; ?>

<!--FOOTER-->
<footer class="main_footer">
    <div class="container content">
        <section class="main_footer_content">
            <article class="main_footer_content_item">
                <h2>Sobre:</h2>
                <a class="link transition radius" title="Sobre" href="<?= url("/sobre"); ?>">Sobre</a>
            </article>

            <article class="main_footer_content_item">
                <h2>Mais:</h2>
                <a class="link transition radius" data-bs-toggle="tooltip" data-bs-placement="left" title="Home" href="<?= url(); ?>">Home</a>
                <a class="link transition radius" data-bs-toggle="tooltip" data-bs-placement="left" title="Contatos" href="<?= url("/contatos"); ?>">Contatos</a>
            <?php if(!empty($user->id)):?>
                <a class="link transition radius" data-bs-toggle="tooltip" data-bs-placement="left" title="Painel" href="<?= url("/dashboard"); ?>">Painel</a>
            <?php else: ?>
                <a class="link transition radius" data-bs-toggle="tooltip" data-bs-placement="left" title="Entrar" href="<?= url("/entrar"); ?>">Entrar</a>
            <?php endif;?>
                <a class="link transition radius" data-bs-toggle="tooltip" data-bs-placement="left" title="Contatos" target="_blank" href="http://10.23.237.79/agendav1/">Antiga</a>
            </article>

            <article class="main_footer_content_item">
                <h2>Contato:</h2>
                <p class="icon-phone"><b>Telefone:</b><br> +55 11 4934-3131</p>
                <p class="icon-envelope pb-1"><b>Email:</b><a class="link transition radius" data-bs-toggle="tooltip" data-bs-placement="left" title="e-mail do suporte"
                    href="mailto:<?=CONF_SITE_EMAIL?>"><?=CONF_SITE_EMAIL?></a> </p>
                <p class="icon-map-marker"><b>Endereço:</b><br>
                    <?=CONF_SITE_ADDR_STREET.", ".CONF_SITE_ADDR_NUMBER." - ".CONF_SITE_ADDR_COMPLEMENT." - ".CONF_SITE_ADDR_NEIGHBORHOOD." - ".CONF_SITE_ADDR_CITY?></p>
            </article>

            <article class="main_footer_content_item social">
                <h2>Social:</h2>
                <a target="_blank" class="icon-facebook"
                   href="https://www.facebook.com/<?= CONF_SOCIAL_FACEBOOK_PAGE; ?>" data-bs-toggle="tooltip" data-bs-placement="left" title="<?=CONF_SITE_NAME?> no Facebook">/SMSUB</a>
                <a target="_blank" class="icon-instagram"
                   href="https://www.instagram.com/<?= CONF_SOCIAL_INSTAGRAM_PAGE; ?>" data-bs-toggle="tooltip" data-bs-placement="left" title="<?=CONF_SITE_NAME?> no Instagram">@smsub</a>
                <a target="_blank" class="icon-youtube" href="https://www.youtube.com/<?= CONF_SOCIAL_YOUTUBE_PAGE; ?>"
                   data-bs-toggle="tooltip" data-bs-placement="left" title="<?=CONF_SITE_NAME?> no YouTube">/SMSUB</a>
            </article>
        </section>

        <p data-bs-toggle="tooltip" data-bs-placement="left" title=Termos da "<?=CONF_SITE_DESC?>" class="termos text-center p-3">
            &copy; 2023, SMSUB todos os direitos reservados
        </p>
    </div>
</footer>

<script src="<?= theme("/assets/scripts.js"); ?>"></script>

<?= $this->section("scripts"); ?>

</body>
</html>

<!-- Desenvolvido por Rodolfo R. R. de Jesus - rrrjesus@smsub.prefeitura.sp.gov.br -->