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
            "url": "/student/dataTable/", // ajax source
            'data': function(data){
                // Read values
                var studentName = $('#studentName').val();
                var id_no = $('#id_no').val();
                var ClassID=$('#ClassID').val();
                var emergency_number=$('#emergency_number').val();
                // var customerMobile = $('#customerMobile').val();
                // var zoneId = $('#zoneId').val();
                // var package_id = $('#package_id').val();
                // var connectionMode = $('#connectionMode').val();
                // var bandWidth = $('#bandWidth').val();
                // var assignBandWidth = $('#assignBandWidth').val();
                // var connectionStatus = $('#connectionStatus').val();


                // Append to data
                data._token = CSRF_TOKEN;
                data.studentName = studentName;
                data.id_no=id_no;
                data.ClassID=ClassID;
                data.emergency_number=emergency_number;


                // data.customerUser = customerUser;
                // data.customerMobile = customerMobile;
               /* data.zoneId = zoneId;
                data.package_id = package_id;
                data.connectionMode = connectionMode;
                data.bandWidth = bandWidth;
                data.assignBandWidth = assignBandWidth;
                data.connectionStatus = connectionStatus;*/
            }
        },
        'columns': [
             { "name": 'id' },
             { "name": 'student_name' },
             { "name": 'id_no'},
             { "name": 'studentclasses_id'},
             { "name": 'emergency_number'}

/*            { "name": 'id_no' },
            { "name": 'father_mobile' },
            { "name": 'zone_id' },
            { "name": 'package_id' },
            { "name": 'assignBandWidth' },
            { "name": 'connectionMode' },
            { "name": 'bandWidth' },
            { "name": 'connectionStatus' },
            { "name": 'connectionDate' },
            { "name": 'monthlyBill' },
            { "name": 'outstanding' },*/

        ],
        "order": [
            [1, "asc"]
        ],// set first column as a default sort by asc
        "columnDefs": [ {
            "targets": 0,
            "orderable": false
        }],
        "buttons": [
            // {
            //     extend: 'collection',
            //     text: 'Export',
            //     buttons: [
            //         'copy',
            //         'excel',
            //         'csv',
            //         'pdf',
            //         'print'
            //     ]
            // },
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

    $('#studentName').keyup(function(){
        dataTable.draw();
    });

    $('#id_no').keyup(function(){
        dataTable.draw();
    });
    $('#ClassID').change(function(){
        dataTable.draw();
    });
    $('#emergency_number').keyup(function(){
        dataTable.draw();
    });
    //
    // $('#customerMobile').keyup(function(){
    //     dataTable.draw();
    // });

/*
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
*/





});

