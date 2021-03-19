<?php

session_start();
if (!isset($_SESSION['cpf'])) {
    header("Location: login.php");
} else {
    if (!isset($_SESSION['cpf'])) {
        header("Location:login.php");
    } else {
        require_once './ChamadoService.php';
        $oquefazer = new ChamadoService();
        $acao = filter_input(INPUT_GET, 'acao', FILTER_DEFAULT);

        switch ($acao) {
            case 'listar'://listar 
                require 'chamado_lista.php';
                break;
            case 'incluir'://Incluir   
                $oquefazer->adiciona();
                break;
            case 'alterar'://alterar
                $oquefazer->alterar();
                break;
            case 'excluir'://excluir        
                $oquefazer->excluir();
                break;
        }
    }
}