/* comit sunido */
const counterElem = document.querySelectorAll(".counter");
const maxLengthCounter = 800;
const textareaElem = document.querySelector("#historia");
const textareaElem2 = document.querySelector("#frase");

counterElem[0].innerHTML = `${textareaElem.value.length}/${maxLengthCounter}`;
counterElem[1].innerHTML = `${textareaElem2.value.length}/${150}`;

textareaElem.addEventListener("input", function(val) {
    let countInput = textareaElem.value.length;
    counterElem[0].innerHTML = `${countInput}/${maxLengthCounter}`;
});

textareaElem2.addEventListener("input", function(val) {
    let countInput = textareaElem2.value.length;
    counterElem[1].innerHTML = `${countInput}/${150}`;
});

document.querySelector("#btn-history").addEventListener("click", () => {
    $.ajax({
        type: "post",
        url: baseURL + "update/historia-frase",
        data: {
            historia: $("#historia").val(),
            frase: $("#frase").val(),
        },
        dataType: "json",
        success: function(response) {
            Swal.fire({
                icon: "success",
                title: "Registro actualizado",
                text: "Los datos se han actualizado correctamente",
                showDenyButton: false,
                showCancelButton: false,
                confirmButtonText: "OK",
                allowEscapeKey: false,
                allowOutsideClick: false,
            });
        },
        error: function(data) {
            console.log("error");
            console.log(data);
        },
    });
});

/* funcionalidad :: imagen  */

$("#upload_image_history").change(function() {
    if (this.files && this.files[0]) {
        // validación para saber si el input tiene o no una imagen cargada
        var reader = new FileReader();
        reader.onload = function(e) {
            $(".img-selection-upload_h").attr("src", e.target.result); //asignar imagen en base64 para la vista previa
        };
        reader.readAsDataURL(this.files[0]);
        $(".btn-upload-image-history").removeAttr("hidden"); //mostrar boton para subir imagen
    } else {
        $(".btn-upload-image-history").attr("hidden");
    }
});

$(".btn-upload-image-history").click(function(event) {
    image_pic = $(".img-selection-upload_h").attr("src");
    $.ajax({
        url: baseURL + "upload_pic/historia",
        type: "POST",
        data: {
            image_pic,
            tipoimagen: 'historia'
        },
        dataType: "text",
        success: function(rsp) {
            var path = rsp.replace(/\\/g, "");
            var image = baseURL + path;
            image = image.replace(/"/g, "");
            $(".img-selection-upload_h").attr("src", image_pic);

            if (rsp == "success") {
                Swal.fire({
                    icon: "success",
                    title: "Imagen actualizada",
                    text: "La imagen ha sido actualizada exitosamente",
                    showDenyButton: false,
                    showCancelButton: false,
                    confirmButtonText: "OK",
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                })

            } else {
                alertError(
                    "Ocurrio un error al momento de cargar una imagen. Intente de nuevo"
                );
            }
        },
        error: function(data) {
            console.log(data);
        },
    }).done(function(data) {
        console.log(data);
    });
});

/* Final  editar pic*/