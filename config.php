<?php

//TRATA URL AMIGAVEL
$url = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ? filter_input(INPUT_GET, 'page', FILTER_SANITIZE_FULL_SPECIAL_CHARS) : "home";

switch ($url) {
    case 'home':
        if (is_file("home.php")) {
            require "home.php";
            break;
        } else {
            require_once '404.php';
        }


    /*     * *************CHAMADO************** */
    case 'chamado':
        if (is_file("chamado.php")) {
            require "chamado.php";
            break;
        } else {
            require_once '404.php';
        }

    /*     * *************CHAMADO AÇÃO************** */
    case 'chamado_acao':
        if (is_file("chamado_acao.php")) {
            require "chamado_acao.php";
            break;
        } else {
            require_once '404.php';
        }
    /*     * *************CHAMADO LISTA************** */
    case 'chamado_lista':
        if (is_file("chamado_lista.php")) {
            require "chamado_lista.php";
            break;
        } else {
            require_once '404.php';
        }
    /*     * *************CHAMADO AÇÃO************** */
    case 'chamado_editar':
        if (is_file("chamado_editar.php")) {
            require "chamado_editar.php";
            break;
        } else {
            require_once '404.php';
        }



    /*     * *************EQUIPAMENTO************** */
    case 'equipamento':
        if (is_file("equipamento.php")) {
            require "equipamento.php";
            break;
        } else {
            require_once '404.php';
        }
    /*     * *************EQUIPAMENTO AÇÃO************** */
    case 'equipamento_acao':
        if (is_file("equipamento_acao.php")) {
            require "equipamento_acao.php";
            break;
        } else {
            require_once '404.php';
        }
    /*     * *************EQUIPAMENTO AÇÃO************** */
    case 'equipamento_editar':
        if (is_file("equipamento_editar.php")) {
            require "equipamento_editar.php";
            break;
        } else {
            require_once '404.php';
        }
    /*     * *************EQUIPAMENTO LISTA************** */
    case 'equipamento_lista':
        if (is_file("equipamento_lista.php")) {
            require "equipamento_lista.php";
            break;
        } else {
            require_once '404.php';
        }



    /*     * *************logoff************** */
    case 'logoff':
        if (is_file("logoff.php")) {
            require "logoff.php";
            break;
        } else {
            require_once '404.php';
        }
    default:
        require 'home.php';
}
