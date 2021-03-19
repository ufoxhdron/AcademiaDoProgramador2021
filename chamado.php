<?php
session_start();
if (!isset($_SESSION['cpf'])) {
    header("Location: login.php");
} else {
    ?>
    <div class="row container">
        <div class="col s12 m12 l9 center offset-l1">
            <form method="post" action="index.php?page=chamado_acao&acao=incluir" name="form_chamado" class="cotacao-form center">
                <fieldset class="borda-form">
                    <legend class="legend">Dados de Chamados</legend>             

                    <!-- Inicio Dados Origem --> 
                    <div class="row center">
                        <div class="input-field col s12 m12 l5">
                            <input id="titulo" type="text" name="titulo" autocomplete="off" maxlength="30" data-lenght="30">
                            <label for="titulo">Título</label>
                            <span class="helper-text" data-error="Inválida" data-success="Válida"></span>
                        </div>  

                        <div class="input-field col s12 m12 l7">
                            <textarea id="descricao" name="descricao" class="materialize-textarea" maxlength="140" data-length="140"></textarea>
                            <label for="descricao">Descrição</label>
                        </div>                                     
                    </div>

                    <div class="row center">
                        <div class="input-field col s12 m12 l5">
                            <?php
                            $dataAtual = date_default_timezone_set('America/Sao_Paulo');
                            $dataAtual = date("Y-m-d");
                            ?>
                            <input id="dataAbertura" type="date" name="dataAbertura" value="<?php echo $dataAtual; ?>">
                            <label for="dataAbertura">Data Abertura</label>
                            <span class="helper-text" data-error="Inválida" data-success="Válida"></span>
                        </div>

                        <div class="input-field col s12 m12 l2">
                        </div>
                        
                        <div class="input-field col s12 m12 l5">                           
                            <input id="dataFechamento" type="date" name="dataFechamento">
                            <label for="dataFechamento">Data fechamento</label>
                            <span class="helper-text" data-error="Inválida" data-success="Válida"></span>
                        </div>

                        <div class="input-field col s12 m12 l6">
                            <select id="numeroSerieEquipamento" name="numeroSerieEquipamento">
                                <option>Selecione um Equipamento</option>
                                <?php
                                require_once './ext/conexao.php';
                                global $conn;
                                $sql = "SELECT equiNumeroSerie FROM equipamento";
                                $resultado = mysqli_query($conn, $sql);
                                while ($dados = mysqli_fetch_array($resultado)) {
                                    ?>
                                    <option><?php echo $dados['equiNumeroSerie']; ?></option>
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
                        <button class="btn waves-effect waves-light btn-color" type="submit" name="dadoChamado" onclick="return validaChamado();">Enviar
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