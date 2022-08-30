//Funçã executada quando o document é carregado
$(document).ready(function () {

    //Chamada da função para ler todos os usuários ao iniciar
    searchAllUsers();

    //Chamada da função para atribuir evento de clique ao bootão de buscar nome
    readNamesEvent();
});

//Função para limprar a tabela de usuários
function clearTableUser() {
    $("#tabela").html('');
}

//Função para criar a tabela de usuários
function createTableUser(obj) {

    for (let i in obj) {

        let linha = document.createElement("tr");
        let coluna1 = document.createElement("td");
        let coluna2 = document.createElement("td");
        let coluna3 = document.createElement("td");
        let coluna4 = document.createElement("td");
        let botaoDelete = document.createElement("button");
        let botaoUpdate = document.createElement("button");

        $(botaoDelete).html("X");
        $(botaoDelete).attr("id", "iduser-" + obj[i].id);
        $(botaoDelete).addClass("btn btn-danger text-white fw-bold bt-actions");

        $(botaoUpdate).html('<i id="edituser-' + obj[i].id + '" class="fas fa-edit"></i>');
        $(botaoUpdate).attr("id", "edituser-" + obj[i].id);
        $(botaoUpdate).addClass("ms-2 btn btn-info text-white fw-bold bt-actions");

        coluna1.innerHTML = obj[i].id;
        coluna2.innerHTML = obj[i].name;
        coluna3.innerHTML = obj[i].email;
        coluna4.appendChild(botaoDelete);
        coluna4.appendChild(botaoUpdate);

        linha.appendChild(coluna1);
        linha.appendChild(coluna2);
        linha.appendChild(coluna3);
        linha.appendChild(coluna4);

        $("#tabela").append(linha);
    }

    //Função para atribuir o evento clique ao botão de delete, recuperando o atributo ID e removendo o texto padrão iduser-
    $(".btn-danger").on('click', (e) => {

        let id = $(e.target).attr("id").replaceAll('iduser-', '');
        deleteUser(id);
    });

    //Função para atribuir o evento clique ao botão de update, recuperando o atributo ID e removendo o texto padrão iduser-
    $(".btn-info").on('click', (e) => {

        let id = $(e.target).attr("id").replaceAll('edituser-', '');
        console.log(id);
    });

}

//Função para deletar um usuário
function deleteUser(id) {

    let param = `actionUser=deleteUser&userId=${id}`;
    $.ajax({
        type: 'GET',
        url: 'user_controller_jq.php',
        data: param,
        dataType: 'text',
        success: () => {
            clearTableUser();
            searchAllUsers();
        },
        error: e => { console.log(e) }
    });
}

//Funcão para ler todos os usuários
function searchAllUsers() {
    $.ajax({
        type: 'GET',
        url: 'user_controller_jq.php',
        data: `actionUser=searchAllUsers`, //x-www-form-urlencoded
        dataType: 'text',
        success: dados => {

            let obj = JSON.parse(dados);
            createTableUser(obj);

            $("#qtd-usuarios").html(`${obj.length} usuários cadastrados no total! `);
        },
        error: erro => { console.log(erro) }
    });
}

//Função para buscar usuários
function readNamesEvent() {
    //Atribuição de evento ON CLICK para requisição de busca pelo nome
    $("#btn-submit").on('click', (e) => {

        e.preventDefault();
        let nameTerm = $('#input-name').val();

        //Função serialize() retorna os parêmetros do formulário
        let dados = $('form').serialize() + '&actionUser=searchTermName';

        $.ajax({
            type: 'GET',
            url: 'user_controller_jq.php',
            data: dados, //x-www-form-urlencoded
            dataType: 'text',
            success: dados => {

                let obj = JSON.parse(dados);

                if (obj.length > 0) {

                    clearTableUser();
                    createTableUser(obj);
                    $("#qtd-usuarios").html(`${obj.length} usuários cadastrados para a busca:   <span class="text-warning"> ${nameTerm} </span>`);
                }
                else {
                    $("#qtd-usuarios").html(`${obj.length} usuários cadastrados para a busca:  <span class="text-warning"> ${nameTerm} </span>`);
                    $("#tabela").html('');
                }
            },
            error: erro => { console.log(erro) }
        });
    });
}