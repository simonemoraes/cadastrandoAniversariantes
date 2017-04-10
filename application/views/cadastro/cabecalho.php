<!DOCTYPE HTML>
<html>
    <head>
        <title>Cadastro de Cliente</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?= base_url("css/bootstrap.min.css") ?>" media = "all">
        <link rel="stylesheet" href="<?= base_url("css/estilo.css") ?>" media = "all">
        <link rel="stylesheet" href="<?= base_url("css/font_awesome/css/font-awesome.min.css") ?>">
       
    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="navPrincipal">
            <div class="container-fluid">
                <div style="padding-bottom: 20px;" class="navbar-header">

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#elementoCollapsel">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    
                    <a href="<?= base_url() ?>" class="navbar-brand">
                        <i class="fa fa-user-md fa-2x" aria-hidden="true">&nbsp;&nbsp;Consultorio Médico</i>
                        
                    </a>
                </div>

                <div class="navbar-collapse collapse" id="elementoCollapsel">

                    <ul class="nav navbar-nav">
                        <li><a style="padding-top: 30px;" href="<?= base_url("index.php/") ?>">Pagina Inicial</a></li>
                        <li><a style="padding-top: 30px;" href="<?= base_url("index.php/cadastroaniversariantes/formulario") ?>">Cadastro de Aniversariantes</a></li>
                        <li><a style="padding-top: 30px;" href="<?= base_url("index.php/cadastroaniversariantes/relatorio") ?>">Relatório</a></li>
                    </ul>

                </div>

            </div>
        </nav>

