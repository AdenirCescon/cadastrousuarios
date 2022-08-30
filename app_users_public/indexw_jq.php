<?php
include "views/header_jq.html";
?>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <h1 class="mb-5">Sistema de cadastro de usuários com jQuery</h1>
            <h4 id="qtd-usuarios"></h4>
            <table id="tb-user" class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>E-MAIL</th>
                        <th>AÇÃO</th>
                    </tr>
                </thead>
                <tbody id="tabela">

                </tbody>
            </table>
        </div>

    </div>
</div>
<?php
include "views/footer.html";
