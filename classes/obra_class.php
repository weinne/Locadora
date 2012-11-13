<?php

/**
 * Pessoa - classe para cadastro de obras
 * @package obras
 * @author Julian Rodrigues
 * @author Rodrigo Sousa
 * @author Weinne Santos
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 */

class Obra
{
	private $Cod;
	private $Titulo;
	private $Descrição;
	private $Diretor;
	private $Categoria;
	private $Rotulo;

	function __construct()
	{
		$this->Categoria = new Categoria();
		$this->Rotulo    = new Rotulo();
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
	 * Retorna o título da obra
	 *
	 * @return String $Titulo
	 */
	public function getTitulo() {
	    return $this->Titulo;
	}
	
	/**
	 * Seta o título da obra
	 *
	 * @param String $Titulo
	 */
	public function setTitulo($Titulo) {
	    $this->Titulo = $Titulo;
	
	    return $this;
	}

	/**
	 * Retorna a descrição da obra
	 *
	 * @return String $Descricao
	 */
	public function getDescricao() {
	    return $this->Descricao;
	}
	
	/**
	 * Seta a descrição da obra
	 *
	 * @param String $Descricao
	 */
	public function setDescricao($Descricao) {
	    $this->Descricao = $Descricao;
	
	    return $this;
	}


	/**
	 * Retorna o diretor da obra
	 *
	 * @return String $Diretor
	 */
	public function getDiretor() {
	    return $this->Diretor;
	}
	
	/**
	 * Seta a descrição da obra
	 *
	 * @param String $Diretor
	 */
	public function setDiretor($Diretor) {
	    $this->Diretor = $Diretor;
	
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
 		$this->setTitulo($_POST['Titulo']);
 		$this->setDescricao($_POST['Descricao']);
 		$this->setDiretor($_POST['Diretor']);
 		$this->Categoria->setCod($_POST['Categoria']);
 		$this->Rotulo->setCod($_POST['Rotulo']);
 		return $this;
 	}

 	public function salva() {
 		$Novo = array(
			"Cod"       => $this->Cod,
			"Titulo"    => $this->Titulo,
			"Descricao" => $this->Descricao,
			"Diretor"   => $this->Diretor,
			"Categoria" => $this->Categoria->getByJSON($_POST['ObjetoCategoria']),
			"Rotulo"    => $this->Rotulo->getByJSON($_POST['ObjetoRotulo']),
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
 			foreach ($ObjLocal as $Obj) {
 				$Html .= '
 				<option value="'.$Obj->Cod.'">'.
 				$Obj->Titulo.'</option>';
 			}
 			return $Html;
 		}
 	}
}
