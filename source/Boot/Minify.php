<?php

if ($_SERVER['HTTP_HOST'] == '127.0.0.1') {
    /**
     * CSS APP
     */
    $minCssApp = new MatthiasMullie\Minify\CSS();
    // CSS Padrão Dashboard
    $minCssApp->add(__DIR__ . "/../../shared/styles/styles.css");
    $minCssApp->add(__DIR__ . "/../../shared/styles/boot.css");
    $minCssApp->add(__DIR__ . "/../../shared/styles/bootstrap.min.css");
    $minCssApp->add(__DIR__ . "/../../shared/styles/docs.css");
    // CSS Datatables Bootstrap 5
    $minCssApp->add(__DIR__ . "/../../shared/styles/dataTables.bootstrap5.min.css");
    // CSS Buttons Datatables Bootstrap 5
    $minCssApp->add(__DIR__ . "/../../shared/styles/buttons.bootstrap5.min.css");
    // CSS Responsive Datatables Bootstrap 5
    $minCssApp->add(__DIR__ . "/../../shared/styles/responsive.bootstrap5.min.css");
    // CSS Bootstrap Icons Dashboard
    $minCssApp->add(__DIR__ . "/../../shared/styles/bootstrap-icons.min.css");
    // CSS Typeahead Autocomplete
    $minCssApp->add(__DIR__ . "/../../shared/styles/typeahead.css");

    //CSS Theme Dashboard
    $cssDir = scandir(__DIR__ . "/../../themes/" . CONF_VIEW_THEME_APP . "/assets/css");
    foreach ($cssDir as $css) {
        $cssFile = __DIR__ . "/../../themes/" . CONF_VIEW_THEME_APP . "/assets/css/{$css}";
        if (is_file($cssFile) && pathinfo($cssFile)['extension'] == "css") {
            $minCssApp->add($cssFile);
        }
    }

    //Minify CSS Generation
    $minCssApp->minify(__DIR__ . "/../../themes/" . CONF_VIEW_THEME_APP . "/assets/style.css");

    /**
     * JS
     */
    $minJsApp = new MatthiasMullie\Minify\JS();
    // JS Padrão Sistema Dashboard
    $minJsApp->add(__DIR__ . "/../../shared/scripts/jquery.min.js");
    $minJsApp->add(__DIR__ . "/../../shared/scripts/jquery.form.js");
    $minJsApp->add(__DIR__ . "/../../shared/scripts/jquery-ui.js");
    // JS Bootstrap 5
    $minJsApp->add(__DIR__ . "/../../shared/scripts/bootstrap.bundle.min.js");
    $minJsApp->add(__DIR__ . "/../../shared/scripts/color-modes.js");
    // JS Datatables Bootstrap 5
    $minJsApp->add(__DIR__ . "/../../shared/scripts/jquery.dataTables.min.js");
    $minJsApp->add(__DIR__ . "/../../shared/scripts/dataTables.bootstrap5.min.js");
    // JS Responsive Datatables Bootstrap 5
    $minJsApp->add(__DIR__ . "/../../shared/scripts/dataTables.responsive.min.js");
    $minJsApp->add(__DIR__ . "/../../shared/scripts/responsive.bootstrap5.min.js");
    // JS Buttons Datatables Bootstrap 5
    $minJsApp->add(__DIR__ . "/../../shared/scripts/dataTables.buttons.min.js");
    $minJsApp->add(__DIR__ . "/../../shared/scripts/buttons.bootstrap5.js");
    $minJsApp->add(__DIR__ . "/../../shared/scripts/buttons.print.min.js");
    $minJsApp->add(__DIR__ . "/../../shared/scripts/buttons.colVis.js");
    $minJsApp->add(__DIR__ . "/../../shared/scripts/buttons.html5.min.js");
    $minJsApp->add(__DIR__ . "/../../shared/scripts/jszip.min.js");
//    $minJS->add(__DIR__ . "/../../shared/scripts/pdfmake.min.js");
    $minJsApp->add(__DIR__ . "/../../shared/scripts/vfs_fonts.js");
    // JS Typeahead Autocomplete
    $minJsApp->add(__DIR__ . "/../../shared/scripts/typeahead.bundle.js");
//    $minJsApp->add(__DIR__ . "/../../shared/scripts/jquery-mask.js");

    //theme CSS Dashboard
    $jsDir = scandir(__DIR__ . "/../../themes/" . CONF_VIEW_THEME_APP . "/assets/js");
    foreach ($jsDir as $js) {
        $jsFile = __DIR__ . "/../../themes/" . CONF_VIEW_THEME_APP . "/assets/js/{$js}";
        if (is_file($jsFile) && pathinfo($jsFile)['extension'] == "js") {
            $minJsApp->add($jsFile);
        }
    }

    //Minify JS Dashboard
    $minJsApp->minify(__DIR__ . "/../../themes/" . CONF_VIEW_THEME_APP . "/assets/scripts.js");
}