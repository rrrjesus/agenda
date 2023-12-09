<?php

if ($_SERVER['HTTP_HOST'] == '127.0.0.1') {
    /**
     * CSS
     */
    $minAdminCSS = new MatthiasMullie\Minify\CSS();
    $minAdminCSS->add(__DIR__ . "/../../../shared/styles/styles.css");
    $minAdminCSS->add(__DIR__ . "/../../../shared/styles/boot.css");
    $minAdminCSS->add(__DIR__ . "/../../../shared/styles/bootstrap.min.css");
    // CSS Datatables Bootstrap 5
    $minAdminCSS->add(__DIR__ . "/../../../shared/styles/dataTables.bootstrap5.min.css");
    // CSS Buttons Datatables Bootstrap 5
    $minAdminCSS->add(__DIR__ . "/../../../shared/styles/buttons.bootstrap5.min.css");
    // CSS Responsive Datatables Bootstrap 5
    $minAdminCSS->add(__DIR__ . "/../../../shared/styles/responsive.bootstrap5.min.css");
    // CSS Bootstrap Icons Dashboard
    $minAdminCSS->add(__DIR__ . "/../../../shared/styles/bootstrap-icons.min.css");
    // CSS Typeahead Autocomplete
    $minAdminCSS->add(__DIR__ . "/../../../shared/styles/typeahead.css");

    //theme CSS
    $cssDir = scandir(__DIR__ . "/../../../themes/" . CONF_VIEW_ADMIN . "/assets/css");
    foreach ($cssDir as $css) {
        $cssFile = __DIR__ . "/../../../themes/" . CONF_VIEW_ADMIN . "/assets/css/{$css}";
        if (is_file($cssFile) && pathinfo($cssFile)['extension'] == "css") {
            $minAdminCSS->add($cssFile);
        }
    }

    //Minify CSS
    $minAdminCSS->minify(__DIR__ . "/../../../themes/" . CONF_VIEW_ADMIN . "/assets/style.css");

    /**
     * JS
     */
    $minAdminJS = new MatthiasMullie\Minify\JS();
    $minAdminJS->add(__DIR__ . "/../../../shared/scripts/jquery.min.js");
    $minAdminJS->add(__DIR__ . "/../../../shared/scripts/jquery.form.js");
    $minAdminJS->add(__DIR__ . "/../../../shared/scripts/jquery-ui.js");
    $minAdminJS->add(__DIR__ . "/../../../shared/scripts/jquery.mask.js");
    $minAdminJS->add(__DIR__ . "/../../../shared/scripts/highcharts.js");
    $minAdminJS->add(__DIR__ . "/../../../shared/scripts/tracker.js");
    // JS Bootstrap 5
    $minAdminJS->add(__DIR__ . "/../../../shared/scripts/bootstrap.bundle.min.js");
    $minAdminJS->add(__DIR__ . "/../../../shared/scripts/color-modes.js");
    // JS Datatables Bootstrap 5
    $minAdminJS->add(__DIR__ . "/../../../shared/scripts/jquery.dataTables.min.js");
    $minAdminJS->add(__DIR__ . "/../../../shared/scripts/dataTables.bootstrap5.min.js");
    // JS Responsive Datatables Bootstrap 5
    $minAdminJS->add(__DIR__ . "/../../../shared/scripts/dataTables.responsive.min.js");
    $minAdminJS->add(__DIR__ . "/../../../shared/scripts/responsive.bootstrap5.min.js");
    // JS Buttons Datatables Bootstrap 5
    $minAdminJS->add(__DIR__ . "/../../../shared/scripts/dataTables.js");
    $minAdminJS->add(__DIR__ . "/../../../shared/scripts/dataTables.buttons.min.js");
    $minAdminJS->add(__DIR__ . "/../../../shared/scripts/buttons.bootstrap5.js");
    $minAdminJS->add(__DIR__ . "/../../../shared/scripts/buttons.print.min.js");
    $minAdminJS->add(__DIR__ . "/../../../shared/scripts/buttons.colVis.js");
    $minAdminJS->add(__DIR__ . "/../../../shared/scripts/buttons.html5.min.js");
    $minAdminJS->add(__DIR__ . "/../../../shared/scripts/jszip.min.js");
    $minAdminJS->add(__DIR__ . "/../../../shared/scripts/vfs_fonts.js");
    // JS Typeahead Autocomplete
    $minAdminJS->add(__DIR__ . "/../../../shared/scripts/typeahead.bundle.js");
    $minAdminJS->add(__DIR__ . "/../../../shared/scripts/jquery.validate.min.js");
    $minAdminJS->add(__DIR__ . "/../../../shared/scripts/tinymce/tinymce.min.js");

    //theme CSS
    $jsDir = scandir(__DIR__ . "/../../../themes/" . CONF_VIEW_ADMIN . "/assets/js");
    foreach ($jsDir as $js) {
        $jsFile = __DIR__ . "/../../../themes/" . CONF_VIEW_ADMIN . "/assets/js/{$js}";
        if (is_file($jsFile) && pathinfo($jsFile)['extension'] == "js") {
            $minAdminJS->add($jsFile);
        }
    }

    //Minify JS
    $minAdminJS->minify(__DIR__ . "/../../../themes/" . CONF_VIEW_ADMIN . "/assets/scripts.js");
}