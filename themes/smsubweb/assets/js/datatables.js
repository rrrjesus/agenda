$(document).ready(function() {
    var table = $('#contactApp').DataTable({
        lengthChange: false,
        buttons: [{extend:'excel',title:'Agenda',header: 'Agenda',filename:'Agenda',className: 'btn btn-outline-success',text:'<i class="bi bi-file-earmark-excel"></i>' },
            {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'Agenda',header: 'Agenda',filename:'Agenda',orientation: 'portrait',pageSize: 'LEGAL',className: 'btn btn-outline-danger',text:'<i class="bi bi-file-earmark-pdf"></i>'},
            {extend:'print', exportOptions: {columns: ':visible'},title:'Agenda',header: 'Agenda',filename:'Agenda',orientation: 'portrait',className: 'btn btn-outline-secondary',text:'<i class="bi bi-printer"></i>'},
            {extend:'colvis',titleAttr: 'Select Colunas',className: 'btn btn-outline-info',text:'<i class="bi bi-list"></i>'}],
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
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]],
        "aaSorting": [0, 'asc'], /* 'desc' Carregar table decrescente e asc crescente*/
        "aoColumnDefs": [
            {
                "aTargets": [0], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '<a title="EDITAR" data-toggle="tooltip" href="editar/' + full[0] + '" role="button" class="btn btn-outline-warning btn-md rounded-circle text-center"><i class="fa fa-pencil"></i> ' + full[0] + '</a>';
                }
            },
            {
                "aTargets": [4], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '<a title="EDITAR" data-toggle="tooltip" href="excluir/' + full[0] + '" role="button" class="btn btn-outline-danger btn-md rounded-circle text-center"><i class="fa fa-pencil"></i> ' + full[0] + '</a>';
                }
            }
        ]
    });
    table.buttons().container()
        .appendTo( '#contactApp_wrapper .col-md-6:eq(0)' );

    var table = $('#contact').DataTable({
        drawCallback: function() {
            $('body').tooltip({
                selector: '[data-tt="tooltip"]'
            });
        },
        buttons: [{extend:'excel',title:'Agenda',header: 'Agenda',filename:'Agenda',className: 'btn btn-outline-success',text:'<i class="bi bi-file-earmark-excel"></i>' },
            {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'Agenda',header: 'Agenda',filename:'Agenda',orientation: 'portrait',pageSize: 'LEGAL',className: 'btn btn-outline-danger',text:'<i class="bi bi-file-earmark-pdf"></i>'},
            {extend:'print', exportOptions: {columns: ':visible'},title:'Agenda',header: 'Agenda',filename:'Agenda',orientation: 'portrait',className: 'btn btn-outline-secondary',text:'<i class="bi bi-printer"></i>'},
            {extend:'colvis',titleAttr: 'Select Colunas',className: 'btn btn-outline-info',text:'<i class="bi bi-list"></i>'}],
        "dom": "<'row'<'col-sm-12 col-md-4 searchbar'f><'col-sm-12 col-md-4 text-center'B><'col-sm-12 col-md-4 numporpag'l>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        responsive:
            {details:
                    {display: DataTable.Responsive.display.modal({
                            header: function (row) {
                                var data = row.data();
                                return data[0] + ' - ' + data[1] + ' - ' + data[2];
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
        "lengthMenu": [[7, 10, 25, 50, -1], [7, 10, 25, 50, "Todos"]],
        "aaSorting": [0, 'asc']
    });
        $('#lista-arboviroses tbody').on('click', 'button', function() {
        let data = table.row($(this).parents('tr')).data(); // getting target row data
        let lixos = data[19];

        if (lixos === 0) {
            $('.textdel').html(
                // Adding and structuring the full data
                '<div class="modal-title text-center">Deseja apagar o Sinan <i class="badge rounded-pill bg-danger pt-2 pb-2">' + data[0] + '</i> ?</div>'
            );
            $('.buttondel').html(
                // Adding and structuring the full data
                '<a type="button" href="<?= $pag_system ?>?pagina=acao-arboviroses&idaction=' + data[1] + '&table=<?= $nametabela ?>&agravoaction=<?= mb_strtolower($nameagravo) ?>&ano=<?= $get_year ?>&action=lixeira" data-tt="tooltip" class="btn btn-outline-success btn-sm fw-bold me-3"><i class="fa fa-arrow-circle-o-up me-2"></i> <u>S</u>IM</a><button type="button" class="btn btn-outline-danger btn-sm fw-bold" data-bs-dismiss="modal"><i class="fa fa-remove me-2"></i>NÃO</button>'
            );
        } else {
            $('.textdel').html(
                // Adding and structuring the full data
                '<div class="modal-title text-center">Deseja reativar o Sinan <i class="badge rounded-pill bg-warning pt-2 pb-2">' + data[0] + '</i> ?</div>'
            );
            $('.buttondel').html(
                '<a type="button" href="<?= $pag_system ?>?pagina=acao-arboviroses&idaction=' + data[1] + '&table=<?= $nametabela ?>&agravoaction=<?= mb_strtolower($nameagravo) ?>&ano=<?= $get_year ?>&action=reativacao" class="btn btn-outline-success btn-sm fw-bold me-3"><i class="fa fa-arrow-circle-o-up me-2"></i> <u>S</u>IM</a><button type="button" class="btn btn-outline-danger btn-sm fw-bold" data-bs-dismiss="modal"><i class="fa fa-remove me-2"></i>NÃO</button>'
            );
            $('#myModalLixo').modal('show'); // calling the bootstrap modal
        }
    });
});