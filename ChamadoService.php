<?php

session_start();
if (!isset($_SESSION['cpf'])) {
    header("Location: login.php");
} else {
    require_once './ext/conexao.php';

    class ChamadoService {

        public function adiciona() {
            echo '<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>';
            echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>';
            if (isset($_POST['dadoChamado'])) {
                $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
                $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
                $dataAbertura = date("Y-m-d", strtotime(filter_input(INPUT_POST, 'dataAbertura', FILTER_SANITIZE_FULL_SPECIAL_CHARS)));
                $dataFechamento = date("Y-m-d", strtotime(filter_input(INPUT_POST, 'dataFechamento', FILTER_SANITIZE_FULL_SPECIAL_CHARS)));
                $numeroSerieEquipamento = filter_input(INPUT_POST, 'numeroSerieEquipamento', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                if (!empty($titulo) && !empty($descricao) && !empty($dataAbertura) && !empty($dataFechamento) && !empty($numeroSerieEquipamento) && !empty($status)) {
                    global $conn;
                    $sqlCompara = "SELECT equiNumeroSerie FROM chamado WHERE equiNumeroSerie = '$numeroSerieEquipamento'";
                    $resultado = mysqli_query($conn, $sqlCompara);
                    if (mysqli_num_rows($resultado) > 0) {
                        echo "<script>Materialize.toast('Chamado já existe!', 3000);</script>";
                        echo "<script>setTimeout(function () {window.location.href = 'index.php?page=chamado'}, 2500)</script>";
                    } else {
                        global $conn;
                        $sql = "INSERT INTO chamado (chaTitulo, chaDescricao, chaDataInicio, chaDataFim, chaStatus, equiNumeroSerie) VALUES ('$titulo', '$descricao', '$dataAbertura', '$dataFechamento', '$status', '$numeroSerieEquipamento')";
                        if (mysqli_query($conn, $sql)) {
                            echo "<script>Materialize.toast('Chamado cadastrado com sucesso!', 3000);</script>";
                            echo "<script>setTimeout(function () {window.location.href = 'index.php?page=chamado'}, 2000)</script>";
                        } else {
                            echo "<script>Materialize.toast('Erro ao cadastrar este chamado!', 3000);</script>";
                            echo "<script>setTimeout(function () {window.location.href = 'index.php?page=chamado'}, 2000)</script>";
                        }
                    }
                }
            }
        }

        public function alterar() {
            echo '<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>';
            echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>';
            if (isset($_POST['atualizaChamado'])) {
                $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
                $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
                $dataAbertura = date("Y-m-d", strtotime(filter_input(INPUT_POST, 'dataAbertura', FILTER_SANITIZE_FULL_SPECIAL_CHARS)));
                $dataFechamento = date("Y-m-d", strtotime(filter_input(INPUT_POST, 'dataFechamento', FILTER_SANITIZE_FULL_SPECIAL_CHARS)));
                $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $numeroSerieEquipamento = filter_input(INPUT_POST, 'numeroSerieEquipamento', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

                global $conn;
                $sql = "UPDATE chamado SET chaTitulo = '$titulo', chaDescricao = '$descricao', chaDataInicio = '$dataAbertura', chaDataFim = '$dataFechamento', chaStatus = '$status', equiNumeroSerie = '$numeroSerieEquipamento' WHERE chaId = '$id'";
                if (mysqli_query($conn, $sql)) {
                    echo "<script>Materialize.toast('Chamado atualizado com sucesso!', 3000);</script>";
                    echo "<script>setTimeout(function () {window.location.href = 'index.php?page=chamado_lista'}, 2000)</script>";
                } else {
                    echo "<script>Materialize.toast('Erro ao atualizar este chamado!', 3000);</script>";
                    echo "<script>setTimeout(function () {window.location.href = 'index.php?page=chamado_lista'}, 2000)</script>";
                }
            }
        }

        public function excluir() {
            echo '<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>';
            echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>';
            if (isset($_POST['btn-deletar'])) {
                global $conn;
                $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
                $sql = "DELETE FROM chamado WHERE chaId = $id";
                if (mysqli_query($conn, $sql)) {
                    echo "<script>Materialize.toast('Chamado deletado com sucesso!', 3000);</script>";
                    echo "<script>setTimeout(function () {window.location.href = 'index.php?page=chamado_lista'}, 2000)</script>";
                } else {
                    echo "<script>Materialize.toast('Erro ao deletar este chamado!', 3000);</script>";
                    echo "<script>setTimeout(function () {window.location.href = 'index.php?page=chamado_lista'}, 2000)</script>";
                }
            } else {
                echo "Erro";
            }
        }

    }

}
