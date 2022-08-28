<?php
require  "user_controller.php";
include "views/headerjq.html";
?>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <h1 class="mb-5">Sistema de cadastro de usuários</h1>
            <h3 id="qtd-usuarios"></h3>
            <p>Lista exibida apenas para mostrar quais usuários buscar!</p>
            <table id="tb-user" class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>E-MAIL</th>
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
