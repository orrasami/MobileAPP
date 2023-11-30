<?php require_once("_db/conexao_inaflex.php"); ?>

<?php
    ini_set('session.gc_maxlifetime', 4320000);
    ini_set('session.cookie_lifetime', 4320000);
    session_start();
    $_SESSION["usuario_sessao"] = null;

    if(isset($_POST["usuario"])){
        $usuario_login = $_POST["usuario"];
        $senha_login = $_POST["senha"];
        $formulario = $_POST["formulario"];
    
        $login ="SELECT * ";
        $login .="FROM usuarios ";
        $login .="WHERE nomeUsuario = '{$usuario_login}' AND senhaUsuario = '{$senha_login}' ";
        
        $acesso = mysqli_query($conecta, $login);
        if (!$acesso) {
            die("Falha no acesso ao LogIn");
        }
        
        $informacao = mysqli_fetch_assoc($acesso);
        if (empty($informacao)) {
            $menssagem = "Login sem sucesso";
        } else {
            $_SESSION["usuario_sessao"] = $informacao["usuarioID"];
            $_SESSION["nomeUsuario_sessao"] = $informacao["nomeUsuario"];
            $_SESSION["ativo_sessao"] = $informacao["ativo"];
            $_SESSION["cad_usuario_sessao"] = $informacao["cadastroUsuario"];
            $_SESSION["cad_tipo_sessao"] = $informacao["cadastroTipoEvento"];
            $_SESSION["qqr_usuario_sessao"] = $informacao["qqrUsuario"];
            if ($formulario == "1") {
                header("location:qualidade_selecao.php");
            } else {
                header("location:manutencao.php");
            }
        }
    }
 ?>

<!doctype html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>INAFLEX - SII</title>
        
        <!-- estilo -->
        <link href="_css/inaflex_topo_rodape.css" rel="stylesheet">
        <link href="_css/inaflex_login.css" rel="stylesheet">
    </head>

    <body>
        <?php include_once("_incluir/topo.php"); ?>
        
        <main>  
            <div id="janela_login">
                <form action="index.php" method="post">
                    <h2>Login</h2>
                    <input type="text" name="usuario" id="log_usuario" placeholder="Usuario <?php echo     $_SESSION["usuario_sessao"] ?>">
                    <input type="password" name="senha" id="log_senha" placeholder="Senha">
                    <div>
                        <div class="radio">
                            <label for="qualidade">Qualidade</label>
                            <input type="radio" name="formulario" value="1" id="qualidade">
                            <label for="manutencao">Manutencao</label>
                            <input type="radio" name="formulario" value="2" id="manutencao">
                        </div>
                    </div>
                    <h2></h2>
                    <div>
                        <input type="submit" value="Login">
                    </div>
                    
                </form>
            </div>
        </main>
        
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>