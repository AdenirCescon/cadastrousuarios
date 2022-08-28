$(document).ready(function () {

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

                coluna1.innerHTML = obj[i].id;
                coluna2.innerHTML = obj[i].name;
                coluna3.innerHTML = obj[i].email;

                linha.appendChild(coluna1);
                linha.appendChild(coluna2);
                linha.appendChild(coluna3);

                $("#tabela").append(linha);
            }

            $("#qtd-usuarios").html(`${obj.length} usuários cadastrados no total! `);
        },
        error: erro => { console.log(erro) }
    });

    $("#btn-submit").on('click', (e) => {
        e.preventDefault();

        //$("input-name").;
        let dados = $('form').serialize() + '&actionUser=searchTermName'
        //console.log(dados);

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

                        coluna1.innerHTML = obj[i].id;
                        coluna2.innerHTML = obj[i].name;
                        coluna3.innerHTML = obj[i].email;

                        linha.appendChild(coluna1);
                        linha.appendChild(coluna2);
                        linha.appendChild(coluna3);

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