$(function () {
    $('.js-basic-example').DataTable({
        responsive: true
    });

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        bPaginate: false,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});