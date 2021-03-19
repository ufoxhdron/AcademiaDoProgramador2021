<?php

session_start();
if (isset($_POST['validaUsuario'])) {
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_DEFAULT);
    $senha = sha1(filter_input(INPUT_POST, 'senha', FILTER_DEFAULT));

    if (!empty($cpf) && !empty($senha)) {
        require_once './ext/conexao.php';
        global $conn;
        $sql = "SELECT funCpf, funNome, funSenha FROM funcionario WHERE funCpf = '$cpf' AND funSenha = '$senha'";
        $resultado = mysqli_query($conn, $sql);
        if (mysqli_num_rows($resultado) > 0) {
            $admin = mysqli_fetch_array($resultado);
            $_SESSION['cpf'] = $admin['funCpf'];
            $_SESSION['nome'] = $admin['funNome'];
            $_SESSION['cpf'] = session_id();
            header("Location: index.php?page=home");
        } else {
            header("Location:login.php");
        }
    } else {
        header("Location:login.php");
    }
}

