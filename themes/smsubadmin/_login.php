<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <?= $head; ?>

    <link rel="stylesheet" href="<?= theme("/assets/style.css", CONF_VIEW_ADMIN); ?>"/>
    <link rel="icon" type="image/png" href="<?= theme("/assets/images/favicon.png", CONF_VIEW_ADMIN); ?>"/>
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
<script src="<?= theme("/assets/scripts.js", CONF_VIEW_ADMIN); ?>"></script>
<?= $this->section("scripts"); ?>

</body>
</html>
