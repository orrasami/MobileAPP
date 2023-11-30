<?php require_once("../_db/conexao_inaflex_pedidos.php"); ?>

<?php
    session_start();

    if (isset($_SESSION["usuario_sessao"])) {
    } else {
        header("location:../index.php");
    }

    date_default_timezone_set('America/Sao_Paulo');
    $retorno = array();

    if($_POST["lote"] != "") {
        $lote      = $_POST["lote"];

        $pegar_dados_cliente  ="SELECT finalizado FROM inspecao_final ";
        $pegar_dados_cliente .="WHERE lote ='{$lote}' ";
        
        $acesso = mysqli_query($conecta, $pegar_dados_cliente);
        $informacao = mysqli_fetch_assoc($acesso);
        
        if($informacao) {
            $finalizado = $informacao["finalizado"];
            if($finalizado == "0"){
                $retorno["finalizado"] = "Relatorio aberto";
            } else {
                $retorno["finalizado"] = "Relatorio finalizado";
            }
        } else {
            $retorno["finalizado"] = "Relatorio nao existe";
        }
    } else {
        $retorno["finalizado"] = "Digitar um lote";
    }

    echo json_encode($retorno);
?>