// INÍCIO :: CPF COM MÁSCARA
const inputCpf = document.querySelector('#cpf');

inputCpf.addEventListener("keyup", formatarCPF);

function formatarCPF(e){

    var v = e.target.value.replace(/\D/g,"");
    v=v.replace(/(\d{3})(\d)/,"$1.$2");
    v=v.replace(/(\d{3})(\d)/,"$1.$2");
    v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2");
    e.target.value = v;

}
// FIM :: CPF COM MÁSCARA


// INÍCIO :: Telefone COM MÁSCARA
const inputTelephone = document.querySelector('#telephone');
inputTelephone.addEventListener("keyup", formatarTelefone);

function formatarTelefone(e){

  var v = e.target.value.replace(/\D/g,"");
  v = v.replace(/^(\d\d)(\d)/g,"($1)$2");
  v = v.replace(/(\d{5})(\d)/,"$1-$2");
  e.target.value = v;

}
// FIM :: Telefone COM MÁSCARA



