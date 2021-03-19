<?php
session_start();
if (!isset($_SESSION['cpf'])) {
    header("Location: login.php");
} else {
    require_once './ext/conexao.php';
    ?>
    <table class="responsive-table centered striped">   
        <thead>
            <h5 class="center">Equipamentos</h5><br><br>
            <tr>
                <th>Nome</th>
                <th>Número Série</th>
                <th>Fabricante</th>                
                <th>Alterar</th>
                <th>Excluir</th>
            </tr>
        </thead>

        <tbody>
            <?php
            global $conn;
            $sql = "SELECT * FROM equipamento";
            $resultado = mysqli_query($conn, $sql);
            while ($dados = mysqli_fetch_array($resultado)) {
                ?>
                <tr>
                    <td><?php echo $dados['equiNome']; ?></td>
                    <td><?php echo $dados['equiNumeroSerie']; ?></td>
                    <td><?php echo $dados['equiFabricante']; ?></td>                    
                    <td>
                        <a href="index.php?page=equipamento_editar&acao=alterar&id=<?php echo $dados['equiNumeroSerie']; ?>" class="btn-floating orange modal-trigger">
                            <i class="material-icons">edit</i></a>
                    </td>

                    <td>
                        <a href="#modal<?php echo $dados['equiNumeroSerie']; ?>" class="btn-floating red modal-trigger font">
                            <i class="material-icons">delete</i></a>
                    </td> 
                    <!-- Modal Structure -->
            <div id="modal<?php echo $dados['equiNumeroSerie']; ?>" class="modal font">
                <div class="modal-content font">
                    <h4>Cuidado!</h4>
                    <p>Tem certeza que deseja excluir este registro?</p>
                </div>

                <div class="modal-footer">                    
                    <form action="index.php?page=equipamento_acao&acao=excluir" method="POST">
                        <input type="hidden" name="id" value="<?php echo $dados['equiNumeroSerie']; ?>">                        
                        <button class="btn btn-color" name="btn-deletar">Sim, quero deletar</button>
                        <a href="#!" class="btn modal-close btn-color">Cancelar</a>		
                    </form>                    
                </div>
                </tr>
            <?php } ?>
            </tbody>
    </table>
    <?php
} 
