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
	?>
	<div id="corpo">
		<h1>Escolha seu jogo</h1>
		<table class="listagem">
		<?php
        $q = "SELECT j.cod, j.nome, g.genero, p.produtora, j.capa FROM jogos j JOIN generos g ON j.genero = g.cod JOIN produtoras p ON j.produtora = p.cod";
			$busca = $banco->query($q);
			if (!$busca) {
				print "<tr><td>Infelizmente a busca deu errado</td></tr>";
			} else {
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
  <?php $banco->close(); ?>
</body>
</html>