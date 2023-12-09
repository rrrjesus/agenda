<div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
        <span class="fs-4">Controles</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
            <?php
            $nav = function ($icon, $href, $title) use ($app) {
                $active = ($app == $href ? "active" : null);
                $url = url("/admin/{$href}");
                return "<li class=\"nav-item\"><a class=\"nav-link link-body-emphasis {$active}\" aria-current=\"page\"  href=\"{$url}\"><i class=\"bi bi-{$icon}\"></i> {$title}</a></li>";
            };

            echo $nav("coffee", "control/home", "Control");
            echo $nav("star", "control/subscriptions", "Assinaturas");
            echo $nav("flag", "control/plans", "Planos");
            ?>
    </ul>
</div>