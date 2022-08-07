<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Login de Usuário</title>
    <style>
      div#corpo {
        width: 270px;
        font-size: 15pt;
      }
      td {
        padding: 6px;
      }
    </style>
</head>
<body>
	<?php
		require_once "includes/banco.php";
		require_once "includes/login.php";
		require_once "includes/funcoes.php";
	?>
	<div id="corpo">
    <?php
      $u = $_POST['usuario'] ?? null;
      $s = $_POST['senha'] ?? null;

      if (is_null($u) || is_null($s)){
        require 'user-login-form.php';
      } else {
        echo "Dados foram passados...";
      }
    ?>
  </div>
</body>
</html>