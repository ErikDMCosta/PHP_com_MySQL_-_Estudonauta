<?php
	print "<p class='pequeno'>";
	if (empty($_SESSION['user'])) {
		print "<a href='user-login.php'>Entrar</a>";
	} else {
		print "Olá, <strong>" . $_SESSION['nome'] . "</strong> | ";
    echo "<a href='user-edit.php'>Meus Dados</a> | ";
    if (is_admin()) {
      echo "<a href='user-new.php'>Novo usuário</a> | ";
      echo "Novo jogo | ";
    }
		echo "<a href='user-logout.php'>Sair</a>";
	}
	print "</p>";
?>