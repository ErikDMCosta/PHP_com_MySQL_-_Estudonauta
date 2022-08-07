<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilo/estilo.css">
  <title>Detalhes do Jogo</title>
</head>
<body>
	<?php
		require_once "includes/banco.php";
		require_once "includes/funcoes.php";
	?>
  <div id="corpo">
	<?php
		// Se $c tiver ['cod'] então recebe ['cod'] caso se não recebe 0
		$c = $_GET['cod'] ?? 0;
		$busca = $banco->query("SELECT * FROM jogos WHERE cod='$c'");
		// print "$c";
	?>
    <h1>Detalhes do jogo</h1>
	<table class='detalhes'>
		<?php
			if (!$busca) {
				print "<tr><td>Busca falhou! $banco->error";
			}
			else {
				if ($busca->num_rows == 1) {
					$reg = $busca->fetch_object();
					print "<tr><td rowspan='3'>foto";
					print "<td><h2>$reg->nome</h2>";
					print "<tr><td>Descrição";
					print "<tr><td>Adm";
				}
				else {
					print "<tr><td>Nenhum registro encontrado";
				}
			}
		?>
	</table>
  </div>
</body>
</html>