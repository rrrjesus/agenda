<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <?= $head;?> <!-- HEAD -->

    <title>Dashboard - SB Admin</title>
    <link href="<?=theme("assets/style.css", CONF_VIEW_THEME_PANEL)?>" rel="stylesheet" />
</head>
<body class="sb-nav-fixed">

<div class="ajax_load">
    <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
        <p class="ajax_load_box_title">Aguarde, carregando ...</p>
    </div>
</div>

<!-- Navbar -->
<?php $this->insert("navbar"); ?>

<div id="layoutSidenav">

<!--  Sidebar-->
    <?php $this->insert("sidebar"); ?>

    <div id="layoutSidenav_content">

        <main>

            <?= $this->section("content"); ?>

        </main>

        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2023</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>

    </div>
</div>

<script src="<?=theme("assets/scripts.js", CONF_VIEW_THEME_PANEL)?>"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="<?=theme("assets/demo/chart-area-demo.js", CONF_VIEW_THEME_PANEL)?>"></script>
<script src="<?=theme("assets/demo/chart-bar-demo.js", CONF_VIEW_THEME_PANEL)?>"></script>
<?= $this->section("scripts"); ?>
</body>
</html>
