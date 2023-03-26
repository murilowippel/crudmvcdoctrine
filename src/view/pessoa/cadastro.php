<h1>Cadastro de Pessoa</h1>

<button type="button" onclick="window.location.href='./index.php?a=listPessoa'">Voltar</button>

<form action="./index.php" method="post">
	<input type="hidden" id="a" name="a" value="savePessoa" />
	<input type="hidden" id="msg" name="msg" value="<?php echo (isset($msg)) ? $msg : ''; ?>" />

	<input type="hidden" id="id" name="id" value="<?php echo $pessoa->getId() ?>" />
	<br><br>

	<label for="nome">Nome:</label>
	<input type="text" id="nome" name="nome" value="<?php echo $pessoa->getNome() ?>" />
	<br><br>

	<label for="cpf">CPF:</label>
	<input type="text" id="cpf" name="cpf" value="<?php echo $pessoa->getCpf() ?>" />
	<br><br>

	<button type="submit">Salvar</button>
</form>

<script>
	//mostrando mensagem de sucesso caso tenha gravado
	if (document.getElementById("msg").value != '') {
		alert(document.getElementById("msg").value);

		//Limpando os campos
		document.getElementById("msg").value = '';
		document.getElementById("id").value = '';
		document.getElementById("nome").value = '';
		document.getElementById("cpf").value = '';
	}
</script>