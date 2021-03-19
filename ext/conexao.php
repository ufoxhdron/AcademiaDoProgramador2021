<?php

define("SERVER", "localhost"); 
define("USUARIO", "root"); 
define("SENHA", ""); 
define("BANCO", "sisequipa"); 

$conn = mysqli_connect(SERVER, USUARIO, SENHA, BANCO);

if (!$conn) {
    echo mysqli_connect_error();
} else {
    echo mysqli_connect_error();
}
    