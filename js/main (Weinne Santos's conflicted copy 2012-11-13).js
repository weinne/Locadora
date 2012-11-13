$(document).ready(function(){
    $('#linkCadastrar').click(function(){
		$('input[type=text]').val('');
		$('input[type=hidden]').val('');
		$('textarea').val('');
	});

	// Máscaras dos inputs, conforme classe
	$('.input-cpf').mask('999.999.999-99')
	$('.input-telefone').mask('+55 (99) 9999-9999')
    $('.input-data').mask('99/99/9999');
    $('.input-tempo').mask('9');
	$('.input-preco').mask('R$ 9,99');
});

function cadastra(Classe, NomeForm) {
    ObjetoLocal = localStorage.getItem(Classe);
    ObjetoCategoria = localStorage.getItem('categoria');
    ObjetoRotulo = localStorage.getItem('rotulo');
        
	$.ajax({
        url: UrlSite+'ajax/ajax.php?Opcao=cadastra_'+Classe,
        type: 'POST',
        datatype:'html',
        data: $('#'+NomeForm).serialize() + '&ObjLocal=' + ObjetoLocal + '&ObjetoCategoria=' + ObjetoCategoria + '&ObjetoRotulo=' + ObjetoRotulo,
        complete:function(Req){
            Resp = Req.responseText;
            if(Resp == 0 || Resp == false || Resp == null){
                alert('Erro: retornou falso');
            } else {
            	// Exibe a resposta recebida do AJAX, para debug
            	console.log(Resp);

            	// Grava a resposta do AJAX no localStorage
    			localStorage.setItem(Classe, Resp);

            	// Exibe os objetos salvos no localStorage, para debug
            	Objeto = localStorage.getItem(Classe);
            	console.log(Objeto);
            	Objeto_json = JSON.parse(Objeto);
            	console.log(Objeto_json);
            	alert('Cadastrado com sucesso!');
                $('input[type=text]').val('');
                $('input[type=hidden]').val('');
                $('textarea').val('');
            }
        }
    });
}

function pegaListaAltera(Classe) {
	ObjetoLocal = localStorage.getItem(Classe);
	$.ajax({
        url: UrlSite+'ajax/ajax.php?Opcao=lista_altera_'+Classe,
        type: 'POST',
        datatype:'html',
        data: {
        	ObjLocal : ObjetoLocal
        },
        complete:function(Req){
            Resp = Req.responseText;
            if(Resp == 0 || Resp == false || Resp == null){
                alert('Erro: retornou falso');
            } else {
                $('#cad').hide();
            	$('#alt').html(Resp);
            }
        }
    });
}

function selecionaAlterar(Classe, Cod) {
	ObjetoLocal = localStorage.getItem(Classe);
	ObjetoLocal_json = JSON.parse(ObjetoLocal);
	Qtd = ObjetoLocal_json.length;
	for(i = 0; i <= Qtd; i++) {
		if(ObjetoLocal_json[i].Cod == Cod) {
			$('#Cod').val(ObjetoLocal_json[i].Cod);
			$('#Nome').val(ObjetoLocal_json[i].Nome);
			$('#DataNasc').val(ObjetoLocal_json[i].DataNasc);
			$('#CPF').val(ObjetoLocal_json[i].CPF);
            $('#Telefone').val(ObjetoLocal_json[i].Telefone);
            $('#Descricao').val(ObjetoLocal_json[i].Descricao);
            $('#TempoDevolucao').val(ObjetoLocal_json[i].TempoDevolucao);
            $('#Preco').val(ObjetoLocal_json[i].Preco);
            $('#Diretor').val(ObjetoLocal_json[i].Diretor);
            $('#Titulo').val(ObjetoLocal_json[i].Titulo);
            $('#Rotulo').val(ObjetoLocal_json[i].Rotulo.Cod);
            $('#Categoria').val(ObjetoLocal_json[i].Categoria.Cod);
			$('#cad').show();
		}
	}
}

function pegaListBox(Classe) {
    ObjetoLocal = localStorage.getItem(Classe);
    $.ajax({
        url: UrlSite+'ajax/ajax.php?Opcao=listbox_'+Classe,
        type: 'POST',
        datatype:'html',
        data: {
            ObjLocal : ObjetoLocal
        },
        complete:function(Req){
            Resp = Req.responseText;
            if(Resp == 0 || Resp == false || Resp == null){
                alert('Erro: retornou falso');
            } else {
                if(Classe == 'categoria') {
                    $('#Categoria').html(Resp);
                } 
                if(Classe == 'rotulo') {
                    $('#Rotulo').html(Resp);
                }
            }
        }
    });
}