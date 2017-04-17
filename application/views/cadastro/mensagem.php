<?php if ($status == "") { ?> 
    <div class="col-md-offset-1 col-md-10 alert alert-info alert-dismissable"  
         style="margin-bottom: 15px;" hidden="true" id="div_mensagem">

        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Selecione mes para pesquisa!</strong> 
    </div> 
<?php } ?> 

<?php if ($status == "danger") { ?> 
    <div class="col-md-offset-1 col-md-10 alert alert-danger alert-dismissable"  
         style="margin-bottom: 15px;" id="div_mensagem">

        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Não existe aniversariantes para esse período!</strong> 
    </div>
<?php } ?>     

<?php if ($status == "info") { ?> 
    <div class="col-md-offset-1 col-md-10 alert alert-info alert-dismissable"  
         style="margin-bottom: 15px;" id="div_mensagem">

        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Necessario a seleção de mes para pesquisa!</strong> 
    </div> 
<?php } ?> 

<?php if ($status == "success") { ?> 
    <div class="col-md-offset-1 col-md-10 alert alert-success alert-dismissable"  
         style="margin-bottom: 15px;" id="div_mensagem">

        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Necessario a seleção de mes para pesquisa!</strong> 
    </div> 
<?php } ?> 

