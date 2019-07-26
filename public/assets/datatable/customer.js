$(document).ready(function () {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var dataTable= $('.table').DataTable( {

        loadingMessage: 'Loading...',
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
            "url": "/customer/dataTable", // ajax source
            'data': function(data){
                // Read values
                var customerName = $('#customerName').val();
                var customerUser = $('#customerUser').val();
                var customerMobile = $('#customerMobile').val();
                var zoneId = $('#zoneId').val();
                var package_id = $('#package_id').val();
                var connectionMode = $('#connectionMode').val();
                var bandWidth = $('#bandWidth').val();
                var assignBandWidth = $('#assignBandWidth').val();
                var connectionStatus = $('#connectionStatus').val();


                // Append to data
                data._token = CSRF_TOKEN;
                data.customerName = customerName;
                data.customerUser = customerUser;
                data.customerMobile = customerMobile;
                data.zoneId = zoneId;
                data.package_id = package_id;
                data.connectionMode = connectionMode;
                data.bandWidth = bandWidth;
                data.assignBandWidth = assignBandWidth;
                data.connectionStatus = connectionStatus;
            }
        },
        'columns': [
            { "name": 'id' },
            { "name": 'name' },
            { "name": 'mobile' },
            { "name": 'username' },
            { "name": 'zone_id' },
            { "name": 'package_id' },
            { "name": 'assignBandWidth' },
            { "name": 'connectionMode' },
            { "name": 'bandWidth' },
            { "name": 'connectionStatus' },
            { "name": 'connectionDate' },
            { "name": 'monthlyBill' },
            { "name": 'outstanding' },

        ],
        "order": [
            [1, "asc"]
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

    $('#customerName').keyup(function(){
        dataTable.draw();
    });

    $('#customerUser').keyup(function(){
        dataTable.draw();
    });

    $('#customerMobile').keyup(function(){
        dataTable.draw();
    });

    $('#zoneId').change(function(){
        dataTable.draw();
    });

    $('#package_id').change(function(){
        dataTable.draw();
    });

    $('#connectionMode').change(function(){
        dataTable.draw();
    });

     $('#bandWidth').change(function(){
        dataTable.draw();
    });

     $('#assignBandWidth').change(function(){
        dataTable.draw();
    });

     $('#connectionStatus').change(function(){
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

