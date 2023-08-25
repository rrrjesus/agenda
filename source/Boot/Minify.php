<?php
if (strpos(url(), "localhost")) {
    /**
     * CSS
     */
    $minCSS = new MatthiasMullie\Minify\CSS();
    // CSS Padrão Site
    $minCSS->add(__DIR__ . "/../../shared/styles/styles.css");
    $minCSS->add(__DIR__ . "/../../shared/styles/boot.css");
    $minCSS->add(__DIR__ . "/../../shared/styles/bootstrap.min.css");
    // CSS Datatables Bootstrap 5
    $minCSS->add(__DIR__ . "/../../shared/styles/dataTables.bootstrap5.min.css");
    // CSS Buttons Datatables Bootstrap 5
    $minCSS->add(__DIR__ . "/../../shared/styles/buttons.bootstrap5.min.css");
    // CSS Responsive Datatables Bootstrap 5
    $minCSS->add(__DIR__ . "/../../shared/styles/responsive.bootstrap5.min.css");
    // CSS Fontawesome
    $minCSS->add(__DIR__ . "/../../shared/fontawesome/css/fontawesome.min.css");

    //CSS Theme
    $cssDir = scandir(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/assets/css");
    foreach ($cssDir as $css) {
        $cssFile = __DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/assets/css/{$css}";
        if (is_file($cssFile) && pathinfo($cssFile)['extension'] == "css") {
            $minCSS->add($cssFile);
        }
    }

    //Minify CSS Generation
    $minCSS->minify(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/assets/style.css");

    /**
     * JS
     */
    $minJS = new MatthiasMullie\Minify\JS();
    // JS Padrão Sistema
    $minJS->add(__DIR__ . "/../../shared/scripts/jquery.min.js");
    $minJS->add(__DIR__ . "/../../shared/scripts/jquery.form.js");
    $minJS->add(__DIR__ . "/../../shared/scripts/jquery-ui.js");
    // JS Bootstrap 5
    $minJS->add(__DIR__ . "/../../shared/scripts/bootstrap.bundle.min.js");
    // JS Datatables Bootstrap 5
    $minJS->add(__DIR__ . "/../../shared/scripts/jquery.dataTables.min.js");
    $minJS->add(__DIR__ . "/../../shared/scripts/dataTables.bootstrap5.min.js");
    // JS Responsive Datatables Bootstrap 5
    $minJS->add(__DIR__ . "/../../shared/scripts/dataTables.responsive.min.js");
    $minJS->add(__DIR__ . "/../../shared/scripts/responsive.bootstrap5.min.js");
    // JS Buttons Datatables Bootstrap 5
    $minJS->add(__DIR__ . "/../../shared/scripts/dataTables.buttons.min.js");
    $minJS->add(__DIR__ . "/../../shared/scripts/buttons.bootstrap5.js");
    $minJS->add(__DIR__ . "/../../shared/scripts/buttons.print.min.js");
    $minJS->add(__DIR__ . "/../../shared/scripts/buttons.colVis.js");
    $minJS->add(__DIR__ . "/../../shared/scripts/buttons.html5.min.js");
    $minJS->add(__DIR__ . "/../../shared/scripts/jszip.min.js");
    $minJS->add(__DIR__ . "/../../shared/scripts/pdfmake.min.js");
    $minJS->add(__DIR__ . "/../../shared/scripts/vfs_fonts.js");

    //theme CSS
    $jsDir = scandir(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/assets/js");
    foreach ($jsDir as $js) {
        $jsFile = __DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/assets/js/{$js}";
        if (is_file($jsFile) && pathinfo($jsFile)['extension'] == "js") {
            $minJS->add($jsFile);
        }
    }

    //Minify JS
    $minJS->minify(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/assets/scripts.js");
}