<?php


/**
 * Endereço - classe para cadastro de endereços
 * @package Endereço
 * @author Julian Rodrigues
 * @author Rodrigo Sousa
 * @author Weinne Santos
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 */

 class Endereco {
 	private $Cod;
 	private $logaradouro;
 	private $numero;
 	private $bairro;
 	private $cep;
 	private $complemento;

 	function __construct($Cod = NULL) {
 		$this->Cod = $Cod;
 	}

 	/**
 	 * Retorna código de identificação do endereço
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
 	 * Retorna identificação do logradouro
 	 *
 	 * @return Int $logaradouro
 	 */
 	public function getlogaradouro() {
 	    return $this->$logaradouro;
 	}
 	
 	/**
 	 * Seta o logradouro com valor recebido
 	 *
 	 * @param Int $logaradouro logaradouro
 	 */
 	public function setCod($logaradouro) {
 	    $this->logaradouro = $logaradouro;
 	}

 	/**
 	 * Retorna com o número do endereço
 	 *
 	 * @return Int $numero
 	 */
 	public function getnumero() {
 	    return $this->$numero;
 	}
 	
 	/**
 	 * Seta o número com valor recebido
 	 *
 	 * @param Int $numero numero
 	 */
 	public function setCod($numero) {
 	    $this->numero = $numero;
 	}

 	/**
 	 * Retorna com o bairro do endereço
 	 *
 	 * @return Int $bairro
 	 */
 	public function getbairro() {
 	    return $this->$bairro;
 	}
 	
 	/**
 	 * Seta string com bairro recebido
 	 *
 	 * @param Int $bairro bairro
 	 */
 	public function setbairro($bairro) {
 	    $this->bairro = $bairro;
 	}

 	/**
 	 * Retorna com o cep do endereço
 	 *
 	 * @return Int $cep
 	 */
 	public function getcep() {
 	    return $this->$cep;
 	}
 	
 	/**
 	 * Seta string com cep recebido
 	 *
 	 * @param Int $cep cep
 	 */
 	public function setbairro($cep) {
 	    $this->cep = $cep;
 	}

 	/**
 	 * Retorna com o complemento do endereço
 	 *
 	 * @return Int $complemento
 	 */
 	public function getcomplemento() {
 	    return $this->$complemento;
 	}
 	
 	/**
 	 * Seta string com complemento recebido
 	 *
 	 * @param Int $complemento complemento
 	 */
 	public function setcomplemento($complemento) {
 	    $this->complemento = $complemento;
 	}

 	public function set() {
 		if(empty($this->Cod))
 			$this->setCod('');
 		$this->setlogradouro($_POST['logradouro']);
 		$this->setnumero($_POST['numero']);
 		$this->setbairro($_POST['bairro']);
 		$this->setcep($_POST['cep']);
 		$this->setcomplemento($_POST['complemento']);
 		return $this;
 	}

 	public function salva() {
 		return $this;
 	}

 	public function cadastra() {
 		$this->set()
 			 ->salva();
 		return $this;
 	}