<?php

include 'controller/pessoa/PessoaController.php';
include 'controller/contato/ContatoController.php';
require_once __DIR__ . '../../bootstrap.php';

//Buscando a ação sendo executada
$action = (isset($_GET['a']) || isset($_POST['a'])) ? (isset($_POST['a']) ? $_POST['a'] : $_GET['a']) : '';
//echo "ação: " . $action . "<br>";

switch ($action) {
		//Ações de pessoa
	case 'listPessoa':
		PessoaController::consultaPessoa();
		break;
	case 'searchPessoa':
		PessoaController::consultaPessoa($_GET["nome"]);
		break;
	case 'newPessoa':
		PessoaController::newPessoa();
		break;
	case 'editPessoa':
		PessoaController::editPessoa($_GET["id"]);
		break;
	case 'deletePessoa':
		PessoaController::deletePessoa($_GET["id"]);
		break;
	case 'savePessoa':
		PessoaController::savePessoa($_POST);
		break;

		//Ações de Contato
	case 'listContato':
		ContatoController::consultaContato();
		break;
	case 'newContato':
		ContatoController::newContato();
		break;
	case 'editContato':
		ContatoController::editContato($_GET["id"]);
		break;
	case 'deleteContato':
		ContatoController::deleteContato($_GET["id"]);
		break;
	case 'saveContato':
		ContatoController::saveContato($_POST);
		break;

	default:
		include 'view/home/home.php';
		break;
}
