<?php

if ($_SERVER['HTTP_HOST'] == '127.0.0.1') {
/**
 * CSS APP
 */
$minPainelCss = new MatthiasMullie\Minify\CSS();
// CSS Padrão Dashboard
$minPainelCss->add(__DIR__ . "/../../../shared/styles/styles.css");
$minPainelCss->add(__DIR__ . "/../../../shared/styles/boot.css");
$minPainelCss->add(__DIR__ . "/../../../shared/styles/bootstrap.min.css");
$minPainelCss->add(__DIR__ . "/../../../shared/styles/docs.css");
// CSS Datatables Bootstrap 5
$minPainelCss->add(__DIR__ . "/../../../shared/styles/dataTables.bootstrap5.min.css");
// CSS Buttons Datatables Bootstrap 5
$minPainelCss->add(__DIR__ . "/../../../shared/styles/buttons.bootstrap5.min.css");
// CSS Responsive Datatables Bootstrap 5
$minPainelCss->add(__DIR__ . "/../../../shared/styles/responsive.bootstrap5.min.css");
// CSS Bootstrap Icons Dashboard
$minPainelCss->add(__DIR__ . "/../../../shared/styles/bootstrap-icons.min.css");
// CSS Typeahead Autocomplete
$minPainelCss->add(__DIR__ . "/../../../shared/styles/typeahead.css");

//CSS Theme Dashboard
$cssDir = scandir(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME_PANEL . "/assets/css");
foreach ($cssDir as $css) {
    $cssFile = __DIR__ . "/../../../themes/" . CONF_VIEW_THEME_PANEL . "/assets/css/{$css}";
    if (is_file($cssFile) && pathinfo($cssFile)['extension'] == "css") {
        $minPainelCss->add($cssFile);
    }
}

//Minify CSS Generation
$minPainelCss->minify(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME_PANEL . "/assets/style.css");

/**
 * JS
 */
$minPainelJs = new MatthiasMullie\Minify\JS();

// JS Bootstrap 5
$minPainelJs->add(__DIR__ . "/../../../shared/scripts/bootstrap.bundle.min.js");
// JS Padrão Sistema Dashboard
$minPainelJs->add(__DIR__ . "/../../../shared/scripts/jquery.min.js");
$minPainelJs->add(__DIR__ . "/../../../shared/scripts/jquery.form.js");
$minPainelJs->add(__DIR__ . "/../../../shared/scripts/jquery-ui.js");
// JS Theme Color (Light / Dark / Auto)
$minPainelJs->add(__DIR__ . "/../../../shared/scripts/color-modes.js");
// JS Datatables Bootstrap 5
$minPainelJs->add(__DIR__ . "/../../../shared/scripts/jquery.dataTables.min.js");
$minPainelJs->add(__DIR__ . "/../../../shared/scripts/dataTables.bootstrap5.min.js");
// JS Responsive Datatables Bootstrap 5
$minPainelJs->add(__DIR__ . "/../../../shared/scripts/dataTables.responsive.min.js");
$minPainelJs->add(__DIR__ . "/../../../shared/scripts/responsive.bootstrap5.min.js");
// JS Buttons Datatables Bootstrap 5
$minPainelJs->add(__DIR__ . "/../../../shared/scripts/dataTables.buttons.min.js");
$minPainelJs->add(__DIR__ . "/../../../shared/scripts/buttons.bootstrap5.js");
$minPainelJs->add(__DIR__ . "/../../../shared/scripts/buttons.print.min.js");
$minPainelJs->add(__DIR__ . "/../../../shared/scripts/buttons.colVis.js");
$minPainelJs->add(__DIR__ . "/../../../shared/scripts/buttons.html5.min.js");
$minPainelJs->add(__DIR__ . "/../../../shared/scripts/jszip.min.js");
$minPainelJs->add(__DIR__ . "/../../../shared/scripts/vfs_fonts.js");
// JS Typeahead Autocomplete
//$minPainelJs->add(__DIR__ . "/../../../shared/scripts/typeahead.bundle.js");
//    $minPainelJs->add(__DIR__ . "/../../../shared/scripts/jquery-mask.js");

//theme CSS Dashboard
$jsDir = scandir(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME_PANEL . "/assets/js");
foreach ($jsDir as $js) {
    $jsFile = __DIR__ . "/../../../themes/" . CONF_VIEW_THEME_PANEL . "/assets/js/{$js}";
    if (is_file($jsFile) && pathinfo($jsFile)['extension'] == "js") {
        $minPainelJs->add($jsFile);
    }
}

//Minify JS Dashboard
$minPainelJs->minify(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME_PANEL . "/assets/scripts.js");
}