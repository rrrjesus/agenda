<div class="dash_content_sidebar">
    <h3 class="icon-asterisk">dashboard</h3>
    <p class="dash_content_sidebar_desc">Tenha insights poderosos para escalar seus resultaods...</p>

    <nav>
        <?php
        $nav = function ($icon, $href, $title) use ($app) {
            $active = ($app == $href ? "active" : null);
            $url = url("/admin/{$href}");
            return "<a class=\"radius {$active}\" href=\"{$url}\"><i class=\"bi bi-{$icon}\"></i> {$title}</a>";
        };

        echo $nav("house-gear", "site/home", "Home");
        echo $nav("sliders", "site/carousel", "Carousel");
        ?>
    </nav>
</div>