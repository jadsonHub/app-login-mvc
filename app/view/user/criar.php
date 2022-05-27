<div class="col d-flex justify-content-center login-div">
    <div class="card card-login">
        <div class="card-body">
            <form method="POST" action="/user/criar">

                <div class="mb-4 text-center">
                    <h2>Criar conta</h2>
                </div>
                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name='email_usuario' value="<?php echo exibirDado("dado_email_usuario_criar"); ?>"  placeholder="Digite seu email aqui!">
                </div>
                <div class="mb-3">
                    <?php echo exibirMensagem("email_usuario_criar"); ?>
                </div>
                <div class="mb-4">
                    <label for="usuario" class="form-label">Usuário</label>
                    <input type="text" class="form-control" id="usuario" name='nome_usuario' value="<?php echo exibirDado("dado_nome_usuario_criar"); ?>" placeholder="Digite seu nome de usuário aqui!">
                </div>
                <div class="mb-4">
                    <?php echo exibirMensagem("nome_usuario_criar"); ?>
                </div>

                <div class="mb-4">
                    <label for="usuario" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name='senha_usuario' value="<?php echo exibirDado("dado_senha_usuario_criar"); ?>"  placeholder="Digite sua senha aqui!">
                </div>
                <div class="mb-3">
                    <?php echo exibirMensagem("senha_usuario_criar"); ?>
                </div>
                <div class="mb-4">
                    <label for="usuario" class="form-label">Repita a senha</label>
                    <input type="password" class="form-control" id="senha" name='validarSenha' value="<?php echo exibirDado("dado_validarSenha_criar"); ?>" placeholder="Digite sua senha aqui!">
                </div>
                <div class="mb-3">
                    <?php echo exibirMensagem("validarSenha_criar"); ?>
                </div>
                <div class="mb-4">
                </div>
                <button type="submit" class="btn btn-login text-end text-white">Cadastrar</button>
            </form>
            <br>
        </div>
    </div>
</div>