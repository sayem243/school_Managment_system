$(document).ready(function () {
    $('#commonTable').DataTable( {
        "scrollCollapse": true,
        "paging":         false
    }).order( [ 1, 'DESC' ] );


});

