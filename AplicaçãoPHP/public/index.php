<?php 
    //iniciar sessão
    session_start();
    //definir constant de controle
    define('controle', true);

    //verificar se ha usuario logado

    $Usuario_logado = $_SESSION['usuario'] ?? null;

    //verifica qual é o caminha na url
    if(empty($Usuario_logado)){
        $_ROTA = 'login';

    }else{
        $_ROTA = $_GET['rota'] ??'home';

    }

    //se o usuario esta logado mas a rota é login, redirecionar para home
    if(!empty($Usuario_logado) && $_ROTA == 'login'){
        $_ROTA = 'home';
    }


    //analisar rota

    $_ROTAS = [
        'login' => 'login.php',
        'home' => 'home.php',
        'page1' => 'page1.php',
        'page2' => 'page2.php',
        'page3' => 'page3.php',   
        'logout' => 'logout.php',     
    ];

    if(!key_exists($_ROTA,$_ROTAS)){
        die('Erro: Rota Invalida');
    }else{require_once $_ROTAS[$_ROTA];
    };
?>