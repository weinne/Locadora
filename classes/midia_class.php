<?php

/**
 * Pessoa - classe para cadastro de obras
 * @package obras
 * @author Julian Rodrigues
 * @author Rodrigo Sousa
 * @author Weinne Santos
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 */

class Midia
{
	private $Cod;
	private $Obra;
	private $TipoMidia;

	function __construct()
	{
		$this->Obra      = new Obra();
		$this->TipoMidia = new TipoMidia();
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
 		$this->Obra->setCod($_POST['Obra']);
 		$this->TipoMidia->setCod($_POST['TipoMidia']);
 		return $this;
 	}

 	public function salva() {
 		$Novo = array(
			"Cod"       => $this->Cod,
			"Obra"      => $this->Obra->getByJSON($_POST['ObjetoObra']),
			"TipoMidia" => $this->TipoMidia->getByJSON($_POST['ObjetoTipoMidia']),
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
 				<div class="col_12 divAltera" onClick="selecionaAlterar('."'midia'".','.$Obj->Cod.')">' . $Obj->Cod . ' | ' .$Obj->TipoMidia->Nome.' | '. $Obj->Obra->Titulo.'</div>';
 			}
 			return $Html;
 		}
 	}
}
