<?php require_once("../_db/conexao_inaflex_pedidos.php"); ?>

<?php
    session_start();

    if (isset($_SESSION["usuario_sessao"])) {
    } else {
        header("location:../index.php");
    }

    date_default_timezone_set('America/Sao_Paulo');
    $retorno = array();

    if($_GET["lote"] != "") {
        $lote      = $_GET["lote"];

        $relatorio  ="SELECT * FROM inspecao_final ";
        $relatorio .="WHERE lote ='{$lote}' ";
        
        $acesso = mysqli_query($conecta, $relatorio);
        $informacao = mysqli_fetch_assoc($acesso);
        
        $retorno["finalizado"] = $informacao;
    }

    echo json_encode($retorno);
?>