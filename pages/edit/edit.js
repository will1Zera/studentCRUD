
function mascaraCpf(input){
    // Remove caracteres não numéricos
    let valor = input.value.replace(/\D/g, ''); 
    // Aplica a máscara
    valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
    valor = valor.replace(/(\d{3})(\d)/, '$1.$2'); 
    valor = valor.replace(/(\d{3})(\d{1,2})$/, '$1-$2'); 

    input.value = valor;
}

function mascaraNascimento(input){
    // Remove qualquer caracter que não seja número
    let valor = input.value.replace(/\D/g, '');
    // Aplica a máscara
    valor = valor.replace(/^(\d{2})(\d)/, '$1/$2');
    valor = valor.replace(/^(\d{2})\/(\d{2})(\d)/, '$1/$2/$3');

    input.value = valor;
}

function mascaraMatricula(input){
    // Remove qualquer caracter que não seja número
    let valor = input.value.replace(/\D/g, '');

    input.value = valor;
}

function mascaraSemestre(input){
    // Remove qualquer caracter que não seja número
    let valor = input.value.replace(/\D/g, '');
    // Aplica a máscara
    valor = valor.replace(/^(\d{2})(\d)/, '$1/$2');

    input.value = valor;
}

function showMenu(){
    let menuMobile = document.getElementsByClassName("mobile-menu")[0];
    let menuIcon = document.getElementsByClassName("fa-solid")[2];

    if(menuMobile.classList.contains('open')){
        menuMobile.classList.remove('open');
        menuIcon.classList.remove('fa-times');
        menuIcon.classList.add('fa-bars');
    } else{
        menuMobile.classList.add('open');
        menuIcon.classList.remove('fa-bars');
        menuIcon.classList.add('fa-times');
    }
}