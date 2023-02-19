// INÍCIO :: CAMPO APENAS COM NÚMEROS
const inputNumeroResidencia = document.querySelector('#numero');
inputNumeroResidencia.addEventListener("keypress", somenteNumeros);

function somenteNumeros(e) {

    var charCode = (e.which) ? e.which : e.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
    e.preventDefault();

}
// FIM :: CAMPO APENAS COM NÚMEROS



// INÍCIO :: Máscara para CEP
if (document.querySelector("#cep")) {
    const inputCep = document.querySelector("#cep");

    inputCep.addEventListener("keyup", formatarCep);

    function formatarCep(e){
        var v= e.target.value.replace(/\D/g,"");
        v=v.replace(/^(\d{5})(\d)/,"$1-$2");
        e.target.value = v;
    }
}
// FIM :: Máscara para CEP



// INÍCIO :: Não existe logradouro sem número e vice-versa
function logradouroNumero() {
    if (document.querySelector('#logradouro').value != "" &&
    document.querySelector('#numero').value == "")
    {
        document.querySelector('#numero').classList.add("border-red-500");
    }
    else if (document.querySelector('#logradouro').value == "" &&
    document.querySelector('#numero').value != "")
    {
        document.querySelector('#logradouro').classList.add("border-red-500");
    }
    else {
        document.querySelector('#numero').classList.remove("border-red-500");
        document.querySelector('#logradouro').classList.remove("border-red-500");
    }
}
document.querySelector('#logradouro').addEventListener('keyup', logradouroNumero);
document.querySelector('#numero').addEventListener('keyup', logradouroNumero);
// FIM :: Não existe logradouro sem número e vice-versa
