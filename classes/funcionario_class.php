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

 	
 }