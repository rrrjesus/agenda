<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <?= $head; ?>

    <link href="<?=theme("assets/css/bootstrap.min.css", CONF_VIEW_THEME_PANEL)?>" rel="stylesheet" />
    <link href="<?=theme("assets/css/styles.css", CONF_VIEW_THEME_PANEL)?>" rel="stylesheet" />
    <link rel="icon" type="image/png" href="<?= theme("/assets/images/favicon.png", CONF_VIEW_THEME_PANEL); ?>"/>
</head>
<body>

<div class="ajax_load">
    <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
        <p class="ajax_load_box_title">Aguarde, carregando...</p>
    </div>
</div>

<?= $this->section("content"); ?>

<!--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-53658515-18"></script>-->
<script src="<?= theme("/assets/scripts.js", CONF_VIEW_THEME_PANEL); ?>"></script>
<?= $this->section("scripts"); ?>

</body>
</html>
