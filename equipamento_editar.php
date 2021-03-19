<?php
session_start();
if (!isset($_SESSION['cpf'])) {
    header("Location: login.php");
} else {
    ?>
    <div class = "row container">
        <div class = "col s12 m12 l9 center offset-l1">
            <form method = "post" action = "index.php?page=equipamento_acao&acao=alterar" class = "cotacao-form center">
                <fieldset class = "borda-form">
                    <legend class = "legend">Atualizar Equipamento</legend>
                    <?php
                    require_once './ext/conexao.php';
                    global $conn;
                    $numeroSerie = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
                    $sql = "SELECT equiNumeroSerie, equiFabricante, equiDataFabricacao, equiValor FROM equipamento WHERE equiNumeroSerie = '$numeroSerie'";
                    $resultado = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($resultado) > 0) {
                        $dados = mysqli_fetch_array($resultado);
                    }
                    ?>

                    <!-- Inicio Dados Origem --> 
                    <div class="row center">
                        <div class="input-field col s12 m12 l5">
                            <input id="numeroSerie" type="text" name="numeroSerie" value="<?php echo $dados['equiNumeroSerie']; ?>" maxlength="10" class="validate" required>
                            <label for="numeroSerie">Número de Série</label>
                            <span class="helper-text" data-error="Inválida" data-success="Válida"></span>
                        </div>  

                        <div class="input-field col s12 m12 l5">
                            <input id="equipamentoFabricante" type="text" name="fabricante" value="<?php echo $dados['equiFabricante']; ?>" class="validate" required>
                            <label for="equipamentoFabricante">Fabricante</label>
                            <span class="helper-text" data-error="Inválida" data-success="Válida"></span>
                        </div>                                     
                    </div>

                    <div class="row center">
                        <div class="input-field col s12 m12 l7">
                            <input id="nome" type="text" name="nome" value="<?php echo $dados['equiNome']; ?>">
                            <label for="nome">Nome</label>
                            <span class="helper-text" data-error="Inválida" data-success="Válida"></span>
                        </div>
                    </div>

                    <div class="row center">
                        <div class="input-field col s12 m12 l5">
                            <input id="dataFabricacao" type="date" name="dataFabricacao" value="<?php echo $dados['equiDataFabricacao']; ?>" class="validate" required>
                            <label for="dataFabricacao">Data Fabricação</label>
                            <span class="helper-text" data-error="Inválida" data-success="Válida"></span>
                        </div>

                        <div class="input-field col s12 m12 l6">
                            <input id="valor" type="text" name="valor" value="<?php echo $dados['equiValor']; ?>" class="validate" required>
                            <label for="valor">Valor do Equipamento</label>
                            <span class="helper-text" data-error="Inválida" data-success="Válida"></span>
                        </div>
                    </div>

                    <div class="row center">
                        <div class="input-field col s12">
                            <input type="hidden" name="id" value="<?php echo $dados['equiNumeroSerie']; ?>">                        
                        </div>
                        <div class="input-field col s12">                        
                            <button class="btn waves-effect waves-light btn-color" type="submit" name="atualizaEquipamento">Atualizar
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    <?php
}