function emprestimo() {
    let btnEmprestar = document.querySelector('#emprestar');

    let selectEstudante = document.querySelector('#estudante');
    let selectLivro = document.querySelector('#livro');

    if(selectEstudante.value == '' || selectLivro.value == ''){
        selectEstudante.classList.add("border-red-500");
        selectEstudante.classList.remove("focus:border-gray-600");

        selectLivro.classList.add("border-red-500");
        selectLivro.classList.remove("focus:border-gray-600");

        btnEmprestar.setAttribute("disabled", "disabled");
        btnEmprestar.classList.add("cursor-not-allowed");
    }
    else{
        selectEstudante.classList.remove("border-red-500");
        selectEstudante.classList.add("focus:border-gray-600");

        selectLivro.classList.remove("border-red-500");
        selectLivro.classList.add("focus:border-gray-600");

        btnEmprestar.removeAttribute("disabled");
        btnEmprestar.classList.remove("cursor-not-allowed");
    }
}

document.querySelector('#emprestar').addEventListener('mouseenter', emprestimo);
document.querySelector('#estudante').addEventListener('click', emprestimo);
document.querySelector('#livro').addEventListener('click', emprestimo);
document.querySelector('#fechar').addEventListener('click', () => {
    location.reload();
});

