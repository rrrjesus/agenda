<?php $user = (new \Source\Models\Auth())->user(); ?>

<!-- SMSUB AGENDA -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <?= $head;?> <!-- HEAD -->
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
                <a class="navbar-brand text-light fs-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Agenda SMSUB" href="<?= url(); ?>"><i class="transition text-light bi bi-book"></i> <strong>SMSUB</strong> AGENDA</a>
            </div>
        </div>

        <nav class="main_header_nav">
            <i class="main_header_nav_mobile j_menu_mobile_open icon-menu radius transition bi bi-justify"></i>
            <div class="main_header_nav_links j_menu_mobile_tab">
                <i class="main_header_nav_mobile_close j_menu_mobile_close bi bi-x-lg icon-notext transition"></i>
                <a class="link transition radius" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Home" href="<?= url(); ?>"><i class="bi bi-house-door"></i> Home</a>
                <a class="link transition radius display-6" title="Contatos" href="<?= url("/contatos"); ?>"><i class="bi bi-telephone-x"></i> Contatos</a>
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

        <div class="row justify-content-center text-center mt-5 mb-5">
            <div class="col-md-4">
                <i class="bi bi-book-half"></i>
                <p class="fw-bolder fs-3">Comece a utilizar a agenda inteligente agora mesmo</p>
                <p class="fs-5">É rápida, simples e funcional!</p>
            </div>
        </div>
<?php endif; ?>

<footer class="bd-footer py-4 py-md-5 mt-5 bg-body-tertiary">
    <div class="container py-4 py-md-5 px-4 px-md-3 text-body-secondary">
        <div class="row">
            <div class="col-lg-3 mb-3">
                <a class="d-inline-flex align-items-center mb-2 link-dark text-decoration-none" href="/" aria-label="Bootstrap">
                    <i class="icon bi bi-book py-1 me-3"></i>
                    <span class="fw-bold fs-6">SMSUB AGENDA</span>
                </a>
                <ul class="list-unstyled small">
                    <li class="mb-2">Desenvolvido com todo amor por Rodolfo R. R. de Jesus <i class="bi bi-github"></i><a href="https://github.com/rrrjesus/"> rrrjesus</a> e equipe SMSUB-COTI.</li>
                    <li class="mb-2">Código licenciado <a href="https://github.com/rrrjesus/agenda/blob/main/LICENSE" target="_blank" rel="license noopener">MIT</a></li>
                    <li class="mb-2">Versão Atual v2.0.2.</li>
                    <li class="mb-2">Código Fonte <a href="https://github.com/rrrjesus/agenda" target="_blank" rel="noopener"><i class="bi bi-github"></i> rrrjesus/agenda</a>.</li>
                </ul>
            </div>

            <div class="col-6 col-lg-2 mb-3">
                <h5>Mais</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a class="link transition radius" data-bs-toggle="tooltip" data-bs-placement="left" title="Home" href="<?= url(); ?>">Home</a></li>
                    <li class="mb-2"><a class="link transition radius" data-bs-toggle="tooltip" data-bs-placement="left" title="Contatos" href="<?= url("/contatos"); ?>">Contatos</a></li>
                    <?php if(!empty($user->id)):?>
                        <li class="mb-2"><a class="link transition radius" data-bs-toggle="tooltip" data-bs-placement="left" title="Painel" href="<?= url("/dashboard"); ?>">Painel</a></li>
                    <?php else: ?>
                        <li class="mb-2"><a class="link transition radius" data-bs-toggle="tooltip" data-bs-placement="left" title="Entrar" href="<?= url("/entrar"); ?>">Entrar</a></li>
                    <?php endif;?>
                </ul>
            </div>

            <div class="col-12 col-lg-4 mb-3">
                <h5>Contato:</h5>
                <ul class="list-unstyled small">
                    <li class="mb-2"><p><b>Telefone:</b><br> +55 11 4934-3131</p></li>
                    <li class="mb-2"><p><b>E-mail:</b>
                        <?=CONF_SITE_EMAIL?></p></li>
                    <li class="mb-2"><p><b>Endereço:</b><br> Rua São Bento, 405 / Rua Líbero Badaró, 504 - Edifício Martinelli - 10º, 23º e 24º andar - Centro - São Paulo</p></li>
                </ul>
            </div>

            <div class="col-6 col-lg-2 mb-3">
                <h5>Social:</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a target="_blank" class="transition"
                        href="https://www.facebook.com/<?= CONF_SOCIAL_FACEBOOK_PAGE; ?>" data-bs-toggle="tooltip" data-bs-placement="left" title="<?=CONF_SITE_NAME?> no Facebook"><i class="icon-redes bi bi-facebook"></i> /SMSUB</a></li>
                    <li class="mb-2"><a target="_blank" class="icon-instagram"
                        href="https://www.instagram.com/<?= CONF_SOCIAL_INSTAGRAM_PAGE; ?>" data-bs-toggle="tooltip" data-bs-placement="left" title="<?=CONF_SITE_NAME?> no Instagram"><i class="icon-redes bi bi-instagram"></i> @smsub</a></li>
                    <li class="mb-2"><a target="_blank" class="icon-youtube" href="https://www.youtube.com/<?= CONF_SOCIAL_YOUTUBE_PAGE; ?>"
                        data-bs-toggle="tooltip" data-bs-placement="left" title="<?=CONF_SITE_NAME?> no YouTube"><i class="icon-redes bi bi-youtube"></i> /SMSUB</a></li>
                </ul>
            </div>

            <p data-bs-toggle="tooltip" data-bs-placement="left" title="Termos da <?=CONF_SITE_DESC?>" class="termos text-center p-3"> &copy; 2023, SMSUB todos os direitos reservados</p>
        </div>
    </div>
</footer>

<script src="<?= theme("/assets/scripts.js"); ?>"></script>

<?= $this->section("scripts"); ?>

</body>
</html>

<!-- Desenvolvido por Rodolfo R. R. de Jesus - rrrjesus@smsub.prefeitura.sp.gov.br -->