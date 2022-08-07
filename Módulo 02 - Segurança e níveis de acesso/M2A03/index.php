<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="estilo/estilo.css">
  
	<title>Listagem de Jogos</title>
</head>
<body>
	<?php
		require_once "includes/banco.php"; // Se já foi importado não importa
		require_once "includes/funcoes.php"; // Importando função de imagem
		$ordem = $_GET['o'] ?? "n";
		$chave = $_GET['c'] ?? "";
	?>
	<div id="corpo">
		<?php include_once 'topo.php'; ?>
		<h1>Escolha seu jogo</h1>
		<form id="busca" action="index.php" method="get">
			Ordernar: 
			<a href="index.php?o=n&c=<?php echo $chave; ?>">Nome</a> | 
			<a href="index.php?o=p&c=<?php echo $chave; ?>">Produtora</a> | 
			<a href="index.php?o=n1&c=<?php echo $chave; ?>">Nota Alta</a> | 
			<a href="index.php?o=n2&c=<?php echo $chave; ?>">Nota Baixa</a> |
			<a href="index.php">Mostrar Todos</a> |
			Buscar: <input type="text" name="c" size="10" maxlength="40"/>
			<input type="submit" value="Ok">
		</form>
		<table class="listagem">
			<?php
				$q = "SELECT j.cod, j.nome, g.genero, p.produtora, j.capa FROM jogos j JOIN generos g ON j.genero = g.cod JOIN produtoras p ON j.produtora = p.cod ";

				if (!empty($chave)) {
					$q .= "WHERE j.nome LIKE '%$chave%' OR p.produtora LIKE '%$chave%' OR g.genero LIKE '%$chave%' ";
				}

				switch ($ordem) {
					case "p":
						$q .= "ORDER BY p.produtora";
						break;
					case "n1":
						$q .= "ORDER BY j.nota DESC";
						break;
					case "n2":
						$q .= "ORDER BY j.nota ASC";
						break;
					default:
						$q .= "ORDER BY j.nome";
						break;
				}

				$busca = $banco->query($q);
				if (!$busca) {
					print "<tr><td>Infelizmente a busca deu errado</td></tr>";
				}
				else {
					if ($busca->num_rows == 0) {
						print "<tr><td>Nenhum registro encontrado!</td></tr>";
					}
					else {
						// Jeito do Video --
						while ($reg = $busca->fetch_object()) {
							$t = thumb($reg->capa);
							print "<tr>";
							print "<td><img src='$t' class='mini'>";
							print "<td><a href='detalhes.php?cod=$reg->cod'>$reg->nome</a>";
							print " [$reg->genero]";
							print "<br>$reg->produtora";
							print "<td>Adm";
						}
					}
				}
			?>
		</table>
	</div>
  <?php include_once "rodape.php"; ?>
</body>
</html>