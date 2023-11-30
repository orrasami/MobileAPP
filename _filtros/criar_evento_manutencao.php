<?php require_once("../_db/conexao_inaflex.php"); ?>

<?php
    session_start();

    if (isset($_SESSION["usuario_sessao"])) {
    } else {
        header("location:../index.php");
    }

    date_default_timezone_set('America/Sao_Paulo');
    $retorno = array();

    if($_POST["descricao"] != "") {
        $tipo_evento    = 'MANUTENCAO - P1';
        $numOrc         = "";
        $numPed         = "";
        $pendencia      = 0;
        $ativo          = 1;
        $estagio        = 0;
        $usuario_logado = $_SESSION["nomeUsuario_sessao"];
        $descricao      = $_POST["descricao"];
        $logUsuario     = $_SESSION["nomeUsuario_sessao"];
        $agora          = date("Y-m-d h:i:s", time());

        $inserir_evento  = "INSERT INTO eventos  ";
        $inserir_evento .= "(tipoEvento, numPed, numOrc, usuario, estagio, logUsuario, logData, diretoria, pendencia, checklist, ativo, logEstagio1) ";
        $inserir_evento .= "VALUES ('MANUTENCAO - P1', '', '', 'RICARDO', 1, '{$usuario_logado}', '{$agora}', 0, 0, 'N/A', 1, '{$usuario_logado}') ";
        $filtro_inserir_evento = mysqli_query($conecta, $inserir_evento);

        $pegar_evento_id  ="SELECT eventoID FROM eventos ";
        $pegar_evento_id .="WHERE usuario='{$usuario_logado}' AND tipoEvento='MANUTENCAO - P1' AND estagio=1 AND logData='{$agora}' ";
        
        $acesso = mysqli_query($conecta, $pegar_evento_id);
        $informacao = mysqli_fetch_assoc($acesso);
        $eventoID = $informacao["eventoID"];
        
        $insere_comentario  = "INSERT INTO comentario ";
        $insere_comentario .= "(eventoID, comentario, logUsuario, logData) ";
        $insere_comentario .= "VALUES ({$eventoID}, '{$descricao}', '{$usuario_logado}', '{$agora}') ";
        $acesso = mysqli_query($conecta, $insere_comentario);
        
        $retorno["sucesso"] = true;
        $retorno["mensagem"] = "Criado evento numero: {$eventoID}";
    }

    echo json_encode($retorno);
?>