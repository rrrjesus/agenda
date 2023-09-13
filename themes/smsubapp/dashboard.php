<?php
$user = (new \Source\Models\Auth())->user();
?>

<!-- SMSUB AGENDA -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <?= $head;?> <!-- HEAD -->
    <link rel="icon" type="image/png" href="<?= theme("/../".CONF_VIEW_THEME_APP."/assets/images/favicon.png"); ?>"/>
    <link rel="stylesheet" href="<?= theme("/../".CONF_VIEW_THEME_APP."/assets/style.css"); ?>"/>

    <style>
        .bi {
            display: inline-block;
            width: 1rem;
            height: 1rem;
        }

        /*
         * Sidebar
         */

        @media (min-width: 768px) {
            .sidebar .offcanvas-lg {
                position: -webkit-sticky;
                position: sticky;
                top: 48px;
            }
            .navbar-search {
                display: block;
            }
        }

        .sidebar .nav-link {
            font-size: .875rem;
            font-weight: 500;
        }

        .sidebar .nav-link.active {
            color: #2470dc;
        }

        .sidebar-heading {
            font-size: .75rem;
        }

        /*
         * Navbar
         */

        .navbar-brand {
            padding-top: .75rem;
            padding-bottom: .75rem;
            background-color: rgba(0, 0, 0, .25);
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
        }

        .navbar .form-control {
            padding: .75rem 1rem;
        }
    </style>
</head>
<body>

<div class="ajax_load">
    <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
        <p class="ajax_load_box_title">Aguarde, carregando ...</p>
    </div>
</div>

<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
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

<header class="navbar navbar-expand-lg bd-navbar sticky-top">
    <a class="navbar-brand p-0 me-0 me-lg-2 ms-4 ms-lg-4 fw-bold fs-4" href="/" aria-label="Agenda">
        <img width="130" height="40" src="<?=theme("/../".CONF_VIEW_THEME_APP."/assets/images/smsub_logo/SUBPREFEITURAS_HORIZONTAL_FUNDO_ESCURO.png")?>">
    </a>

    <ul class="navbar-nav flex-row d-md-none">
        <li class="nav-item text-nowrap">
            <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle search">
                <i class="bi bi-search"></i>
            </button>
        </li>
        <li class="nav-item text-nowrap">
            <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button>
        </li>
    </ul>

    <ul class="navbar-nav flex-row flex-wrap ms-md-auto">

        <li class="nav-item dropdown">
            <?php if(!empty($user)):?>
                <button type="button" class="btn btn-link nav-link py-2 px-0 px-lg-2 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static">
                    <span class="d-lg-none" aria-hidden="true">Usuário: </span><i class="bi bi-person-check"></i> <?=$user->functional_record;?>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><h6 class="dropdown-header">Dashboard</h6></li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center justify-content-between" aria-current="true" href="<?=url("/dashboard")?>">
                            Contatos
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center justify-content-between" aria-current="true" href="<?=url("/dashboard/listar-setores")?>">
                            Setores
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center justify-content-between active" aria-current="true" href="<?=url("/dashboard/listar-usuarios")?>">
                            Usuários
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center justify-content-between" aria-current="true" href="<?=url("/dashboard/sair")?>">
                            Sair
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li><h6 class="dropdown-header">Agenda</h6></li>
                    <li><a class="dropdown-item" href="<?=url("/contatos")?>">Contatos</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><h6 class="dropdown-header">Usuário</h6></li>
                    <li><a class="dropdown-item" href="<?=url("/dashboard/perfil")?>">Perfil</a></li>
                </ul>

            <?php else:?>
        <li class="nav-item col-6 col-lg-auto">
            <a class="nav-link py-2 px-0 px-lg-2" href="<?=url("/entrar")?>">
                <i class="bi bi-person-lock"></i> Entrar
            </a>
        </li>
        <?php endif;?>

        <li class="nav-item py-2 py-lg-1 col-12 col-lg-auto">
            <div class="vr d-none d-lg-flex h-100 mx-lg-2 text-white"></div>
            <hr class="d-lg-none my-2">
        </li>
      </ul>
</header>

<div class="container-fluid">
    <div class="row">
        <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
            <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="#">
                                <i class="bi bi-house-fill"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="#">
                                <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                                Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="#">
                                <svg class="bi"><use xlink:href="#cart"/></svg>
                                Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="#">
                                <svg class="bi"><use xlink:href="#people"/></svg>
                                Customers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="#">
                                <svg class="bi"><use xlink:href="#graph-up"/></svg>
                                Reports
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="#">
                                <svg class="bi"><use xlink:href="#puzzle"/></svg>
                                Integrations
                            </a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                        <span>Saved reports</span>
                        <a class="link-secondary" href="#" aria-label="Add a new report">
                            <svg class="bi"><use xlink:href="#plus-circle"/></svg>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-auto">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="#">
                                <svg class="bi"><use xlink:href="#file-earmark-text"/></svg>
                                Current month
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="#">
                                <svg class="bi"><use xlink:href="#file-earmark-text"/></svg>
                                Last quarter
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="#">
                                <svg class="bi"><use xlink:href="#file-earmark-text"/></svg>
                                Social engagement
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="#">
                                <svg class="bi"><use xlink:href="#file-earmark-text"/></svg>
                                Year-end sale
                            </a>
                        </li>
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

        <!--CONTENT-->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <?= $this->section("content"); ?>
        </main>

    <?php if ($this->section("optout")): ?>
        <?= $this->section("optout"); ?>
    <?php else: ?>

        <div class="row justify-content-center text-center mt-5 mb-5">
            <div class="col-md-4">
                <i class="bi bi-book-half display-1"></i>
                <p class="fw-bolder fs-3">Comece a utilizar a agenda inteligente agora mesmo</p>
                <p class="fs-5">É rápida, simples e funcional!</p>
            </div>
        </div>
    <?php endif; ?>

    <footer class="bd-footer py-4 py-md-5 mt-5 bg-body-tertiary text-center">
        <div class="container-xl py-4 py-md-5 px-4 px-md-3 text-body-secondary">
            <div class="row">
                <div class="col-lg-3 mb-3">
                    <a class="d-inline-flex align-items-center mb-2 text-body-emphasis text-decoration-none" href="<?=url("/contatos")?>" aria-label=Contatos">
                        <i class="bi bi-book fs-1 mb-3 me-2 text-danger fw-bold"></i>
                        <span class="text-danger fw-bold fs-6">SMSUB AGENDA</span>
                    </a>
                    <ul class="list-unstyled small">
                        <li class="mb-2">Desenvolvido com todo amor pela equipe de <strong>SMSUB - COTI - Coordenação de Tecnologia da dangerrmação</strong>.</li>
                        <li class="mb-2">Código licenciado <a class="text-danger fw-bold" href="https://github.com/rrrjesus/agenda/blob/main/LICENSE" target="_blank" rel="license noopener">MIT</a></li>
                        <li class="mb-2">Versão Atual v2.0.2.</li>
                        <li class="mb-2">Código Fonte <a class="text-danger fw-bold" href="https://github.com/rrrjesus/agenda" target="_blank" rel="noopener"><i class="bi bi-github"></i> @rrrjesus/agenda</a>.</li>
                    </ul>
                </div>

                <div class="col-lg-2 mb-3">
                    <h5>Mais</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a class="text-decoration-none text-danger fw-bold" data-bs-toggle="tooltip" data-bs-placement="left" title="Home" href="<?= url(); ?>">Home</a></li>
                        <li class="mb-2"><a class="text-decoration-none text-danger fw-bold" data-bs-toggle="tooltip" data-bs-placement="left" title="Contatos" href="<?= url("/contatos"); ?>">Contatos</a></li>
                        <?php if(!empty($user->id)):?>
                            <li class="mb-2"><a class="text-decoration-none text-danger fw-bold" data-bs-toggle="tooltip" data-bs-placement="left" title="Painel" href="<?= url("/dashboard"); ?>">Painel</a></li>
                        <?php else: ?>
                            <li class="mb-2"><a class="text-decoration-none text-danger fw-bold" data-bs-toggle="tooltip" data-bs-placement="left" title="Entrar" href="<?= url("/entrar"); ?>">Entrar</a></li>
                        <?php endif;?>
                    </ul>
                </div>

                <div class="col-12 col-lg-4 mb-3">
                    <h5>Contato:</h5>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><p><b>Telefone:</b><br> +55 11 4934-3131</p></li>
                        <li class="mb-2"><p><b>E-mail:</b><br>
                                <a class="text-decoration-none text-danger fw-bold" href="mailto:<?=CONF_SITE_EMAIL?>" data-bs-toggle="tooltip" data-bs-placement="left" title="Entrar"><?=CONF_SITE_EMAIL?></a></p></li>
                        <li class="mb-2"><p><b>Endereço:</b><br><a class="text-decoration-none text-danger fw-bold" target="_blank" href="https://www.google.com/maps/place/Condom%C3%ADnio+do+Edif%C3%ADcio+Martinelli/@-23.5455906,-46.6350075,15z/data=!4m6!3m5!1s0x94ce5854575bec47:0xcff6dbd0a9dd6bac!8m2!3d-23.5455906!4d-46.6350075!16s%2Fm%2F047d5rn?entry=ttu">
                                    <i class="bi bi-pin-map-fill"></i> </a> Rua São Bento, 405 / Rua Líbero Badaró, 504 - Edifício Martinelli - 10º, 23º e 24º andar - Centro - São Paulo</p></li>
                    </ul>
                </div>

                <div class="col-lg-2">
                    <h5>Social:</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a target="_blank" class="text-decoration-none text-danger fw-bold"
                                            href="https://www.facebook.com/<?= CONF_SOCIAL_FACEBOOK_PAGE; ?>" data-bs-toggle="tooltip" data-bs-placement="left" title="<?=CONF_SITE_NAME?> no Facebook"><i class="bi bi-facebook"></i> /SMSUB</a></li>
                        <li class="mb-2"><a target="_blank" class="text-decoration-none text-danger fw-bold"
                                            href="https://www.instagram.com/<?= CONF_SOCIAL_INSTAGRAM_PAGE; ?>" data-bs-toggle="tooltip" data-bs-placement="left" title="<?=CONF_SITE_NAME?> no Instagram"><i class="bi bi-instagram"></i> @SMSUB</a></li>
                        <li class="mb-2"><a target="_blank" class="text-decoration-none text-danger fw-bold" href="https://www.youtube.com/<?= CONF_SOCIAL_YOUTUBE_PAGE; ?>"
                                            data-bs-toggle="tooltip" data-bs-placement="left" title="<?=CONF_SITE_NAME?> no YouTube"><i class="bi bi-youtube"></i> /SMSUB</a></li>
                    </ul>
                </div>

                <p data-bs-toggle="tooltip" data-bs-placement="left" title="Termos da <?=CONF_SITE_DESC?>" class="termos text-center p-3"> &copy; 2023, SMSUB todos os direitos reservados</p>
            </div>
        </div>
    </footer>
</div>

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

<!-- Desenvolvido por Rodolfo R. R. de Jesus - rrrjesus@smsub.prefeitura.sp.gov.br -->