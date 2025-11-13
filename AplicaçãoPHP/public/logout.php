<?php 
defined('controle') or die('Acesso Negado');

//efetuar logout
session_destroy();

//voltar para pagina inicial
header('Location: index.php?rota=login');