$(document).ready(function() {

    var table = $('.data_table').DataTable({
        responsive: true,
        select: true,
        'aoColumnDefs': [{
            'bSortable': false,
            'aTargets': ['nosort']
        }]
    });

});