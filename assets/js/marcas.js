$(document).ready(function() {
    $('.btn-save-marcas').attr('hidden', true)
    $('#tbl_marcas').DataTable();


    var resize = $('#upload-demo').croppie({
        enableExif: true,
        enableOrientation: true,
        viewport: { // Default { width: 100, height: 100, type: 'square' } 
            width: 250,
            height: 150,
            type: 'square' //square
        },
        boundary: {
            width: 350,
            height: 300
        }
    });
    $('#image-marcas').on('change', function() {
        var reader = new FileReader();
        reader.onload = function(e) {
            resize.croppie('bind', {
                url: e.target.result
            }).then(function() {
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
        $('.btn-save-marcas').attr('hidden', true)
        $('.btn-upload-image').removeAttr('hidden');
    });

    $('.btn-upload-image').on('click', function(ev) {
        resize.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function(img) {
            Swal.fire({
                title: 'Espere...',
                html: 'Recortando imagen...',
                allowEscapeKey: false,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading()
                }
            });
            $.ajax({
                url: baseURL + "recortar-img",
                type: "POST",
                data: { "image": img },
                success: function(rsp) {
                    var path = rsp.replace(/\\/g, '')
                    var image = baseURL + path
                    image = image.replace(/"/g, '')
                    $('.btn-upload-image').attr('hidden', true)
                    $('.btn-save-marcas').removeAttr('hidden');
                    $('#input_path_img').val(path)
                    $('.img-selection-upload').attr('src', image)
                        /* $(".container-image").html(rsp); */
                    swal.close();
                }
            });
        });
    });
    $('.btn-save-marcas').on('click', () => {
        var marca = $('#marcas').val(),
            img = $('#input_path_img').val()

        img = img.replace(/"/g, '')
        alert(img)
        if (marca.length == 0) {
            alertError('Al parecer algunos campos estan vacios')
        } else if (img.length == 0) {
            alertError('Seleccione imagen')
        } else {
            Swal.fire({
                title: 'Espere...',
                html: 'Guardando marca...',
                allowEscapeKey: false,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading()
                }
            });
            $.ajax({
                type: "POST",
                url: baseURL + "save-marca",
                data: {
                    marca: marca,
                    img: img
                },
                dataType: "json",
                success: function(rsp) {
                    swal.close();
                    if (rsp == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Marca creada',
                            text: 'Marca creada exitosamente',
                            showDenyButton: false,
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            allowEscapeKey: false,
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'marcas'
                            }
                        })
                    } else {
                        alertError('Ocurrio un error al momento de crea una nueva marca. Intente de nuevo')
                    }
                }
            });
        }
    })

});