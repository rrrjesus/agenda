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
                <div class="sb-sidenav-menu-heading fw-semibold fs-6">DASHBOARD</div>
                <a class="nav-link fw-semibold fs-6" href="<?=url("/painel/dash/home")?>">
                    <div class="sb-nav-link-icon"><i class="bi bi-speedometer bi-2xx"></i></div>
                    Painel
                </a>
                <div class="sb-sidenav-menu-heading fw-semibold fs-6">Aplicações</div>
                <a class="nav-link collapsed fw-semibold fs-6" href="<?=url("/painel/agenda/home")?>" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="bi bi-book-half bi-2xx"></i></div>
                    Agenda
                    <div class="sb-sidenav-collapse-arrow"><i class="bi bi-chevron-double-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionAgenda">
                        <a class="nav-link  collapsed fw-semibold fs-6" href="<?=url("/painel/agenda/ramais/lista")?>" data-bs-toggle="collapse" data-bs-target="#agendaCollapseContact" aria-expanded="false" aria-controls="agendaCollapseContact">
                            <i class="bi bi-telephone bi-2xx me-2"></i> Ramais
                            <div class="sb-sidenav-collapse-arrow"><i class="bi bi-chevron-down"></i></div>
                        </a>
                        <div class="collapse" id="agendaCollapseContact" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionAgenda">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link fw-semibold fs-6" href="<?=url("/painel/agenda/ramais/ramal")?>"><i class="bi bi-person-add bi-2xx me-2"></i> Cadastrar</a>
                                <a class="nav-link fw-semibold fs-6" href="<?=url("/painel/agenda/ramais/ativados")?>"><i class="bi bi-telephone bi-2xx me-2"></i> Ativos</a>
                                <a class="nav-link fw-semibold fs-6" href="<?=url("/painel/agenda/ramais/desativados")?>"><i class="bi bi-trash bi-2xx me-2"></i> Desativados</a>
                            </nav>
                        </div>
                        <a class="nav-link  collapsed fw-semibold fs-6" href="<?=url("/painel/agenda/setores")?>" data-bs-toggle="collapse" data-bs-target="#agendaCollapseSector" aria-expanded="false" aria-controls="agendaCollapseSector">
                            <i class="bi bi-globe-americas bi-2xx me-2"></i> Setores
                            <div class="sb-sidenav-collapse-arrow"><i class="bi bi-chevron-down"></i></div>
                        </a>
                        <div class="collapse" id="agendaCollapseSector" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionAgenda">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link fw-semibold fs-6" href="<?=url("/painel/agenda/setores/setor")?>"><i class="bi bi-person-add bi-2xx me-2"></i> Cadastrar</a>
                                <a class="nav-link fw-semibold fs-6" href="<?=url("/painel/agenda/setores/ativados")?>"><i class="bi bi-globe-americas bi-2xx me-2"></i> Ativos</a>
                                <a class="nav-link fw-semibold fs-6" href="<?=url("/painel/agenda/setores/desativados")?>"><i class="bi bi-trash bi-2xx me-2"></i> Desativados</a>
                            </nav>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer fw-semibold">
            <div class="small">Logado como:</div>
            <?=(new \Source\Models\Auth())->user()->first_name?>
        </div>
    </nav>
</div>