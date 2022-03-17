
function checkInputs(){
    let inputsText = Object.values(document.querySelectorAll("input[type=text]"));
    let inputsNumber = Object.values(document.querySelectorAll("input[type=number]"));

    let check = (inputsText.every(input => input.value.length>=3) && inputsNumber.every(input => parseFloat(input.value) > 0));

    if(!check){
        let msg = 
        `<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error</strong> Los nombres tienen que tener un minimo de 3 caracteres y el precio mayor de 0.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>`;
        document.getElementById('message').innerHTML = msg;
    }

    return check;
}
