$(document).ready(function(){
    $('#dtBasicExample').DataTable({
        "ordering":true,
        "paging":false,
        "searching":true
    });
    $('.dataTables_length').addClass('bs-select');
})