<div class="col d-flex justify-content-center login-div">
    <div class="card card-login">
        <div class="card-body">
            <form method="POST" action="/user/calculo">

                <div class="mb-4 text-center">
                    <h2>Medias e ETC php</h2>
                </div>
                <div class="mb-4 text-center">
                <label for="email" class="form-label">Selecione o curso</label>
                    <select name="op-curso" class="form-group form-select" id="">
                        <option value="medicina">Medicina</option>
                        <option value="bio-medicina">Bio-medicina</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="email" class="form-label">Portugues</label>
                    <input type="text" class="form-control" id="email" name='mt_pt' value="<?php echo exibirDado("dado_mt_pt_calculo"); ?>" placeholder="Digite a nota de portugues aqui!">
                </div>
                <div class="mb-3">
                    <?php echo exibirMensagem("mt_pt_calculo"); ?>
                </div>
                <div class="mb-4">
                    <label for="usuario" class="form-label">Matematica</label>
                    <input type="text" class="form-control" id="usuario" name='mt_mat' value="<?php echo exibirDado("dado_mt_mat_calculo"); ?>" placeholder="Digite a nota de matematica aqui!">
                </div>
                <div class="mb-4">
                    <?php echo exibirMensagem("mt_mat_calculo"); ?>
                </div>

                <div class="mb-4">
                    <label for="usuario" class="form-label">Historia</label>
                    <input type="text" class="form-control" id="senha" name='mt_his' value="<?php echo exibirDado("dado_mt_his_calculo"); ?>" placeholder="Digite a nota de historia aqui!">
                </div>
                <div class="mb-3">
                    <?php echo exibirMensagem("mt_his_calculo"); ?> </div>
                <div class="mb-4">
                    <label for="usuario" class="form-label">Biologia</label>
                    <input type="text" class="form-control" id="senha" name='mt_bio' value="<?php echo exibirDado("dado_mt_bio_calculo"); ?>" placeholder="Digite a nota de biologia aqui!">
                </div>
                <div class="mb-3">
                    <?php echo exibirMensagem("mt_bio_calculo"); ?> </div>
                <div class="mb-4">
                    <label for="usuario" class="form-label">Quimica</label>
                    <input type="text" class="form-control" id="senha" name='mt_qui' value="<?php echo exibirDado("dado_mt_qui_calculo"); ?>" placeholder="Digite a nota de quimica aqui!">
                </div>
                <div class="mb-3">
                    <?php echo exibirMensagem("mt_qui_calculo"); ?>
                </div>
                <button type="submit" name="btn-calcular" class="btn btn-login text-end text-white">Calcular</button>
            </form>
            <br>
        </div>
    </div>
</div>