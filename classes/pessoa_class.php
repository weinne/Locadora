<?php

/**
 * Pessoa - classe para cadastro de pessoa
 * @package pessoa
 * @author Julian Rodrigues
 * @author Rodrigo Sousa
 * @author Weinne Santos
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 */

 class Pessoa
 {
 	protected static $Cod;
 	protected static $Nome;
 	protected static $DataNasc;
 	protected static $CPF;
 	protected static $Telefone;

 	function __construct() {
 	}

 	/**
 	 * Retorna código de identificação da pessoa
 	 *
 	 * @return Int $Cod
 	 */
 	public function getCod() {
 	    return $this->$Cod;
 	}
 	
 	/**
 	 * Seta o código com valor recebido
 	 *
 	 * @param Int $Cod Codigo
 	 */
 	public function setCod($Cod) {
 	    $this->Cod = $Cod;
 		return $this;
 	}

 	/**
 	 * Retorna nome da pessoa
 	 *
 	 * @return Int $Nome
 	 */
 	public function getNome() {
 	    return $this->$Nome;
 	}
 	
 	/**
 	 * Seta o nome com string recebida
 	 *
 	 * @param String $Nome Nome
 	 */
 	public function setNome($Nome) {
 	    $this->Nome = $Nome;
 		return $this;
 	}

 	/**
 	 * Retorna Data de Nascimento da pessoa
 	 *
 	 * @return String $DataNasc
 	 */
 	public function getDataNasc() {
 	    return $this->$DataNasc;
 	}
 	
 	/**
 	 * Seta DataNasc com string recebida
 	 *
 	 * @param Int $DataNasc Data de Nascimento
 	 */
 	public function setDataNasc($DataNasc) {
 	    $this->DataNasc = $DataNasc;
 		return $this;
 	}

 	/**
 	 * Retorna CPF da pessoa
 	 *
 	 * @return Int $Cod
 	 */
 	public function getCPF() {
 	    return $this->$CPF;
 	}
 	
 	/**
 	 * Seta o CPF com valor recebido
 	 *
 	 * @param Int $CPF CPF
 	 */
 	public function setCPF($CPF) {
 	    $this->CPF = $CPF;
 		return $this;
 	}

 	/**
 	 * Retorna telefone da pessoa
 	 *
 	 * @return Int $Telefone
 	 */
 	public function getTelefone() {
 	    return $this->$Telefone;
 	}
 	
 	/**
 	 * Seta o telefone com valor recebido
 	 *
 	 * @param Int $Telefone Telefone
 	 */
 	public function setTelefone($Telefone) {
 	    $this->Telefone = $Telefone;
 		return $this;
 	}

 	public function set() {
 		$this->setCod($_POST['Cod']);
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
 		$this->setNome($_POST['Nome']);
 		$this->setDataNasc($_POST['DataNasc']);
 		$this->setCPF($_POST['CPF']);
 		$this->setTelefone($_POST['Telefone']);
 		return $this;
 	}

 	public function salva() {
 		$Novo = array(
 			"Cod" => $this->Cod,
 			"Nome" => $this->Nome,
 			"CPF" => $this->CPF,
 			"Telefone" => $this->Telefone,
 			"DataNasc" => $this->DataNasc,
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
 				<div class="col_12 divAltera" onClick="selecionaAlterar('."'pessoa'".','.$Obj->Cod.')">'.
 				$Obj->Nome.'</div>';
 			}
 			return $Html;
 		}
 	}
 }