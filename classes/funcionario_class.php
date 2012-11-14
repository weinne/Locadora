<?php

/**
 * Funcionario - classe para funcionários
 * @package pessoa
 * @author Julian Rodrigues
 * @author Rodrigo Sousa
 * @author Weinne Santos
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 */

 class Funcionario extends Pessoa
 {
 	private $Salario;

 	function __construct($Cod = NULL) {
 		$this->Cod = $Cod;
 	}

 	/**
 	 * Retorna Salário do funcionário
 	 *
 	 * @return Float $Salario
 	 */
 	public function getSalario() {
 	    return $this->$Salario;
 	}
 	
 	/**
 	 * Seta o  Salário do funcionário com valor recebido
 	 *
 	 * @param Int $Salario Salario_funcionario
 	 */
 	public function setSalario($Salario) {
 	    $this->Salario = $Salario;
 		return $this;
 	}

 	public function salva() {
 		$Novo = array(
			"Cod"      => $this->Cod,
			"Nome"     => $this->Nome,
			"CPF"      => $this->CPF,
			"Telefone" => $this->Telefone,
			"DataNasc" => $this->DataNasc,
			"Salario"  => $this->Salario,
 			);
 		$ObjLocal = $_POST['ObjLocal'];
 		$ObjLocal = json_decode($ObjLocal);
 		$Altera = false;
 		if(!empty($ObjLocal)) {
 			foreach($ObjLocal as $Key => $Obj) {
	 			if($Obj->Cod == $this->Cod) {
	 				$ObjLocal[$Key] = $Novo;
	 				$Altera = true;
	 			}
	 		}
 		}
 		if(!$Altera)
 			$ObjLocal[] = $Novo;
 		$json = json_encode($ObjLocal);
 		return $json;
 	}

 	public function cadastra() {
 		$this->set();
 		$this->setSalario($_POST['Salario']);
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
 				<div class="col_12 divAltera" onClick="selecionaAlterar('."'funcionario'".','.$Obj->Cod.')">'.
 				$Obj->Nome.'</div>';
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
 				<option>Selecione..</option>';
 			foreach ($ObjLocal as $Obj) {
 				$Html .= '
 				<option value="'.$Obj->Cod.'">'.
 				$Obj->Nome.'</option>';
 			}
 			return $Html;
 		}
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
 }