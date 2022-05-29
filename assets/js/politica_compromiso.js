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

document.querySelector(".update-pc").addEventListener("click", () => {
    $.ajax({
        type: "post",
        url: baseURL + "update/politica-compromiso",
        data: {
            politica: $("#text-area-m").val(),
            compromiso: $("#text-area-v").val(),
        },
        dataType: "json",
        success: function(response) {
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
            console.log(data);
        }
    }).done(function(data) {
        console.log(data);
    });
})