
function confirmDelete() {
    return confirm('Tem certeza que deseja deletar esse aluno?');
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

function filterTable() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("pesquisa");
    filter = input.value.toUpperCase();
    table = document.getElementById("students-table");
    tr = table.getElementsByTagName("tr");
    var searchOption = document.getElementById("search-option").value;

    // Percorre por todas as linhas (ignorando a primeira linha do cabeçalho)
    for (i = 1; i < tr.length; i++) {
        var match = true;
        // Ignora a comparação se o campo de pesquisa está vazio
        if (filter !== "") {
            td = tr[i].getElementsByTagName("td");

            // Verifica se o valor da coluna corresponde ao texto de pesquisa, de acordo com a opção selecionada
            if (
                (searchOption === 'id' && td[0].textContent.trim() !== filter) ||
                (searchOption === 'nome' && !td[1].textContent.toUpperCase().includes(filter)) ||
                (searchOption === 'cpf' && !td[2].textContent.trim().startsWith(filter)) ||
                (searchOption === 'nascimento' && !td[3].textContent.trim().startsWith(filter)) ||
                (searchOption === 'matricula' && !td[4].textContent.trim().startsWith(filter)) ||
                (searchOption === 'semestre' && !td[5].textContent.trim().startsWith(filter)) ||
                (searchOption === 'curso' && !td[6].textContent.toUpperCase().includes(filter))
            ) {
                match = false;
            }
        }

        // Exibi ou oculta a linha com base na correspondência da pesquisa
        tr[i].style.display = match ? "" : "none";
        
    }
}