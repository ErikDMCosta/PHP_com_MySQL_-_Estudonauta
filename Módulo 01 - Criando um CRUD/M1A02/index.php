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
	// include "includes/banco.php"; // Não interrompe caso não der
	// require "includes/banco.php"; // Se não conseguir interrompe die()
	require_once "includes/banco.php"; // Se já foi importado não importa
?>
  <div id="corpo">
    <h1>Escolha seu jogo</h1>
    <table class="listagem">
		<?php
			$busca = $banco->query("SELECT * FROM jogos ORDER BY nome;");
			if(!$busca) {
				print "<tr><td>Infelizmente a busca deu errado</td></tr>";
			} else {
				if ($busca->num_rows == 0) {
					print "<tr><td>Nenhum registro encontrado!</td></tr>";
				} else {
					// Jeito do Video --
					while ($reg = $busca->fetch_object()) {
					 	print "<tr>";
						print "<td>$reg->capa</td>";
						print "<td>$reg->nome</td>";
						// print "<td>$reg->Adm</td>";
						print "<td>Adm</td>";
						print "</tr>";
					}

					// Meu Jeito --
					// foreach($busca as $b) {
					// 	print "<tr>";
					// 	print "<td>".$b['capa']."</td>";
					// 	print "<td>".$b['nome']."</td>";
					// 	// print "<td>".$b['Adm']."</td>";
					//  print "<td>Adm</td>";
					// 	print "</tr>";
					// }
				}
			}
		?>
    </table>
  </div>
  <?php $banco->close(); ?>
</body>
</html>