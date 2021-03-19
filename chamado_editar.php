<?php
session_start();
if (!isset($_SESSION['cpf'])) {
    header("Location: login.php");
} else {
    ?>
    <div class="row container">
        <div class="col s12 m12 l9 center offset-l1">
            <form method="post" action="index.php?page=chamado_acao&acao=alterar" name="form_chamado" class="cotacao-form center">
                <fieldset class="borda-form">
                    <legend class="legend">Atualizar Chamados</legend>             

                    <?php
                    require_once './ext/conexao.php';
                    global $conn;
                    $chaId = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
                    $sql = "SELECT * FROM chamado WHERE chaId = '$chaId'";
                    $resultado = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($resultado) > 0) {
                        $dadosChamado = mysqli_fetch_array($resultado);
                    }
                    ?>
                    
                    <!-- Inicio Dados Origem --> 
                    <div class="row center">
                        <div class="input-field col s12 m12 l5">
                            <input id="titulo" type="text" name="titulo" value="<?php echo $dadosChamado['chaTitulo'];?>" autocomplete="off" maxlength="30" data-lenght="30">
                            <label for="titulo">Título</label>
                            <span class="helper-text" data-error="Inválida" data-success="Válida"></span>
                        </div>  

                        <div class="input-field col s12 m12 l7">
                            <textarea id="descricao" name="descricao" class="materialize-textarea" maxlength="140" data-length="140"><?php echo $dadosChamado['chaDescricao'];?></textarea>
                            <label for="descricao">Descrição</label>
                        </div>                                     
                    </div>

                    <div class="row center">
                        <div class="input-field col s12 m12 l5">                            
                            <input id="dataAbertura" type="date" name="dataAbertura" value="<?php echo $dadosChamado['chaDataInicio']; ?>">
                            <label for="dataAbertura">Data Abertura</label>
                            <span class="helper-text" data-error="Inválida" data-success="Válida"></span>
                        </div>

                        <div class="input-field col s12 m12 l2">
                        </div>

                        <div class="input-field col s12 m12 l5">                           
                            <input id="dataFechamento" type="date" name="dataFechamento" value="<?php echo $dadosChamado['chaDataFim']; ?>">
                            <label for="dataFechamento">Data fechamento</label>
                            <span class="helper-text" data-error="Inválida" data-success="Válida"></span>
                        </div>

                        <div class="input-field col s12 m12 l6">
                            <select id="numeroSerieEquipamento" name="numeroSerieEquipamento">
                                <option>Selecione um Equipamento</option>
                                <?php
                                require_once './ext/conexao.php';
                                global $conn;
                                $sql = "SELECT * FROM equipamento";
                                $resultado = mysqli_query($conn, $sql);
                                while ($dados = mysqli_fetch_array($resultado)) {
                                    ?>
                                <option value="<?php echo $dados['equiNumeroSerie']; ?>"><?php echo $dados['equiNumeroSerie']; ?></option>
                                    <?php
                                }
                                ?>                           
                            </select>
                        </div>

                        <div class="input-field col s12 m12 l4">
                            <select id="status" name="status">
                                <option>Aberto</option> 
                                <option>Fechado</option> 
                            </select>
                        </div>
                    </div>

                    <div class="row center">
                        <div class="input-field col s12">
                            <input type="hidden" name="id" value="<?php echo $dadosChamado['chaId']; ?>">                        
                        </div>
                        <button class="btn waves-effect waves-light btn-color" type="submit" name="atualizaChamado" onclick="return validaChamado();">Enviar
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