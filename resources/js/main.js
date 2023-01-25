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
