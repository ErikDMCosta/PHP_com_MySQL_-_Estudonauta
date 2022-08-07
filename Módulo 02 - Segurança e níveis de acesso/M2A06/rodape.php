<?php
	print "<footer>";
	print "<p>Acessado por " . $_SERVER['REMOTE_ADDR'] . " em " . date('d/m/y') . " </p>";
	print "<p>Desenvolvido por ÉrikDMCosta &copy; 2022</p>";
	print "</footer>";
	$banco->close();
