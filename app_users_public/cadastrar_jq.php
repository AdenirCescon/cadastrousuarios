<?php
include "views/header_jq.html";
?>
<div class="container">
    <div class="row mt-4">
        <div class="col-xs-12 col-md-12">
            <h1 class="mb-5 col-sm-12">Sistema de cadastro de usuários com jQuery</h1>
            <form id="form-cad" action="" method="post">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nameinput" class="form-label">Nome completo</label>
                        <input autofocus type="text" class="form-control" name="namei" id="nameinput">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="passinput" class="form-label">Senha</label>
                        <input type="password" class="form-control" name="passi" id="passinput">
                    </div>
                    <div class="col-sm-12 col-md-12 mb-3">
                        <label for="emailinput" class="form-label">E-mail</label>
                        <input type="email" class="form-control" name="emaili" id="emailinput">
                    </div>
                    <p><span id="msg-success" class="mb-3"> <?php /*echo (isset($_GET['status']) && $_GET['status'] == 'success' ? '<span class="text-success">Usuário cadastrado com sucesso!</span>' : ''); */ ?> </span></p>
                    <button type="submit" id="btn-submit-cad" class="col-md-12 btn btn-warning text-white fw-bold p-2">Cadastrar</button>
                </div>
            </form>
        </div>
        <div class="col-md-12 mt-5">
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
