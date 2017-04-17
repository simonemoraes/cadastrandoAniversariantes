<?php include 'cabecalho.php' ?>

<div style="margin-top: 150px;" class="container">
 
    <div class="row">
        <div class="col-md-offset-1 col-md-10">

            <div id="div_error" style="display: none"></div>
            <div id="mensagem"></div>
            
            <!-- Inicio painel -->
            <div class="panel panel-primary div_panel">
                <div class="panel-heading text-center">
                    <h4><strong>Cadastro de Aniversariantes</strong></h4>
                </div>
                <div class="panel-body">
                    <form id="form_cadastro" method="POST" onsubmit="return false">

                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <input   itemid="Id" class="form-control  sr-only"  type="text" name="id" id="id">
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <label>Nome:</label>
                                    <input itemid="Nome" class="form-control verificar"  type="text" name="nome_paciente" id="id_nome" placeholder="Nome do Paciente">
                                </div>

                                <div class="col-md-3 col-sm-3 col-xs-3">
                                    <label>Data de nascimento:</label>
                                    <input itemid="Data de Nascimento" class="form-control verificar" type="date" name="dt_nasc" id="id_dt_nasc">
                                </div>

                                <div class="col-md-3 col-sm-3 col-xs-3">
                                    <label>Nome do Convenio:</label>
                                    <input itemid="Convenio" class="form-control verificar" type="text" name="convenio" id="id_convenio" placeholder="Nome do Convenio">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 col-sm-6 col-xs-8">
                                    <button style="width: 100%;" class="btn btn-primary"  id="btn_salvar">
                                        <i class="fa fa-floppy-o" aria-hidden="true"></i> &nbsp;Salvar</button>
                                </div>

                                <div class="col-md-4 col-sm-6 col-xs-8">
                                    <button style="width: 100%;" class="btn btn-primary" id="btn_remover">
                                        <i class="fa fa-trash" aria-hidden="true"></i> &nbsp;Remover</button>
                                </div>

                                <div class="col-md-4 col-sm-6 col-xs-8">
                                    <button style="width: 100%;" class="btn btn-primary" title="Alualizar tabela" id="btn_atualiza">
                                        <i class="fa fa-refresh" aria-hidden="true"></i> &nbsp;Atualizar</button>
                                </div>



                            </div>
                        </div>


                    </form>
                </div>

                <div style="border-top: 1px solid #ddd" class="panel-body">
                    <table class="table table-bordered" id="tabelaClientes">
                        <thead style="background-color: #f5f5f5;">
                            <tr class="text-center">
                                <th class="text-center">Id</th>
                                <th class="text-center">Nome</th>
                                <th class="text-center">Data de Nascimento</th>
                                <th class="text-center">Convenio</th> 
                            </tr>
                        </thead>
                        <tbody>

                            <?php if ($aniversariantes == NULL) : ?>
                                <tr>
                                    <td id="id"></td>
                                    <td id="nome"></td>
                                    <td id="dt_nasc"></td>
                                    <td id="convenio"></td>
                                </tr>
                            <?php else : ?>
                                <?php foreach ($aniversariantes as $value): ?>
                                    <tr>
                                        <td class="align_td" id="id"><?= $value['id'] ?></td>
                                        <td class="align_td" id="nome"><?= $value['nome'] ?></td>
                                        <td class="align_td" id="dt_nasc"><?= dataMysqlParaPtBr($value['dt_nasc']) ?></td>
                                        <td class="align_td" id="convenio"><?= $value['convenio'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>

                        </tbody>

                    </table>
                </div>
                <div class="panel-footer text-center">

                </div>

            </div>


            <!-- Fim painel -->

        </div>
    </div>

</div>

<script src="<?= base_url(js/bootstrap.min.js) ?>"></script>

<script src="<?= base_url("js/jquery-1.12.4.min.js") ?>"></script>
<script src="<?= base_url("js/jquery-1.12.0-ui.js") ?>"></script>
<script src="<?= base_url("js/jscript.js") ?>"></script>

</body>
</html>
