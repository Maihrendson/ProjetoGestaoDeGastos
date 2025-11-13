<?php 
defined('controle') or die('Acesso Negado');
?>
<hr>
<span>usuario: <strong><?= $_SESSION['usuario'] ?></strong></span>
<span>
    <a href= "?rota=logout">Sair</a>
</span>
<hr>

<nav>
    <a href="?rota=home">home</a> 
    <a href="?rota=page1">pagina1</a>
    <a href="?rota=page2">pagina2</a>
    <a href="?rota=page3">pagina3</a>
    <a href="?rota=logout">Sair</a>
</nav>