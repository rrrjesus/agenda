//Minify CSS Generation
$minCssApp->minify(__DIR__ . "/../../themes/" . CONF_VIEW_THEME_APP_APP . "/assets/style.css");

/**
* JS
*/
$minJsApp = new MatthiasMullie\Minify\JS();
// JS Padrão Sistema
$minJsApp->add(__DIR__ . "/../../shared/scripts/jquery.min.js");
$minJsApp->add(__DIR__ . "/../../shared/scripts/jquery.form.js");
$minJsApp->add(__DIR__ . "/../../shared/scripts/jquery-ui.js");
// JS Bootstrap 5
$minJsApp->add(__DIR__ . "/../../shared/scripts/bootstrap.bundle.min.js");
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
$minJsApp->add(__DIR__ . "/../../shared/scripts/pdfmake.min.js");
$minJsApp->add(__DIR__ . "/../../shared/scripts/vfs_fonts.js");

//theme CSS
$jsDir = scandir(__DIR__ . "/../../themes/" . CONF_VIEW_THEME_APP . "/assets/js");
foreach ($jsDir as $js) {
$jsFile = __DIR__ . "/../../themes/" . CONF_VIEW_THEME_APP . "/assets/js/{$js}";
if (is_file($jsFile) && pathinfo($jsFile)['extension'] == "js") {
$minJsApp->add($jsFile);
}
}

//Minify JS
$minJsApp->minify(__DIR__ . "/../../themes/" . CONF_VIEW_THEME_APP . "/assets/scripts.js");
}