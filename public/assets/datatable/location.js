$(document).ready(function () {

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var table= $('.table').DataTable( {
        "processing": true,
        "serverSide": true,
        "paging": false,
        "info":     false,
        //"ordering": false,
        "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
        "ajax": {
            "type"   : "POST",
            data: {_token: CSRF_TOKEN},
            "url": "/location/dataTable" // ajax source
        },

        "order": [
            [1, "asc"]
        ],// set first column as a default sort by asc
        "columnDefs": [ {
            "targets": 4,
            "orderable": false
        },{
                "targets": 0,
                "orderable": false
        },{
            "targets": 3,
            "orderable": false
        }
        ],
        "buttons": [
            {
                extend: 'collection',
                text: 'Export',
                buttons: [
                    'copy',
                    'excel',
                    'csv',
                    'pdf',
                    'print'
                ]
            },
            {
                text: 'Reload',
                className: 'btn default',
                action: function ( e, dt, node, config ) {
                    dt.ajax.reload();
                    alert('Datatable reloaded!');
                }
            }
        ]
    });

    $("#csvBtn").on("click", function() {
        table.button( '.buttons-csv' ).trigger();
    });

    $("#printBtn").on("click", function() {
        table.button( '.buttons-print' ).trigger();
    });

    $("#excelBtn").on("click", function() {
        table.button( '.buttons-excel' ).trigger();
    });

    $("#pdfBtn").on("click", function() {
        table.button( '.buttons-pdf' ).trigger();
    });

    $("#location_type").change(function() {
        var type = $(this).val();
        $.get("/location/parentList/"+type)
            .done(function (data) {
              //  $("#parent").html(data);
            });
    });

});

