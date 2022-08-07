<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<?php
	function thumb($arq) {
		$caminho = "fotos/$arq";
		if (is_null($arq) || !file_exists($caminho)) {
			return "fotos/indisponivel.png";
		} else {
			return $caminho;
		}
	}

  function voltar() {
    return "<a href='index.php'><span class='material-icons'>arrow_back</span></a>";
  }

?>