<?php

if ($_SERVER['HTTP_HOST'] == '127.0.0.1') {
    /**
     * CSS
     */
    $minWebCSS = new MatthiasMullie\Minify\CSS();
    // CSS Padrão Site
    $minWebCSS->add(__DIR__ . "/../../../shared/styles/styles.css");
    $minWebCSS->add(__DIR__ . "/../../../shared/styles/boot.css");
    $minWebCSS->add(__DIR__ . "/../../../shared/styles/bootstrap.min.css");
    $minWebCSS->add(__DIR__ . "/../../../shared/styles/docs.css");
    // CSS Datatables Bootstrap 5
    $minWebCSS->add(__DIR__ . "/../../../shared/styles/dataTables.bootstrap5.min.css");
    // CSS Buttons Datatables Bootstrap 5
    $minWebCSS->add(__DIR__ . "/../../../shared/styles/buttons.bootstrap5.min.css");
    // CSS Responsive Datatables Bootstrap 5
    $minWebCSS->add(__DIR__ . "/../../../shared/styles/responsive.bootstrap5.min.css");
    // CSS Bootstrap Icons Dashboard
    $minWebCSS->add(__DIR__ . "/../../../shared/styles/bootstrap-icons.min.css");
    // CSS Typeahead Autocomplete
    $minWebCSS->add(__DIR__ . "/../../../shared/styles/typeahead.css");

    //CSS Theme
    $cssDir = scandir(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/css");
    foreach ($cssDir as $css) {
        $cssFile = __DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/css/{$css}";
        if (is_file($cssFile) && pathinfo($cssFile)['extension'] == "css") {
            $minWebCSS->add($cssFile);
        }
    }

    //Minify CSS Generation
    $minWebCSS->minify(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/style.css");
    /**
     * JS
     */
    $minWebJS = new MatthiasMullie\Minify\JS();
    // JS Padrão Sistema
    $minWebJS->add(__DIR__ . "/../../../shared/scripts/jquery.min.js");
    $minWebJS->add(__DIR__ . "/../../../shared/scripts/jquery.form.js");
    $minWebJS->add(__DIR__ . "/../../../shared/scripts/jquery-ui.js");
    // JS Bootstrap 5
    $minWebJS->add(__DIR__ . "/../../../shared/scripts/bootstrap.bundle.min.js");
    $minWebJS->add(__DIR__ . "/../../../shared/scripts/color-modes.js");
    // JS Datatables Bootstrap 5
    $minWebJS->add(__DIR__ . "/../../../shared/scripts/jquery.dataTables.min.js");
    $minWebJS->add(__DIR__ . "/../../../shared/scripts/dataTables.bootstrap5.min.js");
    // JS Responsive Datatables Bootstrap 5
    $minWebJS->add(__DIR__ . "/../../../shared/scripts/dataTables.responsive.min.js");
    $minWebJS->add(__DIR__ . "/../../../shared/scripts/responsive.bootstrap5.min.js");
    // JS Buttons Datatables Bootstrap 5
    $minWebJS->add(__DIR__ . "/../../../shared/scripts/dataTables.buttons.min.js");
    $minWebJS->add(__DIR__ . "/../../../shared/scripts/buttons.bootstrap5.js");
    $minWebJS->add(__DIR__ . "/../../../shared/scripts/buttons.print.min.js");
    $minWebJS->add(__DIR__ . "/../../../shared/scripts/buttons.colVis.js");
    $minWebJS->add(__DIR__ . "/../../../shared/scripts/buttons.html5.min.js");
    $minWebJS->add(__DIR__ . "/../../../shared/scripts/jszip.min.js");
//    $minWebJS->add(__DIR__ . "/../../../shared/scripts/pdfmake.min.js");
    $minWebJS->add(__DIR__ . "/../../../shared/scripts/vfs_fonts.js");
    // JS Typeahead Autocomplete
    $minWebJS->add(__DIR__ . "/../../../shared/scripts/typeahead.bundle.js");
    $minWebJS->add(__DIR__ . "/../../../shared/scripts/jquery.validate.min.js");

    //theme CSS
    $jsDir = scandir(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/js");
    foreach ($jsDir as $js) {
        $jsFile = __DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/js/{$js}";
        if (is_file($jsFile) && pathinfo($jsFile)['extension'] == "js") {
            $minWebJS->add($jsFile);
        }
    }

    //Minify JS
    $minWebJS->minify(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/scripts.js");
}