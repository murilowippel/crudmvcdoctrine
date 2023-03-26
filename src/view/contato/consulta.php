<h1>Consulta de Contatos</h1>

<button type="button" onclick="window.location.href='./index.php'">Início</button>
<button type="button" onclick="window.location.href='./index.php?a=newContato'">Novo</button>
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

<table>
	<tr>
		<th>Id</th>
		<th>Tipo</th>
		<th>Descrição</th>
		<th>Pessoa</th>
		<th>Ações</th>
	</tr>
	<?php
	if (is_array($arrContato)) {

		foreach ($arrContato as $contato) {
			$tipo = ($contato->getTipo() == 1) ? 'Telefone' : 'E-mail';
			echo '<tr>
					<td>' . $contato->getId() . '</td>
					<td>' . $tipo . '</td>
					<td>' . $contato->getDescricao() . '</td>
					<td>' . $contato->getPessoa()->getNome() . '</td>
					<td>
						<button type="button" onclick="window.location.href=\'./index.php?a=editContato&id=' . $contato->getId() . '\'">Editar</button>
						<button type="button" onclick="window.location.href=\'./index.php?a=deleteContato&id=' . $contato->getId() . '\'">Excluir</button>
					</td>
				</tr>';
		}
	}

	?>
</table>