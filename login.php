<!DOCTYPE html>
<html>
    <head>
        <title>Acessar Sistema</title>
        <meta charset="UTF-8">
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="css/face.css" rel="stylesheet" type="text/css"/>
        <script src="js/valida.js" type="text/javascript"></script> 
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body class="corpo">
        <div class="row center login">
            <form method="POST" action="valida.php" name="form_login">
                <div class="col s12 m10 l3 push-l4 center">
                    <fieldset>
                        <legend class="center">Acesso ao Sistema</legend>
                        <div class="row">
                            <div class="input-field col s10 m12 l12">
                                <i class="material-icons prefix">folder_shared</i>
                                <input placeholder="CPF" id="cpf" name="cpf" type="text" maxlength="11" autocomplete="off" onblur="return VerificaCPF();" class="validate">
                                <label for="cpf"></label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s10 m12 l12">
                                <i class="material-icons prefix">lock</i>
                                <input placeholder="Senha" id="senha" name="senha" type="password" class="validate">
                                <label for="senha"></label>
                            </div>
                        </div> 

                        <div class="row">
                            <div class="input-field col s12 m12 l12">    
                                <button class="btn waves-effect waves-light col s12 m12 l12 btn-color" type="submit" id="validaUsuario" name="validaUsuario" onclick="return VerificaCPF();">Entrar
                                    <i class="material-icons right">send</i>
                                </button>                                                       
                            </div>
                        </div>
                    </fieldset>
                </div>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="js/valida.js" type="text/javascript"></script>
    </body>
</html>