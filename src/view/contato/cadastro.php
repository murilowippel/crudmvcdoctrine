<h1>Cadastro de Contatos</h1>

<button type="button" onclick="window.location.href='./index.php?a=listContato'">Voltar</button>

<form action="./index.php" method="post">
	<input type="hidden" id="a" name="a" value="saveContato" />
	<input type="hidden" id="msg" name="msg" value="<?php echo (isset($msg)) ? $msg : ''; ?>" />

	<input type="hidden" id="id" name="id" value="<?php echo $contato->getId() ?>" /><br><br>

	<label for="tipo">Tipo:</label>
	<select name="tipo" id="tipo">
		<option value="1" <?php if ($contato->getTipo() == 1) echo 'selected' ?>>Telefone</option>
		<option value="2" <?php if ($contato->getTipo() == 2) echo 'selected' ?>>E-mail</option>
	</select>
	<br><br>

	<label for="nome">Descrição:</label>
	<input type="text" id="descricao" name="descricao" value="<?php echo $contato->getDescricao() ?>" />
	<br><br>

	<label for="idpessoa">Pessoa:</label>
	<select name="idpessoa" id="idpessoa">
		<?php
		foreach ($arrPessoa as $pessoa) {
			$selected = '';

			if ($contato->getId() != "") {
				if ($contato->getPessoa()->getId() == $pessoa->getId())
					$selected = 'selected';
			}

			echo '<option value="' . $pessoa->getId() . '" ' . $selected . '>' . $pessoa->getNome() . '</option>';
		}
		?>
	</select>
	<br><br>

	<button type="submit">Salvar</button>
</form>

<script>
	//mostrando mensagem de sucesso caso tenha gravado
	if (document.getElementById("msg").value != '') {
		alert(document.getElementById("msg").value);

		//Limpando os campos
		document.getElementById("descricao").value = '';
	}
</script>