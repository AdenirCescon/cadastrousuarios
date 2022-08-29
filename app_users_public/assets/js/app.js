$(document).ready(function () {

    //Chamada da função para ler todos os usuários
    searchAllUsers();
    //Criação da funcão para ler todos os usuários
    function searchAllUsers() {
        $.ajax({
            type: 'GET',
            url: 'user_controller_jq.php',
            data: `actionUser=searchAllUsers`, //x-www-form-urlencoded
            dataType: 'text',
            success: dados => {

                let obj = JSON.parse(dados);
                //console.log('TAMANHO DA TOTAL ' + obj.length);

                for (let i in obj) {

                    let linha = document.createElement("tr");
                    let coluna1 = document.createElement("td");
                    let coluna2 = document.createElement("td");
                    let coluna3 = document.createElement("td");
                    let coluna4 = document.createElement("td");

                    let botaoDelete = document.createElement("button");

                    $(botaoDelete).html("X");
                    $(botaoDelete).attr("id", "iduser-" + obj[i].id);
                    $(botaoDelete).addClass("btn btn-danger text-white fw-bold bt-delete");

                    coluna1.innerHTML = obj[i].id;
                    coluna2.innerHTML = obj[i].name;
                    coluna3.innerHTML = obj[i].email;
                    //coluna4.innerHTML = '<button id=iduser-"' + obj[i].id + '" class="btn btn-danger text-white fw-bold">X</button>';
                    coluna4.appendChild(botaoDelete);

                    linha.appendChild(coluna1);
                    linha.appendChild(coluna2);
                    linha.appendChild(coluna3);
                    linha.appendChild(coluna4);

                    $("#tabela").append(linha);
                }

                $("#qtd-usuarios").html(`${obj.length} usuários cadastrados no total! `);

                $(".btn-danger").on('click', (e) => {
                    //recebe o clique, recupera o atributo ID e remove o texto padrão
                    let id = $(e.target).attr("id").replaceAll('iduser-', '');
                    deleteUser(id);
                });
            },
            error: erro => { console.log(erro) }
        });
    }

    function deleteUser(id) {

        let param = `actionUser=deleteUser&userId=${id}`;
        $.ajax({
            type: 'GET',
            url: 'user_controller_jq.php',
            data: param,
            dataType: 'text',
            success: () => {
                $("#tabela").html('');
                searchAllUsers();
            },
            error: e => { console.log(e) }
        });

    }

    //Atribuição de evento ON CLICK para requisição de busca pelo nome
    $("#btn-submit").on('click', (e) => {
        e.preventDefault();

        let dados = $('form').serialize() + '&actionUser=searchTermName'

        $.ajax({
            type: 'GET',
            url: 'user_controller_jq.php',
            data: dados, //x-www-form-urlencoded
            dataType: 'text',
            success: dados => {

                let obj = JSON.parse(dados);
                //console.log(obj);
                //console.log('TAMANHO DA BUSCA ' + obj.length);

                if (obj.length > 0) {
                    $("#tabela").html('');
                    for (let i in obj) {

                        let linha = document.createElement("tr");
                        let coluna1 = document.createElement("td");
                        let coluna2 = document.createElement("td");
                        let coluna3 = document.createElement("td");
                        let coluna4 = document.createElement("td");

                        coluna1.innerHTML = obj[i].id;
                        coluna2.innerHTML = obj[i].name;
                        coluna3.innerHTML = obj[i].email;
                        coluna4.innerHTML = 'iduser-' + obj[i].id;

                        linha.appendChild(coluna1);
                        linha.appendChild(coluna2);
                        linha.appendChild(coluna3);
                        linha.appendChild(coluna4);

                        $("#tabela").append(linha);
                    }
                    $("#qtd-usuarios").html(`${obj.length} usuários cadastrados para a busca:  `);
                } else {
                    $("#qtd-usuarios").html(`${obj.length} usuários cadastrados para a busca:  `);
                    $("#tabela").html('');
                }


            },
            error: erro => { console.log(erro) }
        });
    });

});