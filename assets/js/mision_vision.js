const counterElem = document.querySelectorAll('.counter');
const maxLengthCounter = 400;
const textareaElem = document.querySelector("#text-area-m");
const textareaElem2 = document.querySelector("#text-area-v");


counterElem[0].innerHTML = `${textareaElem.value.length}/${maxLengthCounter}`;
counterElem[1].innerHTML = `${textareaElem2.value.length}/${maxLengthCounter}`;


textareaElem.addEventListener('input', function(val) {
    let countInput = textareaElem.value.length;
    counterElem[0].innerHTML = `${countInput}/${maxLengthCounter}`;
});

textareaElem2.addEventListener('input', function(val) {
    let countInput = textareaElem2.value.length;
    counterElem[1].innerHTML = `${countInput}/${maxLengthCounter}`;
});

document.querySelector(".update-mv").addEventListener("click", () => {
    $.ajax({
        type: "post",
        url: baseURL + "update/mision-vision",
        data: {
            mision: $("#text-area-m").val(),
            vision: $("#text-area-v").val(),
        },
        dataType: "json",
        success: function(response) {
            console.log("hola");
            Swal.fire({
                icon: 'success',
                title: 'Registro actualizado',
                text: 'Los datos se han actualizado correctamente',
                showDenyButton: false,
                showCancelButton: false,
                confirmButtonText: 'OK',
                allowEscapeKey: false,
                allowOutsideClick: false,
            })
        },
        error: function(data) {
            console.log("error");
            console.log(data);
        }
    })
})