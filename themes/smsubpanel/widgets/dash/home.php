<?php $this->layout("_panel"); ?>

            <h2 class="mt-4 mb-4 text-<?=CONF_PANEL_COLOR?>"><i class="bi bi-speedometer me-1 bi-1x"></i> Painel</h2>

            <div class="row justify-content-center">
                <div class="col-12 ajax_response">
                    <?=flash();?>
                </div>
            </div>

            <div class="row">

                <!-- UsuáriosTotais da Agenda -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="fw-semibold text-<?=CONF_PANEL_COLOR?> text-uppercase mb-1 fs-5">Usuarios</div>
                                    <div class="h6 mb-1 font-weight-bold text-gray-800">Usuários :  <?=$users->users?></div>
                                    <div class="h6 mb-1 font-weight-bold text-gray-800">Administradores :  <?=$users->admins?></div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">Total Geral:  <?=$users->totais?></div>
                                </div>
                                <div class="col-auto text-gray-300">
                                    <i class="bi bi-person-arms-up bi-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Setores Totais da Agenda -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="fw-semibold text-<?=CONF_PANEL_COLOR?> text-uppercase mb-1 fs-5">Blog</div>
                                    <div class="h6 mb-1 font-weight-bold text-gray-800">Artigos :  <?=$blog->posts?></div>
                                    <div class="h6 mb-1 font-weight-bold text-gray-800">Rascunhos :  <?=$blog->drafts?></div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">Categorias:  <?=$blog->categories?></div>
                                </div>
                                <div class="col-auto text-gray-300">
                                    <i class="bi bi-telephone bi-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ramais Totais da Agenda -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="fw-semibold text-<?=CONF_PANEL_COLOR?> text-uppercase mb-1 fs-5">Ramais</div>
                                    <div class="h6 mb-1 font-weight-bold text-gray-800">Ativados :  <?=$ramais->ativos?></div>
                                    <div class="h6 mb-1 font-weight-bold text-gray-800">Desativados :  <?=$ramais->desativados?></div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">Total Geral:  <?=$ramais->totais?></div>
                                </div>
                                <div class="col-auto text-gray-300">
                                    <i class="bi bi-telephone bi-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Setores Totais da Agenda -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="fw-semibold text-<?=CONF_PANEL_COLOR?> text-uppercase mb-1 fs-5">Setores</div>
                                    <div class="h6 mb-1 font-weight-bold text-gray-800">Ativados :  <?=$setores->ativos?></div>
                                    <div class="h6 mb-1 font-weight-bold text-gray-800">Desativados :  <?=$setores->desativados?></div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">Total Geral:  <?=$setores->totais?></div>
                                </div>
                                <div class="col-auto text-gray-300">
                                    <i class="bi bi-telephone bi-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="fw-semibold text-<?=CONF_PANEL_COLOR?> text-uppercase mb-3 fs-5"><i class="bi bi-bar-chart-line-fill"></i> Online agora :
                        <span class="trafic_count"><?= $onlineCount; ?></span>
                    </div>
                    <div class="trafic_list">
                    <?php if (!$online): ?>
                        <div class="alert alert-info alert-dismissible fade show text-center fw-semibold fs-5x" role="alert">
                            <i class="bi bi-info-circle-fill p-2"></i>
                                Não existem usuários online navegando no site neste momento. Quando tiver, você
                                poderá monitoriar todos por aqui.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php else: ?>
                        <div class="d-flex justify-content-center">
                            <div class="col-12">
                                <?php foreach ($online as $onlineNow): ?>
                                    <table class="table table-bordered border-primary table-hover">
                                        <tbody>
                                            <tr>
                                                <td class="text-center">[<?= date_fmt($onlineNow->created_at, "H\hm"); ?> - <?= date_fmt($onlineNow->updated_at,
                                                        "H\hm"); ?>]
                                                    <?= ($onlineNow->user ? $onlineNow->user()->fullName() : "Usuário Convidado"); ?></td>
                                                <td class="text-center"><?= $onlineNow->pages; ?> páginas vistas</td>
                                                <td class="text-center"><a target="_blank" href="<?= url("/{$onlineNow->url}"); ?>"><b>
                                                    <?= strtolower(CONF_SITE_NAME); ?></b><?= $onlineNow->url; ?></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>
            </div>



    <?php $this->start("scripts"); ?>
    <script>
        $(function () {
            setInterval(function () {
                $.post('<?= url("/painel/dash/home");?>', {refresh: true}, function (response) {
                    // count
                    if (response.count) {
                        $(".trafic_count").text(response.count);
                    } else {
                        $(".trafic_count").text(0);
                    }

                    //list
                    var list = "";
                    if (response.list) {
                        $.each(response.list, function (item, data) {
                            var url = '<?= url();?>' + data.url;
                            var title = '<?= strtolower(CONF_SITE_NAME);?>';
                            list += "<div class='d-flex justify-content-center'>";
                            list += "<div class='col-12'>";
                            list += "<table class='table table-bordered border-primary table-hover' style='width:100%'>";
                            list += "<tbody>";
                            list += "<tr>";
                            list += "<td class='text-center'>[" + data.dates + "] " + data.user + "</td>";
                            list += "<td class='text-center'>" + data.pages + " páginas vistas</td>";
                            list += "<td class='text-center'>";
                            list += "<a target='_blank' href='" + url + "'><b>" + title + "</b>" + data.url + "</a>";
                            list += "</td>";
                            list += "</tr>";
                            list += "</tbody>";
                            list += "</table>";
                            list += "</div>";
                            list += "</div>";
                        });
                    } else {
                        list = "<div class=\"alert alert-info alert-dismissible fade show text-center fw-semibold fs-5x\" role=\"alert\">\n" +
                                "<i class=\"bi bi-info-circle-fill p-2\"></i>\n" +
                                "Não existem usuários online navegando no site neste momento. Quando tiver, você poderá monitoriar todos por aqui.\n" +
                                "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>"
                    }

                    $(".trafic_list").html(list);
                }, "json");
            }, 1000 * 10);
        });
    </script>
<?php $this->end(); ?>

<!--            <div class="row">-->
<!--                <div class="col-xl-6">-->
<!--                    <div class="card mb-4">-->
<!--                        <div class="card-header">-->
<!--                            <i class="fas fa-chart-area me-1"></i>-->
<!--                            Area Chart Example-->
<!--                        </div>-->
<!--                        <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-xl-6">-->
<!--                    <div class="card mb-4">-->
<!--                        <div class="card-header">-->
<!--                            <i class="fas fa-chart-bar me-1"></i>-->
<!--                            Bar Chart Example-->
<!--                        </div>-->
<!--                        <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="row">-->
<!--                <div class="col-xl-6">-->
<!--                    <div class="card mb-4">-->
<!--                        <div class="card-header">-->
<!--                            <i class="fas fa-table me-1"></i>-->
<!--                            DataTable Example-->
<!--                        </div>-->
<!--                        <div class="card-body">-->
<!---->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
