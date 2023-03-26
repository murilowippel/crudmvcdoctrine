<h1>Consulta de Pessoas</h1>

<button type="button" onclick="window.location.href='./index.php'">Início</button>
<button type="button" onclick="window.location.href='./index.php?a=newPessoa'">Novo</button>
<br><br>

<style>
	table,
	th,
	td {
		border: 1px solid black;
	}

	th {
		width: 200px;
	}
</style>

Filtro: <input type="text" id="nomeBusca" name="nomeBusca" value="" />
<button type="button" onclick="searchPessoa()">Pesquisar</button>
<br><br>

<table>
	<tr>
		<th>Id</th>
		<th>Nome</th>
		<th>CPF</th>
		<th>Ações</th>
	</tr>
	<?php
	if (is_array($arrPessoa)) {

		foreach ($arrPessoa as $pessoa) {
			echo '<tr>
					<td>' . $pessoa->getId() . '</td>
					<td>' . $pessoa->getNome() . '</td>
					<td>' . $pessoa->getCpf() . '</td>
					<td>
						<button type="button" onclick="window.location.href=\'./index.php?a=editPessoa&id=' . $pessoa->getId() . '\'">Editar</button>
						<button type="button" onclick="window.location.href=\'./index.php?a=deletePessoa&id=' . $pessoa->getId() . '\'">Excluir</button>
					</td>
				</tr>';
		}
	}

	?>
</table>

<script>
	function searchPessoa() {
		window.location.href = './index.php?a=searchPessoa&nome=' + document.getElementById("nomeBusca").value;
	}
</script>