$(document).ready(function () {


    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var dataTable = $('.table').DataTable( {
        "processing": true,
        "serverSide": true,
        "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
        'searching': false,
        "lengthMenu": [
            [20, 50, 100, 150, -1],
            [20, 50, 100, 150, "All"] // change per page values here
        ],
        "pageLength": 20, // default record count per page
        "ajax": {
            "type"   : "POST",
            "url": "/transaction/dataTable", // ajax source
            'data': function(data){
                // Read values
                var updated = $('#updated').val();
                var customerName = $('#customerName').val();
                var customerMobile = $('#customerMobile').val();
                var zoneId = $('#zoneId').val();
                var packageId = $('#packageId').val();
                var collectionId = $('#collectionId').val();
                var month = $('#month').val();
                var balance = $('#balance').val();
                var process = $('#process').val();

                // Append to data
                data._token = CSRF_TOKEN;
                data.updated = updated;
                data.customerName = customerName;
                data.customerMobile = customerMobile;
                data.zoneId = zoneId;
                data.packageId = packageId;
                data.collectionId = collectionId;
                data.month = month;
                data.balance = balance;
                data.process = process;
            }
        },
        'columns': [
            { "name": 'id' },
            { "name": 'updated' },
            { "name": 'name' },
            { "name": 'mobile' },
            { "name": 'packageId' },
            { "name": 'collectionId' },
            { "name": 'zoneId' },
            { "name": 'monthly' },
            { "name": 'month' },
            { "name": 'receive' },
            { "name": 'balance' },
            { "name": 'process' },
            { "name": 'action' }

        ],
        "order": [
            [0, "asc"]
        ],// set first column as a default sort by asc
        "columnDefs": [ {
            "targets": 12,
            "orderable": false
        },

            {
                "targets": 0,
                "orderable": false
            }],
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

    $('#updated').change(function(){
        dataTable.draw();
    });

    $('#customerName').keyup(function(){
        dataTable.draw();
    });

    $('#customerMobile').keyup(function(){
        dataTable.draw();
    });

    $('#packageId').keyup(function(){
        dataTable.draw();
    });

    $('#collectionId').change(function(){
        dataTable.draw();
    });

    $('#zoneId').change(function(){
        dataTable.draw();
    });

    $('#month').change(function(){
        dataTable.draw();
    });

    $('#balance').keyup(function(){
        dataTable.draw();
    });

    $('#process').change(function(){
        dataTable.draw();
    });


    $("#csvBtn").on("click", function() {
        dataTable.button( '.buttons-csv' ).trigger();
    });

    $("#printBtn").on("click", function() {
        dataTable.button( '.buttons-print' ).trigger();
    });

    $("#excelBtn").on("click", function() {
        dataTable.button( '.buttons-excel' ).trigger();
    });

    $("#pdfBtn").on("click", function() {
        dataTable.button( '.buttons-pdf' ).trigger();
    });

});

