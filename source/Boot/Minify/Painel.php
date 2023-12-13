<?php

//if ($_SERVER['HTTP_HOST'] == '127.0.0.1') {
    /**
     * CSS
     */
    $minPainelCSS = new MatthiasMullie\Minify\CSS();
    $minPainelCSS->add(__DIR__ . "/../../../shared/styles/styles.css");
    $minPainelCSS->add(__DIR__ . "/../../../shared/styles/boot.css");
    $minPainelCSS->add(__DIR__ . "/../../../shared/styles/bootstrap.min.css");
    // CSS Datatables Bootstrap 5
    $minPainelCSS->add(__DIR__ . "/../../../shared/styles/dataTables.bootstrap5.min.css");
    // CSS Buttons Datatables Bootstrap 5
    $minPainelCSS->add(__DIR__ . "/../../../shared/styles/buttons.bootstrap5.min.css");
    // CSS Responsive Datatables Bootstrap 5
    $minPainelCSS->add(__DIR__ . "/../../../shared/styles/responsive.bootstrap5.min.css");
    // CSS Bootstrap Icons Dashboard
    $minPainelCSS->add(__DIR__ . "/../../../shared/styles/bootstrap-icons.min.css");
    // CSS Typeahead Autocomplete
    $minPainelCSS->add(__DIR__ . "/../../../shared/styles/typeahead.css");

    //theme CSS
    $cssDir = scandir(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME_PANEL . "/assets/css");
    foreach ($cssDir as $css) {
        $cssFile = __DIR__ . "/../../../themes/" . CONF_VIEW_THEME_PANEL . "/assets/css/{$css}";
        if (is_file($cssFile) && pathinfo($cssFile)['extension'] == "css") {
            $minPainelCSS->add($cssFile);
        }
    }

    //Minify CSS
    $minPainelCSS->minify(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME_PANEL . "/assets/style.css");

    /**
     * JS
     */
    $minPainelJS = new MatthiasMullie\Minify\JS();
    // JS Bootstrap 5
    $minPainelJS->add(__DIR__ . "/../../../shared/scripts/bootstrap.bundle.min.js");
    $minPainelJS->add(__DIR__ . "/../../../shared/scripts/jquery.min.js");
    $minPainelJS->add(__DIR__ . "/../../../shared/scripts/jquery.form.js");
    $minPainelJS->add(__DIR__ . "/../../../shared/scripts/jquery-ui.js");
    $minPainelJS->add(__DIR__ . "/../../../shared/scripts/jquery.mask.js");
    $minPainelJS->add(__DIR__ . "/../../../shared/scripts/highcharts.js");
    $minPainelJS->add(__DIR__ . "/../../../shared/scripts/tracker.js");

    $minPainelJS->add(__DIR__ . "/../../../shared/scripts/color-modes.js");
    // JS Datatables Bootstrap 5
    $minPainelJS->add(__DIR__ . "/../../../shared/scripts/jquery.dataTables.min.js");
    $minPainelJS->add(__DIR__ . "/../../../shared/scripts/dataTables.bootstrap5.min.js");
    // JS Responsive Datatables Bootstrap 5
    $minPainelJS->add(__DIR__ . "/../../../shared/scripts/dataTables.responsive.min.js");
    $minPainelJS->add(__DIR__ . "/../../../shared/scripts/responsive.bootstrap5.min.js");
    // JS Buttons Datatables Bootstrap 5
    $minPainelJS->add(__DIR__ . "/../../../shared/scripts/dataTables.js");
    $minPainelJS->add(__DIR__ . "/../../../shared/scripts/dataTables.buttons.min.js");
    $minPainelJS->add(__DIR__ . "/../../../shared/scripts/buttons.bootstrap5.js");
    $minPainelJS->add(__DIR__ . "/../../../shared/scripts/buttons.print.min.js");
    $minPainelJS->add(__DIR__ . "/../../../shared/scripts/buttons.colVis.js");
    $minPainelJS->add(__DIR__ . "/../../../shared/scripts/buttons.html5.min.js");
    $minPainelJS->add(__DIR__ . "/../../../shared/scripts/jszip.min.js");
    $minPainelJS->add(__DIR__ . "/../../../shared/scripts/vfs_fonts.js");
    // JS Typeahead Autocomplete
    $minPainelJS->add(__DIR__ . "/../../../shared/scripts/typeahead.bundle.js");
    $minPainelJS->add(__DIR__ . "/../../../shared/scripts/jquery.validate.min.js");
    $minPainelJS->add(__DIR__ . "/../../../shared/scripts/tinymce/tinymce.min.js");

    //theme CSS
    $jsDir = scandir(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME_PANEL . "/assets/js");
    foreach ($jsDir as $js) {
        $jsFile = __DIR__ . "/../../../themes/" . CONF_VIEW_THEME_PANEL . "/assets/js/{$js}";
        if (is_file($jsFile) && pathinfo($jsFile)['extension'] == "js") {
            $minPainelJS->add($jsFile);
        }
    }

    //Minify JS
    $minPainelJS->minify(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME_PANEL . "/assets/scripts.js");
//}