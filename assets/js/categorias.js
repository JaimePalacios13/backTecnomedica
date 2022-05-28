$(document).ready(function() {
    $('#tbl_categorias').DataTable();
});

$('#nueva-categoria').on('click', () => {
    var categoria = $('#categoria_input').val();

    if (categoria.length == 0) {
        alertError('Al parecer algunos campos estan vacios')
    } else {
        Swal.fire({
            title: 'Espere...',
            html: 'Insertando datos...',
            allowEscapeKey: false,
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading()
            }
        });
        $.ajax({
            type: "POST",
            url: baseURL + "/nueva-categoria",
            data: {
                categoria: categoria
            },
            dataType: "json",
            success: function(rsp) {
                swal.close();
                if (rsp == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Categoria creada',
                        text: 'Categoria creada exitosamente',
                        showDenyButton: false,
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'categorias'
                        }
                    })
                } else {
                    alertError('Ocurrio un error al momento de crea una nueva categoria. Intente de nuevo')
                }
            }
        });
    }
})