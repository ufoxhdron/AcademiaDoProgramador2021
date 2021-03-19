<?php

session_start();
if (!isset($_SESSION['cpf'])) {
    header("Location: login.php");
} else {
    require_once './ext/conexao.php';
    class EquipamentoService {

        public function adiciona() {
            echo '<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>';
            echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>';
            if (isset($_POST['dadoEquipamento'])) {
                $numeroSerie = filter_input(INPUT_POST, 'numeroSerie', FILTER_SANITIZE_SPECIAL_CHARS);
                $fabricante = filter_input(INPUT_POST, 'fabricante', FILTER_SANITIZE_SPECIAL_CHARS);
                $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
                $data = date("Y-m-d", strtotime(filter_input(INPUT_POST, 'dataFabricacao', FILTER_SANITIZE_FULL_SPECIAL_CHARS)));
                $preco = filter_input(INPUT_POST, 'valor', FILTER_DEFAULT);
                $valor = str_replace(",", ".", $preco);

                if (!empty($numeroSerie) && !empty($fabricante) && !empty($data) && !empty($valor)) {
                    global $conn;
                    $sqlCompara = "SELECT equiNumeroSerie FROM equipamento WHERE equiNumeroSerie = '$numeroSerie'";
                    $resultado = mysqli_query($conn, $sqlCompara);
                    if (mysqli_num_rows($resultado) > 0) {
                        echo "<script>Materialize.toast('Equipamento já está cadastrado!', 3000);</script>";
                        echo "<script>setTimeout(function () {window.location.href = 'index.php?page=equipamento'}, 2500)</script>";
                    } else {
                        global $conn;
                        $sql = "INSERT INTO equipamento (equiNumeroSerie, equiFabricante, equiNome, equiDataFabricacao, equiValor) VALUES ('$numeroSerie', '$fabricante', '$nome', '$data', $valor)";
                        if (mysqli_query($conn, $sql)) {
                            echo "<script>Materialize.toast('Equipamento cadastrado com sucesso!', 3000);</script>";
                            echo "<script>setTimeout(function () {window.location.href = 'index.php?page=equipamento'}, 2000)</script>";
                        } else {
                            echo "<script>Materialize.toast('Erro ao cadastrar este equipamento!', 3000);</script>";
                            echo "<script>setTimeout(function () {window.location.href = 'index.php?page=equipamento'}, 2000)</script>";
                        }
                    }
                }
            }
        }

        public function alterar() {
            echo '<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>';
            echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>';
            if (isset($_POST['atualizaEquipamento'])) {
                $numeroSerie = filter_input(INPUT_POST, 'numeroSerie', FILTER_SANITIZE_SPECIAL_CHARS);
                $fabricante = filter_input(INPUT_POST, 'fabricante', FILTER_SANITIZE_SPECIAL_CHARS);
                $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
                $data = date("Y-m-d", strtotime(filter_input(INPUT_POST, 'dataFabricacao', FILTER_SANITIZE_FULL_SPECIAL_CHARS)));
                $preco = filter_input(INPUT_POST, 'valor', FILTER_DEFAULT);
                $valor = str_replace(",", ".", $preco);
                $idNumeroSerie = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
                
                global $conn;
                $sql = "UPDATE equipamento SET equiNumeroSerie = '$numeroSerie', equiFabricante = '$fabricante', equiNome = '$nome', equiDataFabricacao = '$data', equiValor = '$valor' WHERE equiNumeroSerie = '$idNumeroSerie'";
                if (mysqli_query($conn, $sql)) {
                    echo "<script>Materialize.toast('Equipamento atualizado com sucesso!', 3000);</script>";
                    echo "<script>setTimeout(function () {window.location.href = 'index.php?page=equipamento_lista'}, 2000)</script>";
                } else {
                    echo "<script>Materialize.toast('Erro ao atualizar este equipamento!', 3000);</script>";
                    echo "<script>setTimeout(function () {window.location.href = 'index.php?page=equipamento_lista'}, 2000)</script>";
                }
            } else {
                echo "<script>Materialize.toast('Erro!\nEntre em contato com o administrador da pagina!', 3000);</script>";
                echo "<script>setTimeout(function () {window.location.href = 'index.php?page=equipamento_lista'}, 2000)</script>";
            }
        }

        public function excluir() {
            echo '<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>';
            echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>';
            if (isset($_POST['btn-deletar'])) {
                global $conn;
                $equiNumeroSerie = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
                $sql = "DELETE FROM equipamento WHERE equiNumeroSerie = '$equiNumeroSerie'";
                if (mysqli_query($conn, $sql)) {
                    echo "<script>Materialize.toast('Equipamento deletado com sucesso!', 3000);</script>";
                    echo "<script>setTimeout(function () {window.location.href = 'index.php?page=equipamento_lista'}, 2000)</script>";
                } else {
                    echo "<script>Materialize.toast('Erro ao deletar este equipamento!', 3000);</script>";
                    echo "<script>setTimeout(function () {window.location.href = 'index.php?page=equipamento_lista'}, 2000)</script>";
                }
            } else {
                echo "Erro";
            }
        }

    }

}
