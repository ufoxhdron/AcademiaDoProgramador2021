<?php

if (!isset($_SESSION['cpf'])) {
  header("Location:login.php");
}else {
	require_once '404.php';
}

