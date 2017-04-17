<?php include 'cabecalho.php' ?>
<div style="margin-top: 150px;" class="container">
    <?php if ($status == 'danger') { ?>
        <?= $mensagem ?>
    <?php } else if ($status == 'info') { ?>
        <?= $mensagem ?>
    <?php } ?>

    <div>
        
       
        <div class="row">
            <div class="col-md-offset-1 col-md-10">

                <div id="div_error" style="display: none"></div>


                <!-- Inicio painel -->
                <div class="panel panel-primary div_panel">
                    <div class="panel-heading text-center">
                        <h4><strong>Relatório de aniversariantes por mes</strong></h4>
                    </div>
                    <div class="panel-body">
                        <form id="form_teste" method="POST" action="<?= base_url("index.php/cadastroaniversariantes/relatorio") ?>">

                            <div class="form-group">
                                <div class="row">

                                    <div class="col-md-10">
                                        <select class="form-control" name="meses" id="select">
                                            <option value="0">Selecione...</option>
                                            <option value="1">Janeiro</option>
                                            <option value="2">Fevereiro</option>
                                            <option value="3">Março</option>
                                            <option value="4">Abril</option>
                                            <option value="5">Maio</option>
                                            <option value="6">Junho</option>
                                            <option value="7">Julho</option>
                                            <option value="8">Agosto</option>
                                            <option value="9">Setembro</option>
                                            <option value="10">Outubro</option>
                                            <option value="11">Novembro</option>
                                            <option value="12">Dezembro</option>
                                        </select>
                                    </div>

                                    <div class="col-md-2 col-sm-6 col-xs-6">
                                        <button style="width: 100%;" class="btn btn-primary" name="mes" id="btn_teste">
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i> &nbsp;Buscar</button>
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




                            <?php
                            if ($lista) {
                                ?>

                                <?php foreach ($lista as $n): ?>


                                    <tbody id = "lista_aniver">
                                        <tr>
                                            <td class='align_td'><?php echo $n['id']; ?> </td>
                                            <td class='align_td'><?php echo $n['nome']; ?></td>
                                            <td class='align_td'><?php echo $n['data_nasc']; ?></td>
                                            <td class='align_td'><?php echo $n['convenio']; ?></td>
                                        </tr>
                                    </tbody>

                                <?php endforeach; ?>

                            </table>
                        </div>
                    <?php }
                    ?>

                    <div class = "panel-footer text-center">

                    </div>



                </div>

            </div>


            <!--Fim painel -->

        </div>
    </div>
    
    
</div>




<script src="<?= base_url("js/jquery-1.12.4.min.js") ?>"></script>
<script src="<?= base_url("js/bootstrap.min.js") ?>"></script>
<script src="<?= base_url("js/jscript.js") ?>"></script>

</body>
</html>