<?php require_once("../_db/conexao_inaflex_pedidos.php"); ?>

<?php
    session_start();

    if (isset($_SESSION["usuario_sessao"])) {
    } else {
        header("location:../index.php");
    }

    date_default_timezone_set('America/Sao_Paulo');
    $retorno = array();

    if($_POST["pedido"] != "") {
        $usuario_logado = $_SESSION["nomeUsuario_sessao"];
        $pedido      = $_POST["pedido"];

        $pegar_dados_cliente  ="SELECT cliente, cnpj, obs_cliente FROM pedidos ";
        $pegar_dados_cliente .="WHERE pedido ='{$pedido}' ";
        
        $acesso = mysqli_query($conecta, $pegar_dados_cliente);
        $informacao = mysqli_fetch_assoc($acesso);
        $cliente = $informacao["cliente"];
        $cnpj = $informacao["cnpj"];
        $exigencia = $informacao["obs_cliente"];
        
        $retorno["mensagem"] = "Favor Verificar!!!";
        $retorno["cliente"] = "{$cliente}";
        $retorno["cnpj"] = "{$cnpj}";
        $retorno["exigencia"] = "{$exigencia}";
    }

    echo json_encode($retorno);
?>