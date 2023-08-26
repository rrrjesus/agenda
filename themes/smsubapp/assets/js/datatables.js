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
                    return '<a title="EDITAR" data-toggle="tooltip" href="editar/' + full[0] + '" role="button" class="btn btn-outline-warning btn-md rounded-circle text-center"><i class="fa fa-pencil"></i> ' + full[0] + '</a>';
                }
            },
            {
                "aTargets": [4], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '<a title="EDITAR" data-toggle="tooltip" href="excluir/' + full[0] + '" role="button" class="btn btn-outline-danger btn-md rounded-circle text-center"><i class="fa fa-pencil"></i> ' + full[0] + '</a>';
                }
            }
        ],
        //buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
        //buttons: [{extend:'excel',title:'<?php //=CONF_SITE_NAME?>// Agenda',header: '<?php //=CONF_SITE_NAME?>// Agenda',filename:'<?php //=CONF_SITE_NAME?>// Agenda',className: 'btn btn-outline-success',text:'<i class="fa fa-file-excel-o"></i>' },
        //    {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'<?php //=CONF_SITE_NAME?>// Agenda',header: '<?php //=CONF_SITE_NAME?>// Agenda',filename:'<?php //=CONF_SITE_NAME?>// Agenda',orientation: 'portrait',pageSize: 'LEGAL',className: 'btn btn-outline-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
        //    {extend:'print', exportOptions: {columns: ':visible'},title:'<?php //=CONF_SITE_NAME?>// Agenda',header: '<?php //=CONF_SITE_NAME?>// Agenda',filename:'<?php //=CONF_SITE_NAME?>// Agenda',orientation: 'portrait',className: 'btn btn-outline-secondary',text:'<span class="fa fa-print"></span>'},
        //    {extend:'colvis',titleAttr: 'Select Colunas',className: 'btn btn-outline-info',text:'<span class="fa fa-list"></span>'}]
    });

    $('#sector').DataTable( {
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
                    return '<a title="EDITAR" data-toggle="tooltip" href="editar/' + full[0] + '" role="button" class="btn btn-outline-warning btn-md rounded-circle text-center"><i class="fas fa-pencil"></i></a>';
                }
            },
            {
                "aTargets": [6], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '<a title="EDITAR" data-toggle="tooltip" href="excluir/' + full[0] + '" role="button" class="btn btn-outline-danger btn-md rounded-circle text-center"><i class="fas fa-trash"></i></a>';
                }
            }
        ],
        //buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
        //buttons: [{extend:'excel',title:'<?php //=CONF_SITE_NAME?>// Agenda',header: '<?php //=CONF_SITE_NAME?>// Agenda',filename:'<?php //=CONF_SITE_NAME?>// Agenda',className: 'btn btn-outline-success',text:'<i class="fa fa-file-excel-o"></i>' },
        //    {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'<?php //=CONF_SITE_NAME?>// Agenda',header: '<?php //=CONF_SITE_NAME?>// Agenda',filename:'<?php //=CONF_SITE_NAME?>// Agenda',orientation: 'portrait',pageSize: 'LEGAL',className: 'btn btn-outline-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
        //    {extend:'print', exportOptions: {columns: ':visible'},title:'<?php //=CONF_SITE_NAME?>// Agenda',header: '<?php //=CONF_SITE_NAME?>// Agenda',filename:'<?php //=CONF_SITE_NAME?>// Agenda',orientation: 'portrait',className: 'btn btn-outline-secondary',text:'<span class="fa fa-print"></span>'},
        //    {extend:'colvis',titleAttr: 'Select Colunas',className: 'btn btn-outline-info',text:'<span class="fa fa-list"></span>'}]
    });


    $('#contact').DataTable( {
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
        "aaSorting": [0, 'asc']
        //buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
        //buttons: [{extend:'excel',title:'<?php //=CONF_SITE_NAME?>// Agenda',header: '<?php //=CONF_SITE_NAME?>// Agenda',filename:'<?php //=CONF_SITE_NAME?>// Agenda',className: 'btn btn-outline-success',text:'<i class="fa fa-file-excel-o"></i>' },
        //    {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'<?php //=CONF_SITE_NAME?>// Agenda',header: '<?php //=CONF_SITE_NAME?>// Agenda',filename:'<?php //=CONF_SITE_NAME?>// Agenda',orientation: 'portrait',pageSize: 'LEGAL',className: 'btn btn-outline-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
        //    {extend:'print', exportOptions: {columns: ':visible'},title:'<?php //=CONF_SITE_NAME?>// Agenda',header: '<?php //=CONF_SITE_NAME?>// Agenda',filename:'<?php //=CONF_SITE_NAME?>// Agenda',orientation: 'portrait',className: 'btn btn-outline-secondary',text:'<span class="fa fa-print"></span>'},
        //    {extend:'colvis',titleAttr: 'Select Colunas',className: 'btn btn-outline-info',text:'<span class="fa fa-list"></span>'}]
    });
    // table.buttons().container()
    //     .appendTo( '#example_wrapper .col-md-6:eq(0)' );
});