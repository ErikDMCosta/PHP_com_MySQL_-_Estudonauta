<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Edição de Dados do Usuário</title>
</head>
<body>
	<?php
		require_once "includes/banco.php";
		require_once "includes/login.php";
		require_once "includes/funcoes.php";
	?>
	<div id="corpo">
		<!-- <h1>Editando Dados</h1> -->
		<?php
		if (!is_logado()) {
			echo msg_erro("Efetue <a href='user-login.php'>login</a> para poder editar seus dados.");
		} else {
			if(!isset($_POST['usuario'])) {
				include "user-edit-form.php";
			} else {
				echo msg_sucesso("Dados foram recebidos");
			}
		}
		?>
    <?php echo voltar(); ?>
  </div>
  <?php require_once "rodape.php"; ?>
</body>
</html>