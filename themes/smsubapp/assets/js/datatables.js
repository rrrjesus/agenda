$(document).ready(function() {
    //var table =
    $('#contactApp').DataTable( {
        // lengthChange: false,
        responsive:
            {details:
                {display: DataTable.Responsive.display.modal({
                        header: function (row) {
                            var data = row.data();
                            return data[0] + ' ' + data[1];
                },
                update: true
            }),
            renderer: DataTable.Responsive.renderer.tableAll({})}},
        "language": {
            "sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros","sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar",
            "oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
            "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}
        },
        // dom: "lBftipr",
        "lengthMenu": [[4, 10, 25, 50, -1], [4, 10, 25, 50, "Todos"]],
        "aaSorting": [0, 'asc'], /* 'desc' Carregar table decrescente e asc crescente*/
        "aoColumnDefs": [
            {
                "aTargets": [0], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '<a data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"\n' +
                        'data-bs-title="Clique para editar" href="editar-contato/' + full[0] + '" role="button" class="btn btn-outline-warning btn-sm rounded-circle text-center"><i class="bi bi-pencil text-secondary"></i></a>';
                }
            },
            {
                "aTargets": [5], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '<button type="button" class="btn btn-outline-danger btn-sm rounded-circle text-secondary" data-bs-toggle="modal" data-bs-target="#trashModal'+ full[0]+'">' +
                                '<i class="bi bi-trash"></i></button>' +
                                '<div class="modal fade" id="trashModal' + full[0] + '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">\n' +
                                    '<div class="modal-dialog modal-sm">\n' +
                                        '<div class="modal-content">\n' +
                                            '<div class="modal-header bg-danger text-light">\n' +
                                                '<h6 class="modal-title text-center" id="exampleModalLabel"><i class="bi bi-book-half me-2"></i> Excluir Ramal '+ full[3] +'</h6>\n' +
                                                '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>\n' +
                                            '</div>\n' +
                                            '<div class="modal-body fw-semibold">Deseja excluir o ramal : ' + full[3] + ' ?</div>\n' +
                                                '<div class="modal-footer">\n' +
                                                    '<button type="button" class="btn btn-outline-danger btn-sm fw-semibold" data-bs-dismiss="modal"><i class="bi bi-trash"></i> Não</button>\n' +
                                                    '<a href="excluir-contato/' + full[0] + '" class="btn btn-outline-success btn-sm fw-semibold"><i class="bi bi-plus-circle" role="button" ></i> Sim</a>\n' +
                                                '</div>\n' +
                                            '</div>\n' +
                                    '</div>\n' +
                                '</div>';
                }
            },
        ]
    });

    //var table =
    $('#contactAppTrash').DataTable( {
        // lengthChange: false,
        responsive:
            {details:
                    {display: DataTable.Responsive.display.modal({
                            header: function (row) {
                                var data = row.data();
                                return data[0] + ' ' + data[1];
                            },
                            update: true
                        }),
                        renderer: DataTable.Responsive.renderer.tableAll({})}},
        "language": {
            "sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros","sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar",
            "oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
            "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}
        },
        // dom: "lBftipr",
        "lengthMenu": [[4, 10, 25, 50, -1], [4, 10, 25, 50, "Todos"]],
        "aaSorting": [0, 'asc'], /* 'desc' Carregar table decrescente e asc crescente*/
        "aoColumnDefs": [
            {
                "aTargets": [3], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '<button type="button" class="btn btn-outline-warning btn-sm rounded-circle text-secondary" data-bs-toggle="modal" data-bs-target="#trashModal'+ full[3]+'">' +
                                '<i class="bi bi-arrow-up-circle"></i></button>' +
                                    '<div class="modal fade" id="trashModal' + full[3] + '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">\n' +
                                        '<div class="modal-dialog modal-sm">\n' +
                                            '<div class="modal-content">\n' +
                                                '<div class="modal-header bg-warning">\n' +
                                                    '<h6 class="modal-title text-center" id="exampleModalLabel"><i class="bi bi-book-half me-2"></i> Restaurar Ramal '+ full[2] +'</h6>\n' +
                                                        '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>\n' +
                                                '</div>\n' +
                                            '<div class="modal-body fw-semibold">Deseja restaurar o ramal : ' + full[2] + ' ?</div>\n' +
                                        '<div class="modal-footer">\n' +
                                            '<button type="button" class="btn btn-outline-danger btn-sm fw-semibold" data-bs-dismiss="modal"><i class="bi bi-trash"></i> Não</button>\n' +
                                            '<a href="reativar-contato/' + full[3] + '" class="btn btn-outline-success btn-sm fw-semibold"><i class="bi bi-plus-circle" role="button" ></i> Sim</a>\n' +
                                        '</div>\n' +
                                    '</div>\n' +
                                '</div>\n' +
                            '</div>';
                }
            }
        ]
    });

    $('#sectorApp').DataTable( {
        // lengthChange: false,
        responsive:
            {details:
                    {display: DataTable.Responsive.display.modal({
                            header: function (row) {
                                var data = row.data();
                                return data[1];
                            },
                            update: true
                        }),
                        renderer: DataTable.Responsive.renderer.tableAll({})}},
        "language": {
            "sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros","sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar",
            "oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
            "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}
        },
        // dom: "lBftipr",
        "lengthMenu": [[4, 10, 25, 50, -1], [4, 10, 25, 50, "Todos"]],
        "aaSorting": [0, 'asc'], /* 'desc' Carregar table decrescente e asc crescente*/
        "aoColumnDefs": [
            {
                "aTargets": [0], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '<a data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"\n' +
                        'data-bs-title="Clique para editar" href="editar-setor/' + full[0] + '" role="button" class="btn btn-outline-warning btn-sm rounded-circle text-center"><i class="bi bi-pencil text-secondary"></i></a>';
                }
            },
            {
                "aTargets": [4], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '<a title="EDITAR" data-toggle="tooltip" href="excluir-contato/' + full[0] + '" role="button" class="btn btn-outline-danger btn-sm rounded-circle text-center"><i class="bi bi-trash"></i></a>';
                }
            }
        ],
        //buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
        //buttons: [{extend:'excel',title:'<?php //=CONF_SITE_NAME?>// Agenda',header: '<?php //=CONF_SITE_NAME?>// Agenda',filename:'<?php //=CONF_SITE_NAME?>// Agenda',className: 'btn btn-outline-success',text:'<i class="fa fa-file-excel-o"></i>' },
        //    {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'<?php //=CONF_SITE_NAME?>// Agenda',header: '<?php //=CONF_SITE_NAME?>// Agenda',filename:'<?php //=CONF_SITE_NAME?>// Agenda',orientation: 'portrait',pageSize: 'LEGAL',className: 'btn btn-outline-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
        //    {extend:'print', exportOptions: {columns: ':visible'},title:'<?php //=CONF_SITE_NAME?>// Agenda',header: '<?php //=CONF_SITE_NAME?>// Agenda',filename:'<?php //=CONF_SITE_NAME?>// Agenda',orientation: 'portrait',className: 'btn btn-outline-secondary',text:'<span class="fa fa-print"></span>'},
        //    {extend:'colvis',titleAttr: 'Select Colunas',className: 'btn btn-outline-info',text:'<span class="fa fa-list"></span>'}]
    });
});