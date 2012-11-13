<?php

function __autoload($classe)
{
	$classe = strtolower($classe);
   	include_once "../classes/{$classe}_class.php";
}

$Pessoa    = new Pessoa();
$Categoria = new Categoria();
$TipoMidia = new TipoMidia();
$Rotulo    = new Rotulo();
$Obra      = new Obra();
$Midia     = new Midia();

 switch ($_GET['Opcao']){
    case 'cadastra_pessoa': echo $Pessoa->cadastra();
        break;
    case 'lista_altera_pessoa': echo $Pessoa->listaAltera();
        break;
    case 'cadastra_categoria': echo $Categoria->cadastra();
        break;
    case 'lista_altera_categoria': echo $Categoria->listaAltera();
        break;
    case 'listbox_categoria': echo $Categoria->listBox();
        break;
    case 'cadastra_tipomidia': echo $TipoMidia->cadastra();
        break;
    case 'lista_altera_tipomidia': echo $TipoMidia->listaAltera();
        break;
    case 'listbox_tipomidia': echo $TipoMidia->listBox();
        break;
    case 'cadastra_rotulo': echo $Rotulo->cadastra();
        break;
    case 'lista_altera_rotulo': echo $Rotulo->listaAltera();
        break;
    case 'listbox_rotulo': echo $Rotulo->listBox();
        break;
    case 'cadastra_obra': echo $Obra->cadastra();
        break;
    case 'lista_altera_obra': echo $Obra->listaAltera();
        break;
    case 'listbox_obra': echo $Obra->listBox();
        break;
    case 'cadastra_midia': echo $Midia->cadastra();
        break;
    case 'lista_altera_midia': echo $Midia->listaAltera();
        break;
    case 'listbox_midia': echo $Midia->listBox();
        break;
     default : echo false;
 }
    
    
    class Ajax {
        //put your code here
    }

?>