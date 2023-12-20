<style>
    .sb-sidenav-menu a:hover {
        background: #0f54af;
        color: #ffffff;
    }
</style>


<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-primary" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading fw-semibold">DASHBOARD</div>
                <a class="nav-link fw-semibold" href="<?=url("/painel/dash/home")?>">
                    <div class="sb-nav-link-icon"><i class="bi bi-speedometer"></i></div>
                    Painel
                </a>
                <div class="sb-sidenav-menu-heading fw-semibold">Aplicações</div>
                <a class="nav-link collapsed fw-semibold" href="<?=url("/painel/agenda/home")?>" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Agenda
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionAgenda">
                        <a class="nav-link  collapsed fw-semibold" href="<?=url("/painel/agenda/lista")?>" data-bs-toggle="collapse" data-bs-target="#agendaCollapseContact" aria-expanded="false" aria-controls="agendaCollapseContact">
                            <i class="bi bi-telephone mb-2 me-2"></i> Contatos
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="agendaCollapseContact" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionAgenda">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?=url("/painel/agenda/contatos")?>"><i class="bi bi-person-add  mb-2 me-2"></i> Cadastrar</a>
                                <a class="nav-link" href="<?=url("/painel/agenda/lista")?>"><i class="bi bi-list  mb-2 me-2"></i> Listar</a>
                                <a class="nav-link" href="<?=url("/painel/agenda/lixeira")?>"><i class="bi bi-trash  mb-2 me-2"></i> Lixeira</a>
                            </nav>
                        </div>
                        <a class="nav-link  collapsed fw-semibold" href="<?=url("/painel/agenda/setores")?>" data-bs-toggle="collapse" data-bs-target="#agendaCollapseSector" aria-expanded="false" aria-controls="agendaCollapseSector">
                            <i class="bi bi-globe-americas mb-2 me-2"></i> Setores
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="agendaCollapseSector" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionAgenda">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?=url("/painel/agenda/setores/novo")?>"><i class="bi bi-person-add  mb-2 me-2"></i> Cadastrar</a>
                                <a class="nav-link" href="<?=url("/painel/agenda/setores")?>"><i class="bi bi-list  mb-2 me-2"></i> Listar</a>
                                <a class="nav-link" href="<?=url("/painel/agenda/setores/lixeira")?>"><i class="bi bi-trash  mb-2 me-2"></i> Lixeira</a>
                            </nav>
                        </div>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Pages
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            Authentication
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="login.html">Login</a>
                                <a class="nav-link" href="register.html">Register</a>
                                <a class="nav-link" href="password.html">Forgot Password</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                            Error
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="401.html">401 Page</a>
                                <a class="nav-link" href="404.html">404 Page</a>
                                <a class="nav-link" href="500.html">500 Page</a>
                            </nav>
                        </div>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="charts.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Charts
                </a>
                <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>