<?php
    $user = (new \Source\Models\Auth())->user();
?>

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
                <a class="link transition radius" title="Home" href="<?= url(); ?>">Home</a>
                <a class="link transition radius" title="Home" href="<?= url("/contatos"); ?>">Contatos</a>
                <a class="link transition radius" title="Sobre" href="<?= url("/sobre"); ?>">Sobre</a>
                <a class="link transition radius" title="Sobre" target="_blank" href="http://10.23.237.79/agendav1/">Antiga</a>
                <?php if(!empty($user->id)):?>
                        <a class="btn btn-success link-light icon-user dropdown-toggle" title="Entrar" data-bs-toggle="dropdown" aria-expanded="false"
                           href="<?= url("/entrar"); ?>"><?=$user->functional_record?></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item icon-phone" title="Site" href="<?= url("/dashboard"); ?>"> Painel</a></li>
                            <li><a class="dropdown-item icon-user" href="#">Perfil</a></li>
                            <li><a class="dropdown-item icon-sign-out" href="<?= url("/dashboard/sair"); ?>">Sair</a></li>
                        </ul>
                <?php else:?>
                    <a class="link login transition radius icon-sign-in" title="Entrar"
                        href="<?= url("/entrar"); ?>">Entrar</a>
                <?php endif;?>
            </div>
        </nav>
    </div>
</header>

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
                <a class="link transition radius" title="Home" href="<?= url(); ?>">Home</a>
                <a class="link transition radius" title="Home" href="<?= url("/contatos"); ?>">Agenda</a>
                <a class="link transition radius" title="Entrar" href="<?= url("/entrar"); ?>">Entrar</a>
                <a class="link transition radius" title="Entrar" target="_blank" href="http://10.23.237.79/agendav1/">Antiga</a>
            </article>

            <article class="main_footer_content_item">
                <h2>Contato:</h2>
                <p class="icon-phone"><b>Telefone:</b><br> +55 11 4934-3131</p>
                <p class="icon-envelope pb-1"><b>Email:</b><a class="link transition radius" title="e-mail suporte"
                    href="mailto:<?=CONF_SITE_EMAIL?>"><?=CONF_SITE_EMAIL?></a> </p>
                <p class="icon-map-marker"><b>Endereço:</b><br>
                    <?=CONF_SITE_ADDR_STREET.", ".CONF_SITE_ADDR_NUMBER." - ".CONF_SITE_ADDR_COMPLEMENT." - ".CONF_SITE_ADDR_NEIGHBORHOOD." - ".CONF_SITE_ADDR_CITY?></p>
            </article>

            <article class="main_footer_content_item social">
                <h2>Social:</h2>
                <a target="_blank" class="icon-facebook"
                   href="https://www.facebook.com/<?= CONF_SOCIAL_FACEBOOK_PAGE; ?>" title="CafeControl no Facebook">/SMSUB</a>
                <a target="_blank" class="icon-instagram"
                   href="https://www.instagram.com/<?= CONF_SOCIAL_INSTAGRAM_PAGE; ?>" title="CafeControl no Instagram">@smsub</a>
                <a target="_blank" class="icon-youtube" href="https://www.youtube.com/<?= CONF_SOCIAL_YOUTUBE_PAGE; ?>"
                   title="SMSUB no YouTube">/SMSUB</a>
            </article>
        </section>

        <p class="termos text-center p-3">
            &copy; 2023, SMSUB todos os direitos reservados
        </p>
    </div>
</footer>

<script src="<?= theme("/assets/scripts.js"); ?>"></script>

<?= $this->section("scripts"); ?>

</body>
</html>