// INÍCIO :: Ocultar sidebar
// var sidebar = document.getElementById('sidebar');
const btnSidebar = document.querySelector('#btnSidebar');

function sidebarToggle() {
    let sidebar = document.querySelector('#sidebar');
    if (sidebar.style.display === "none") {
        sidebar.style.display = "block";
    } else {
        sidebar.style.display = "none";
    }
}

btnSidebar.addEventListener('click', sidebarToggle);
// FIM :: Ocultar sidebar



// INÍCIO :: Dropdown do perfil
// var profileDropdown = document.getElementById('ProfileDropDown');
const btnProfileDropdown = document.querySelector('#btnProfileDropdown');

function profileToggle() {
    let profileDropdown = document.querySelector('#ProfileDropDown')

    if (profileDropdown.style.display === "none") {
        profileDropdown.style.display = "block";
    } else {
        profileDropdown.style.display = "none";
    }
}

btnProfileDropdown.addEventListener('click', profileToggle);
// FIM :: Dropdown do perfil



/**
 * ### Modals ###
 */
function toggleModal(action, elem_trigger)
{
    elem_trigger.addEventListener('click', function () {
        if (action == 'add') {
            let modal_id = this.dataset.modal;
            document.getElementById(`${modal_id}`).classList.add('modal-is-open');
        } else {
            // Automaticlly get the opned modal ID
            let modal_id = elem_trigger.closest('.modal-wrapper').getAttribute('id');
            document.getElementById(`${modal_id}`).classList.remove('modal-is-open');
        }
    });
}


// Check if there is modals on the page
if (document.querySelector('.modal-wrapper'))
{
    // Open the modal
    document.querySelectorAll('.modal-trigger').forEach(btn => {
        toggleModal('add', btn);
    });

    // close the modal
    document.querySelectorAll('.close-modal').forEach(btn => {
        toggleModal('remove', btn);
    });
}


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
const inputCep = document.querySelector("#cep");

inputCep.addEventListener("keyup", formatarCep);

function formatarCep(e){
    var v= e.target.value.replace(/\D/g,"");
    v=v.replace(/^(\d{5})(\d)/,"$1-$2");
    e.target.value = v;
}
// FIM :: Máscara para CEP

// INÍCIO :: Ver password
document.querySelector('#verPassword').addEventListener('mousedown', function() {
    if (document.querySelector('#password').type == 'password') {
        document.querySelector('#password').type = 'text';
    }
    else {
        document.querySelector('#password').type = 'password';
    }
});

document.querySelector('#verConfirmPassword').addEventListener('mousedown', function() {
    if (document.querySelector('#confirmPassword').type == 'password') {
        document.querySelector('#confirmPassword').type = 'text';
    }
    else {
        document.querySelector('#confirmPassword').type = 'password';
    }
});
verConfirmPassword
// FIM :: Ver password

// INÍCIO :: Verificar se senhas iguais
let inputPassword = document.querySelector('#password');
let inputConfirmPassword = document.querySelector('#confirmPassword');

function senhasIguais(){
    if (inputPassword.value != inputConfirmPassword.value) {

        inputPassword.classList.add("border-red-500");
        inputConfirmPassword.classList.add("border-red-500");
        document.querySelector('#senhasDiferentes').innerHTML = "Senhas diferentes";

    }
    else {
        inputPassword.classList.remove("border-red-500");
        inputConfirmPassword.classList.remove("border-red-500");
        document.querySelector('#senhasDiferentes').innerHTML = null;
    }
}

inputPassword.addEventListener('keyup', senhasIguais);
inputConfirmPassword.addEventListener('keyup', senhasIguais);
// FIM :: Verificar se senhas iguais

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
