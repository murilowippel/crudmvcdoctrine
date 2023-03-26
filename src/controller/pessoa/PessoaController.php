<?php
class PessoaController {

	//Método que abre a consulta de pessoas
	public static function consultaPessoa($nome = '') {
		global $entityManager;

		//Verificando se foi informado um nome para busca
		if ($nome != '') {
			$arrPessoa = $entityManager->getRepository('Pessoa')->findBy(array('nome' => $nome));
		} else {
			$pessoaRep = $entityManager->getRepository('Pessoa');
			$arrPessoa = $pessoaRep->findAll();
		}

		require_once 'view/pessoa/consulta.php';
	}

	//Método que abre o formulário de pessoa para inserir um novo registro
	public static function newPessoa() {
		//Criando objeto em branco
		$pessoa = new Pessoa();

		require_once 'view/pessoa/cadastro.php';
	}

	//Método que abre o formulário de pessoa para editar um registro existente
	public static function editPessoa($id) {
		global $entityManager;

		//carregar pessoa pelo $id
		$pessoa = $entityManager->find('Pessoa', $id);

		require_once 'view/pessoa/cadastro.php';
	}

	//Método que insere ou atualiza um registro de pessoa no banco
	public static function savePessoa($data) {
		global $entityManager;

		//Verificando se está inserindo ou editando um registro
		if ($data["id"] == "") {

			$pessoa = new Pessoa();
			$pessoa->setNome($data["nome"]);
			$pessoa->setCpf($data["cpf"]);

			$entityManager->persist($pessoa);
			$entityManager->flush();

			$msg = "Registro inserido com sucesso!";
		} else {
			//carregar pessoa pelo $id
			$pessoa = $entityManager->find('Pessoa', $data["id"]);
			$pessoa->setNome($data["nome"]);
			$pessoa->setCpf($data["cpf"]);

			$entityManager->flush();

			$msg = "Registro alterado com sucesso!";
		}

		require_once 'view/pessoa/cadastro.php';
	}

	//Método que exclui uma pessoa
	public static function deletePessoa($id) {
		global $entityManager;

		//deletar pessoa pelo $id
		$pessoa = $entityManager->find('Pessoa', $id);
		$entityManager->remove($pessoa);
		$entityManager->flush();

		PessoaController::consultaPessoa();
	}
}
