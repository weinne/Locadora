<?php

/**
 * Pessoa - classe para cadastro de obras
 * @package obras
 * @author Julian Rodrigues
 * @author Rodrigo Sousa
 * @author Weinne Santos
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 */

class Locacao
{
	private $Cod;
	private $Midia = array();
	private $Funcionario;
	private $Cliente;
	private $DataLocacao;
	private $DataDevolucao;
	private $PrecoFinal;

	function __construct()
	{
		$this->Funcionario = new Funcionario();
		$this->Cliente     = new Cliente();
		if(!empty($_POST['Midia'])) {
			foreach($_POST['Midia'] as $Midia) {
	 			$this->Midia[] = new Midia();
	 		}
	 	}
	}


	/**
	 * Retorna o código da obra
	 *
	 * @return Int $Cod
	 */
	public function getCod() {
	    return $this->Cod;
	}
	
	/**
	 * Seta o código da obra
	 *
	 * @param Int $Cod
	 */
	public function setCod($Cod) {
	    $this->Cod = $Cod;
	
	    return $this;
	}

	/**
	 * Retorna a Data de Locação da obra
	 *
	 * @return Int $DataLocacao
	 */
	public function getDataLocacao() {
	    return $this->DataLocacao;
	}
	
	/**
	 * Seta o Data de Locação da obra
	 *
	 * @param Int $DataLocacao
	 */
	public function setDataLocacao($DataLocacao) {
	    $this->DataLocacao = $DataLocacao;
	
	    return $this;
	}

	/**
	 * Retorna a Data de Locação da obra
	 *
	 * @return Int $DataDevolucao
	 */
	public function getDataDevolucao() {
	    return $this->DataDevolucao;
	}
	
	/**
	 * Seta o Data de Devolução da obra
	 *
	 * @param Int $DataDevolucao
	 */
	public function setDataDevolucao($DataDevolucao) {
	    $this->DataDevolucao = $DataDevolucao;
	
	    return $this;
	}

	/**
	 * Retorna o preço final da obra
	 *
	 * @return Int $PrecoFinal
	 */
	public function getPrecoFinal() {
	    return $this->PrecoFinal;
	}
	
	/**
	 * Seta o código da obra
	 *
	 * @param Int $PrecoFinal
	 */
	public function setPrecoFinal($PrecoFinal) {
	    $this->PrecoFinal = $PrecoFinal;
	
	    return $this;
	}

	public function getByJSON($Obj) {
 		$ObjLocal = json_decode($Obj);
 		$Altera = false;
 		if(!empty($ObjLocal)) {
 			foreach($ObjLocal as $Key => $Obj) {
	 			if($Obj->Cod == $this->Cod) {
	 				return $Obj;
	 			}
	 		}
 		} else {
 			return false;
 		}
 	}

	public function set() {
		//Seta código
 		$this->setCod($_POST['Cod']);
 		$this->DataLocacao($_POST['DataLocacao']);
 		$this->setDataDevolucao($_POST['DataDevolucao']);
 		$this->setPrecoFinal($_POST['PrecoFinal']);

 		// Cria um novo ID, no cadastro de um novo
 		if(empty($this->Cod)) {
 			$ObjLocal = $_POST['ObjLocal'];
 			$ObjLocal = json_decode($ObjLocal);
 			$Contador = 0;
 			if(!empty($ObjLocal)) {
 				foreach($ObjLocal as $Obj) {
	 				$Contador++;
	 			}
 			}
 			$this->setCod($Contador);
 		}
 		$this->Funcionario-setCod($_POST['Funcionario']);
 		$this->Cliente->setCod($_POST['Cliente']);
 		foreach($_POST['Midia'] as $Key => $Midia) {
 			$this->Midia[$Key]->setCod($Midia['Midia']);
 		}
 		return $this;
 	}

 	public function salva() {
 		$ArrayMidia = array();
 		foreach($this->Midia as $Midia) {
 			$ArrayMidia[] = $this->Cliente->getByJSON($_POST['ObjetoCliente']);
 		}

 		$Novo = array(
			"Cod"              => $this->Cod,
			"DataLocacao"      => $this->DataLocacao,
			"setDataDevolucao" => $this->DataDevolucao,
			"Funcionario"      => $this->Funcionario->getByJSON($_POST['ObjetoFuncionario']),
			"Cliente"          => $this->Cliente->getByJSON($_POST['ObjetoCliente']),
			"Midias"		   => $ArrayMidias,
			"PrecoFinal"	   => $this->PrecoFinal
 			);
 		$ObjLocal = $_POST['ObjLocal'];
 		$ObjLocal = json_decode($ObjLocal);
 		$ObjLocal[] = $Novo;
 		$json = json_encode($ObjLocal);
 		return $json;
 	}

 	public function cadastra() {
 		$this->set();
		$retorno = $this->salva();
 		return $retorno;
 	}

 	public function listaAltera() {
 		$ObjLocal = $_POST['ObjLocal'];
 		$ObjLocal = json_decode($ObjLocal);
 		if(empty($ObjLocal)) {
 			return "Não há itens cadastrados.";
 		} else {
 			foreach ($ObjLocal as $Obj) {
 				$Html .= '
 				<div class="col_12 divAltera" onClick="selecionaAlterar('."'obra'".','.$Obj->Cod.')">'.
 				$Obj->Titulo.'<br/><span style="text-size: 10px">Categoria: '.$Obj->Categoria->Nome.'<br/>Rótulo: '.$Obj->Rotulo->Nome.'</span></div>';
 			}
 			return $Html;
 		}
 	}

 	public function listBox() {
 		$ObjLocal_json = $_POST['ObjLocal'];
 		$ObjLocal = json_decode($ObjLocal_json);
 		if(empty($ObjLocal)) {
 			return '<option value="">Não há itens</option>';
 		} else {
			$Html .= '
 				<option>Selecione um item..</option>';
 			foreach ($ObjLocal as $Obj) {
 				$Html .= '
 				<option value="'.$Obj->Cod.'">'.
 				$Obj->Titulo.'</option>';
 			}
 			return $Html;
 		}
 	}
}
