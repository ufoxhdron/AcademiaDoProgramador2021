<?php
session_start();
if (!isset($_SESSION['cpf'])) {
    header("Location: login.php");
} else {
    ?>
    <div class="slider">
        <ul class="slides">
            <li>
                <img src="img/ndd.jpg" alt="Carregando..." class="responsive-img">
                <div class="caption texto-esquerda"><br>
                    <h4 class="titulo-slide-left">Buscamos parceiros</h4>                    
                </div>
            </li>

            <li>
                <img src="img/banner.jpg" alt="Carregando..." class="responsive-img">
                <div class="caption texto-esquerda">
                    <h4 class="titulo-slide-left">Nosso foco é o cliente.</h4>
                    <h5 class="texto-slide-left">
                        Buscar soluções simples, ágeis e flexíveis.
                    </h5>
                </div>
            </li> 

            <li>
                <img src="img/arte.jpg" alt="Carregando..." class="responsive-img">
                <div class="caption texto-direita"><br> <br> <br> 
                    <h4 class="titulo-slide-right"></h4>
                    <h5 class="texto-slide-right">                    
                    </h5>
                </div>
            </li>   
        </ul>
    </div>
    <?php
}