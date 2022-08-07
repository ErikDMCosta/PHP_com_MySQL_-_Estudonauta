<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Detalhes do Jogo</title>
</head>
<body>
	<?php
		require_once "includes/banco.php";
		require_once "includes/login.php";
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
				} else {
					if ($busca->num_rows == 1) {
						$reg = $busca->fetch_object();
						$t = thumb($reg->capa);
						print "<tr><td rowspan='3'><img src='$t' class='full'/>";
						print "<td><h2>$reg->nome</h2>";
						print "Nota: " . number_format($reg->nota, 1) . " / 10.0";
            if (is_admin()) {
              echo " <span class='material-symbols-outlined'>add_circle</span>";
              echo "<span class='material-symbols-outlined'>edit</span>";
              echo "<span class='material-symbols-outlined'>delete</span>";
            } elseif (is_editor()) {
              echo " <span class='material-symbols-outlined'>edit</span>";
            }
						print "<tr><td>$reg->descricao";
					} else {
						print "<tr><td>Nenhum registro encontrado";
					}
				}
			?>
		</table>
		<!--<a href="index.php"><img src="icones/icoback.png"></a>-->
		<!--<a href="index.php"><span class="material-icons">&#xE87C;</span></a>-->
		<!--<a href="index.php"><span class="material-icons">&#xe5c4;</span></a>-->
		<!--<a href="index.php"><span class="material-icons">arrow_back</span></a>-->
		<?php echo voltar(); ?>
	</div>
  <?php include_once "rodape.php"; ?>
</body>
</html>