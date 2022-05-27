<div class="col d-flex justify-content-center login-div">
    <div class="card card-login">
        <div class="card-body">
            <form method="POST" action="/user/login">
                <div class="d-flex justify-content-center ">
                    <img src="/assets/img/icon.png" class=" img-perfil rounded-circle" alt="...">
                </div><br>
                <div class="mb-3 text-center">
                    <h2>DEV-PHP</h2>
                </div>
            
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuário</label>
                    <input type="text" class="form-control" id="usuario" value="<?php echo exibirDado("dado_nome_usuario_login"); ?>" name='nome_usuario' placeholder="Digite seu nome de usuário aqui!">
                </div>
                <div class="mb-3">
                    <?php echo exibirMensagem("nome_usuario_login"); ?>
                </div>

                <div class="mb-3">
                    <label for="usuario" class="form-label">Senha</label>
                    <input type="password" class="form-control" value="<?php echo exibirDado("dado_senha_usuario_login"); ?>"id="senha" name='senha_usuario' placeholder="Digite sua senha aqui!">
                </div>
                <div class="mb-3">
                    <?php echo exibirMensagem("senha_usuario_login"); ?>
                </div>
                <button type="submit" class="btn btn-login text-end text-white">Entrar</button>
            </form>
            <br>
        </div>
    </div>
</div>