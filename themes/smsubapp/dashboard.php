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
    <link rel="stylesheet" href="<?= theme("/../".CONF_VIEW_THEME_APP."/assets/style.css"); ?>"/>
</head>
<body>

<div class="ajax_load">
    <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
        <p class="ajax_load_box_title">Aguarde, carregando ...</p>
    </div>
</div>

<!--HEADER-->
<header class="main_header gradient gradient-red">
    <div class="container">
        <div class="main_header_logo">
            <div class="main_header_logo">
                <h1><a class="icon icon-leanpub icon-notext transition" title="Painel" href="<?= url("app"); ?>"> <strong>PAINEL</strong> SMSUB</a></h1>
            </div>
        </div>

        <nav class="main_header_nav">
            <span class="main_header_nav_mobile j_menu_mobile_open icon-menu icon-notext radius transition"></span>
            <div class="main_header_nav_links j_menu_mobile_tab">
                <span class="main_header_nav_mobile_close j_menu_mobile_close icon-error icon-notext transition"></span>
                <a class="link transition radius" title="Painel" href="<?= url("dashboard"); ?>"><i class="fas fa-user"></i> Usuarios</a>
                <a class="link transition radius" title="Agenda" href="<?= url("dashboard/listar-contatos"); ?>"><i class="fas fa-comments"></i> Contatos</a>
                <a class="link transition radius" title="Setores" href="<?= url("dashboard/listar-setores"); ?>"><i class="fas fa-address-card"></i> Setores</a>
                <a class="link transition radius btn btn-success link-light icon-user dropdown-toggle" title="Entrar" data-bs-toggle="dropdown" aria-expanded="false"
                   href="<?= url("/entrar"); ?>"><?=$user->functional_record?></a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item icon-phone" title="Site" href="<?= url("/contatos"); ?>"> Agenda</a></li>
                    <li><a class="dropdown-item icon-user" href="#">Perfil</a></li>
                    <li><a class="dropdown-item icon-sign-out" href="<?= url("/dashboard/sair"); ?>">Sair</a></li>
                </ul>
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
                <a class="link transition radius" data-to title="Site" href="<?= url(); ?>">Home</a>
                <a class="link transition radius" title="Home" href="<?= url("/contatos"); ?>">Contatos</a>
                <a class="link transition radius" title="Entrar" href="<?= url("/entrar"); ?>">Entrar</a>
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



<script src="<?= theme("/../".CONF_VIEW_THEME_APP."/assets/scripts.js"); ?>"></script>

<script>
    $(document).ready(function() {
        let sector = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace, queryTokenizer: Bloodhound.tokenizers.whitespace,
            local: <?=(new \Source\Models\Panel())->completeSector("sector_name")?>
        });
        sector.initialize();
        $('.sector').typeahead({hint: true, highlight: true, minLength: 1}, {source: sector});

        let ramal = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace, queryTokenizer: Bloodhound.tokenizers.whitespace,
            local: <?=(new \Source\Models\Panel())->completeRamal("ramal")?>
        });
        sector.initialize();
        $('.ramal').typeahead({hint: true, highlight: true, minLength: 1}, {source: ramal});
    });
</script>

<?= $this->section("scripts"); ?>



</body>
</html>