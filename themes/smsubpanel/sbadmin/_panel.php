<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <?= $head; ?>

    <link rel="stylesheet" href="<?= theme("/assets/style.css", CONF_VIEW_THEME_PANEL); ?>"/>
    <link rel="icon" type="image/png" href="<?= theme("/assets/images/favicon.png", CONF_VIEW_THEME_PANEL); ?>"/>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

</head>

<body class="sb-nav-fixed">

    <?php $this->insert("widgets/navbar"); ?>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <?php $this->insert("widgets/sidebar"); ?>
    </div>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">

                <?= $this->section("content"); ?>
            </div>
        </main>

        <!-- footer -->
        <?php $this->insert("widgets/footer"); ?>

    </div>
</div>

<script src="<?= theme("/assets/scripts.js", CONF_VIEW_THEME_APP); ?>"></script>
<script src="<?=theme("/assets/js/scripts.js", CONF_VIEW_THEME_PANEL)?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="<?=theme("/assets/demo/chart-area-demo.js", CONF_VIEW_THEME_PANEL)?>"></script>
<script src="<?=theme("/assets/demo/chart-bar-demo.js", CONF_VIEW_THEME_PANEL)?>"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>-->
<script src="<?=theme("/assets/js/datatables-simple-demo.js", CONF_VIEW_THEME_PANEL)?>"></script>
<?= $this->section("scripts"); ?>

</body>
</html>