<?php


/**
 * Rotulo - classe para cadastro de Rotulo de obras
 * @package Rotulo
 * @author Julian Rodrigues
 * @author Rodrigo Sousa
 * @author Weinne Santos
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 */

 class Rotulo {
 	private $Cod;
 	private $Nome;
 	private $Descricao;
 	private $TempoDevolucao;
 	private $Preco;
 	
 	function __construct($Nome = NULL) {
 		$this->Nome = $Nome;
 	}

 	/**
 	 * Retorna Codigo do rótulo
 	 *
 	 * @return Int $Cod
 	 */
 	public function getCod() {
 	    return $this->$Cod;
 	}
 	
 	/**
 	 * Seta o Codigo com valor recebido
 	 *
 	 * @param Int $Cod Codigo
 	 */
 	public function setCod($Cod) {
 	    $this->Cod = $Cod;
 	    return $this;
 	}

 	/**
 	 * Retorna Nome do rotulo
 	 *
 	 * @return Int $Nome
 	 */
 	public function getNome() {
 	    return $this->$Nome;
 	}
 	
 	/**
 	 * Seta o Nome com valor recebido
 	 *
 	 * @param Int $Nome Nome
 	 */
 	public function setNome($Nome) {
 	    $this->Nome = $Nome;
 	    return $this;
 	}

 	/**
 	 * Retorna Descricao do rotulo
 	 *
 	 * @return Int $Descricao
 	 */
 	public function getDescricao() {
 	    return $this->$Descricao;
 	}
 	
 	/**
 	 * Seta o Descricao com valor recebido
 	 *
 	 * @param Int $Descricao Descricao
 	 */
 	public function setDescricao($Descricao) {
 	    $this->Descricao = $Descricao;
 	    return $this;
 	}

 	 /**
 	 * Retorna TempoDevolucao do rotulo
 	 *
 	 * @return Int $TempoDevolucao
 	 */
 	public function getTempoDevolucao() {
 	    return $this->$TempoDevolucao;
 	}
 	
 	/**
 	 * Seta o TempoDevolucao com valor recebido
 	 *
 	 * @param Int $TempoDevolucao TempoDevolucao
 	 */
 	public function setTempoDevolucao($TempoDevolucao) {
 	    $this->TempoDevolucao = $TempoDevolucao;
 	    return $this;
 	}

 	/**
 	 * Retorna Preco do rotulo
 	 *
 	 * @return Int $Preco
 	 */
 	public function getPreco() {
 	    return $this->$Preco;
 	}
 	
 	/**
 	 * Seta o Preco com valor recebido
 	 *
 	 * @param Int $Preco Preco
 	 */
 	public function setPreco($Preco) {
 	    $this->Preco = $Preco;
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
 		$this->setDescricao($_POST['Descricao']);
 		$this->setTempoDevolucao($_POST['TempoDevolucao']);
 		$this->setPreco($_POST['Preco']);
 		return $this;
 	}

 	public function salva() {
 		$Novo = array(
 			"Cod" => $this->Cod,
 			"Nome" => $this->Nome,
 			"Descricao" => $this->Descricao,
 			"TempoDevolucao" => $this->TempoDevolucao,
 			"Preco" => $this->Preco,
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
 				<div class="col_12 divAltera" onClick="selecionaAlterar('."'rotulo'".','.$Obj->Cod.')">'.
 				$Obj->Nome.'</div>';
 			}
 			return $Html;
 		}
 	}

 	public function listBox() {
 		$ObjLocal = $_POST['ObjLocal'];
 		$ObjLocal = json_decode($ObjLocal);
 		if(empty($ObjLocal)) {
 			return '<option value="">Não há itens</option>';
 		} else {
 			foreach ($ObjLocal as $Obj) {
 				$Html .= '
 				<option value="'.$Obj->Cod.'">'.
 				$Obj->Nome.'</option>';
 			}
 			return $Html;
 		}
 	}
 }