<?php
session_start();
if (!isset($_SESSION['cpf'])) {
    header("Location: login.php");
} else {
    ?>
    <!DOCTYPE html>
    <html lang="pt_BR">
        <head>
            <title>Sis Equipa</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>Bem vindo! A área de trabalho</title>
            <!--Import Google Icon Font-->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <!-- Compiled and minified CSS -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
            <link href="css/face.css" rel="stylesheet" type="text/css"/>                       
        </head>

        <body class="corpo">
            <header class="navbar-fixed">
                <!-- =========================== INICIO MENU DESKTOP ========================== -->
                <nav class="menu-topo">
                    <div class="nav-wrapper container">
                        <a href="#!" class="brand-logo" title="Academia NDD-2021">NDD-2021</a>
                        <a href="#" data-target="mobile" class="sidenav-trigger right"><i class="material-icons">menu</i></a>

                        <ul class="right hide-on-med-and-down">
                            <li><a href="index.php?page=home">Home</a></li>  
                            <li><a class="dropdown-trigger" href="#!" data-target="dropdown">Cadastro<i class="material-icons right">arrow_drop_down</i></a>
                                <ul id="dropdown" class="dropdown-content">
                                    <li><a href="index.php?page=chamado">Chamado</a>
                                    <li><a href="index.php?page=equipamento">Equipamento</a></li>
                                </ul>
                            </li>

                            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Relátorios<i class="material-icons right">arrow_drop_down</i></a>
                                <ul id="dropdown1" class="dropdown-content">
                                    <li><a href="index.php?page=chamado_lista">Chamados</a>
                                    <li><a href="index.php?page=equipamento_lista">Equipamentos</a></li>
                                </ul>
                            </li> 

                            <li><a href="index.php?page=logoff">Sair</a></li>
                        </ul>
                    </div>
                </nav>
                <!-- =========================== INICIO MENU DESKTOP ========================== -->               
            </header>

            <!-- =========================== INICIO MENU MOBILE ========================== -->
            <ul class="sidenav teste" id="mobile">
                <li><a href="index.php?page=home">Home</a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown_mobile">Cadastro<i class="material-icons right">arrow_drop_down</i></a>
                    <ul id="dropdown_mobile" class="dropdown-content">
                        <li><a href="index.php?page=chamado">Chamado</a>
                        <li><a href="index.php?page=equipamento">Equipamento</a></li>
                    </ul>
                </li>

                <li><a class="dropdown-trigger" href="#!" data-target="dropdown_mobile1">Relátorios<i class="material-icons right">arrow_drop_down</i></a>
                    <ul id="dropdown_mobile1" class="dropdown-content">
                        <li><a href="index.php?page=chamado_lista">Chamados</a>
                        <li><a href="index.php?page=equipamento_lista">Equipamentos</a></li>
                    </ul>
                </li>
                <li><a href="index.php?page=logoff">Sair</a></li>
            </ul>
            <!-- =========================== FIM MENU MOBILE ========================== -->



            <!-- =========================== INICIO MAIN ========================== -->
            <main>
                <?php
                require_once './config.php';
                ?>                
            </main>
            <!-- =========================== FIM MAIN ========================== -->






            <!-- =========================== INICIO FOOTER ========================== -->
            <footer class="page-footer">
                <div class="footer-copyright">
                    <div class="container">
                        © 2021 Copyright José Claudinei de oliveira
                    </div>
                </div>
            </footer>
            <!-- =========================== FIM FOOTER ========================== -->






            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <!-- Compiled and minified JavaScript -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            
            <script type="text/javascript">
                M.AutoInit();
                $('.sidenav').sidenav();
                /*-***** Menu Drop *****-*/
                $(".dropdown-trigger").dropdown();
                /*-***** Slider *****-*/
                $('.slider').slider({
                    indicators: false
                })
                /*-***** Text area chamados *****-*/
                $('input#input_text, textarea#descricao').characterCounter();
                $('input#input_text, input#titulo').characterCounter();
            </script>
            <script src="js/valida.js" type="text/javascript"></script>
        </body>
    </html>
    <?php
}