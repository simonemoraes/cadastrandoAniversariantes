$(document).ready(function () {

    /* Esta função salva os registros no banco */
    $('#btn_salvar').click(function () {

        var id = '';

        if ($('#id').val() !== '') {
            id = $('#id').val();
        }

        if (valida()) {

            $.post('http://localhost/cadastrandoAniversariantes/index.php/cadastroaniversariantes/salvar', {
                id: id,
                nome: $('#id_nome').val(),
                dt_nasc: $('#id_dt_nasc').val(),
                convenio: $('#id_convenio').val()

            }, function (data, status) {

                if (data) {
                    alert("Registro inserido com sucesso!!");
                    window.location.reload();
                } else {
                    alert("Ocorreu um erro ao inserir o registro!!");
                }

            });
        }

    });

    /* Esta função deleta os registros no banco */
    $('#btn_remover').click(function () {

        var id = '';

        if ($('#id').val() !== '') {
            id = $('#id').val();
        }

        if (valida()) {

            $.post('http://localhost/cadastrandoAniversariantes/index.php/cadastroaniversariantes/remover', {
                id: id,
                nome: $('#id_nome').val(),
                dt_nasc: $('#id_dt_nasc').val(),
                convenio: $('#id_convenio').val()
            }, function (data, status) {
                if (data) {
                    alert("Registro exluido com sucesso!!");
                    window.location.reload();
                } else {
                    alert("Não foi possível exluir o registro!!");
                }
            });
        }
    });



});

/* Ao clicar no botão a tabela será atualizada */
$('#btn_atualiza').click(function () {
    atualizaTabela();
});

/* Edita o campo da tabela selecionado */
$('#tabelaClientes tbody tr').each(function () {

    $(this).click(function () {

        $("td").removeClass("addCor");
        $(this).each(function () {
            $(this).children("*").addClass("addCor");

            var id = $(this).find('td[id=id]').text();

            $.post('http://localhost/cadastrandoAniversariantes/index.php/cadastroaniversariantes/editar', {
                id: id
            }, function (data, status) {

                if (status === "success") {
                    preencheCampos(data);
                } else {
                    mensagem();
                }
            }, 'json');
        });
    });
});



/* Popula tabela com aniversariantes do mes */
$('#btn_buscar').click(function () {

    var mes = $('#select option:selected').val();
    //alert('Pagina Inicial: ' + mes);

    var url = 'http://localhost/cadastrandoAniversariantes/index.php/cadastroaniversariantes/relatorio';

    $.post(url, {
        mes: mes
    }, function (data, status) {
        var dados = JSON.parse(data);

        var html_td = "";

        if (dados !== 'vazio') {
            $.each(dados, function (i, item) {
                html_td = html_td + "<tr><td class='align_td'>" + item.id + "</td>";
                html_td = html_td + "<td class='align_td'>" + item.nome + "</td>";
                html_td = html_td + "<td class='align_td'>" + item.data_nasc + "</td>";
                html_td = html_td + "<td class='align_td'>" + item.convenio + "</td></tr>";
            });

            $('#lista_aniver').html(html_td);
            //console.log(html_td);

        } else {
            window.location.reload();
            alert("Não existe aniversariante para este mes especifico!");
        }
    });
});





/* COLORE A TABELA DE ACORDO COM O MOUSE */
$('#tabelaClientes tbody tr').hover(
        function () {
            $(this).addClass("destaque");
        },
        function () {
            $(this).removeClass("destaque");
        }
);

/* Função que preenche os campos da tabela */
function preencheCampos(data) {

    $('#id').val(data.id);
    $('#id_nome').val(data.nome);
    $('#id_dt_nasc').val(data.dt_nasc);
    $('#id_convenio').val(data.convenio);
}

function atualizaTabela() {
    window.location.reload();
}

/* Esta função fz as validações dos campos input, caso estejam vazio não será feito o submit do formulario
 * até que todos os campos estejam preenchidos */
function valida() {

    var verificaInput = 'verificar';
    var inputs = $('#form_cadastro').find('input[class*="' + verificaInput + '"]');

    var erros = [];

    erros.length = 0;

    $("#div_error").hide();

    $.each(inputs, function (i, value) {
        if (inputs[i].value === "") {
            erros[i] = $(inputs[i]).attr("itemid") + " deve ser preenchido!";
        }
    });

    if (erros.length > 0) {

        var texto = "";

        $.each(erros, function (i, value) {
            if (erros[i]) {
                texto = texto + erros[i] + "<br/>";
            }
        });

        $("#div_error").html(texto).addClass("alert alert-danger").show();

        return false;
    }
    return true;
}

function mensagem(status) {

    var sucesso = $("<p></p>").addClass("alert alert-success").text("Cadastro realizado com sucesso!").fadeIn(2000);

    var erro = $("<p></p>").addClass("alert alert-danger").text("Operação não realizada!");

    if (status === "success") {
        $('.div_panel').before(sucesso);

        sucesso.fadeOut(3000);

    } else {
        $('.div_panel').before(erro);
    }

}

/* Esta função limpa os campos da formulario */
function limparCampos() {
    $("#form_cadastro").each(function () {
        this.reset();
    });
}



/***************************************************************************************************/


//$('#mensagem').find('p').css({
//    "margin-top": "50px"
//}).fadeOut(5000);
/* Cadastro de Clientes */

//function piscar(selector) {
//
//    $(selector).addClass("testando alert alert-success");
//
//    $(selector).fadeOut('slow', function () {
//        $(this).fadeIn('slow', function () {
//            piscar(this);
//        });
//    });
//}




/* Arrastando elementos */

//function drag(ev) {
//    ev.dataTransfer.setData("text", ev.target.id);
//}
//
//function allowDrop(ev) {
//    ev.preventDefault();
//}
//
//function drop(ev) {
//    ev.preventDefault();
//    var data = ev.dataTransfer.getData("text");
//    ev.target.appendChild(document.getElementById(data));
//}





/* Busca por cep 
 $('#btn_buscar').click(function () {
 
 var cep = $('#cep').val();
 
 
 var url = 'http://cep.republicavirtual.com.br/web_cep.php?cep=' + cep + '&formato=json';
 
 $.get(url, function (data, status) {
 if (data.resultado !== '') {
 
 $('.painelCep').show();
 $('#resultado_txt').html(data.resultado_txt);
 $('#tipoLogradouro').html(data.tipo_logradouro);
 $('#logradouro').html(data.logradouro);
 $('#bairro').html(data.bairro);
 $('#cidade').html(data.cidade);
 $('#uf').html(data.uf);
 
 } else {
 alert(status);
 }
 });
 });
 */
/* fim busca por cep */

/* Cadastro de Clientes */
//atualizaTabela();

// piscar('.div_layout');







///*Testando drag and drop */
//$("#drag").draggable();
//$("#drop").droppable({
//    drop: function (event, ui) {
//        $(this).addClass("ui-state-highlight").find("p").html("Colocado!!!");
//    }
//});
//
//
///* Carrinho de compras com drag and drop */
//$("#catalogo li").draggable({
//    helper: "clone"
//});
//$("#carrinho ul").droppable({
//    drop: function (event, ui) {
//        $(this).append($("<li/>").addClass("list-group-item").text(ui.draggable.text()));
//        $(this).find(".mensagem").remove();
//    }
//});
//
///* Selecionando elementos */
//$("#selectable").selectable();
//

/* Ordena elementos */
$("#sortable").sortable();

