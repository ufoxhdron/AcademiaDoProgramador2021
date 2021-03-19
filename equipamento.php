<?php
session_start();
if (!isset($_SESSION['cpf'])) {
    header("Location: login.php");
} else {
    ?>
    <div class="row container">
        <div class="col s12 m12 l9 center offset-l1">
            <form method="post" action="index.php?page=equipamento_acao&acao=incluir" name="form_equip" class="cotacao-form center">
                <fieldset class="borda-form">
                    <legend class="legend">Dados do Equipamentos</legend>             

                    <!-- Inicio Dados Origem --> 
                    <div class="row center">
                        <div class="input-field col s12 m12 l5">
                            <input id="numeroSerie" type="text" name="numeroSerie" autocomplete="off" maxlength="10">
                            <label for="numeroSerie">Número de Série</label>
                            <span class="helper-text" data-error="Inválida" data-success="Válida"></span>
                        </div>                         

                        <div class="input-field col s12 m12 l5">
                            <input id="fabricante" type="text" name="fabricante">
                            <label for="fabricante">Fabricante</label>
                            <span class="helper-text" data-error="Inválida" data-success="Válida"></span>
                        </div>                                     
                    </div>

                    <div class="input-field col s12 m12 l7">
                        <input id="nome" type="text" name="nome">
                        <label for="nome">Nome</label>
                        <span class="helper-text" data-error="Inválida" data-success="Válida"></span>
                    </div>

                    <div class="row center">
                        <div class="input-field col s12 m12 l5">
                            <input id="dataFabricacao" type="date" name="dataFabricacao">
                            <label for="dataFabricacao">Data Fabricação</label>
                            <span class="helper-text" data-error="Inválida" data-success="Válida"></span>
                        </div>
                    </div>

                    <div class="row center">
                        <div class="input-field col s12 m12 l4">
                            <input id="valor" type="text" name="valor" autocomplete="off" maxlength="15">
                            <label for="valor">Valor do Equipamento</label>
                            <span class="helper-text" data-error="Inválida" data-success="Válida"></span>
                        </div>
                    </div>

                    <div class="row center">
                        <button class="btn waves-effect waves-light btn-color" type="submit" name="dadoEquipamento" onclick="return valida();">Enviar
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