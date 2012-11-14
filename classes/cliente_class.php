<?php

/**
 * Cliente - classe para funcionários
 * @package pessoa
 * @author Julian Rodrigues
 * @author Rodrigo Sousa
 * @author Weinne Santos
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 */

 class Cliente extends Pessoa
 {
 	private $Pontos;

 	function __construct($Cod = NULL) {
 		$this->Cod = $Cod;
 	}

 	/**
 	 * Retorna Salário do funcionário
 	 *
 	 * @return Float $Pontos
 	 */
 	public function getPontos() {
 	    return $this->$Pontos;
 	}
 	
 	/**
 	 * Seta o  Salário do funcionário com valor recebido
 	 *
 	 * @param Int $Pontos Pontos_cliente
 	 */
 	public function setPontos($Pontos) {
 	    $this->Pontos = $Pontos;
 		return $this;
 	}

 	public function salva() {
 		$Novo = array(
			"Cod"      => $this->Cod,
			"Nome"     => $this->Nome,
			"CPF"      => $this->CPF,
			"Telefone" => $this->Telefone,
			"DataNasc" => $this->DataNasc,
			"Pontos"  => $this->Pontos,
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
 		$this->setPontos($_POST['Pontos']);
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
 				<div class="col_12 divAltera" onClick="selecionaAlterar('."'cliente'".','.$Obj->Cod.')">'.
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