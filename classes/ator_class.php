<?php


/**
 * Ator - classe para cadastro de Atores de obras
 * @package Ator
 * @author Julian Rodrigues
 * @author Rodrigo Sousa
 * @author Weinne Santos
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 */

 class Ator {
 	private $nome;
 	
 	function __construct($nome = NULL) {
 		$this->nome = $nome;
 	}

 	/**
 	 * Retorna nome do nome
 	 *
 	 * @return Int $nome
 	 */
 	public function getnome() {
 	    return $this->$nome;
 	}
 	
 	/**
 	 * Seta o nome com valor recebido
 	 *
 	 * @param Int $nome nome
 	 */
 	public function setCod($nome) {
 	    $this->nome = $nome;
 	}


 	public function set() {
 		$this->setnome($_POST['nome']);
 	}

 	public function salva() {

 	}

 	public function cadastra() {
 		$this->set();
 		$this->salva();
 		return true;
 	}