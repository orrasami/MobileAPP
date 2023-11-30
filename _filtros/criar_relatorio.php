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
        $usuario_logado = $_SESSION["nomeUsuario_sessao"];
        $correto        = "SIM";
        if($_POST["status"] == "FINALIZADO"){
            $finalizado = "1";
        } else {
            $finalizado = "0";
        }
        
        $pedido         = $_POST["pedido"];
        $cliente        = $_POST["cliente"];
        $cnpj           = $_POST["cnpj"];
        $exigencias     = $_POST["exigencias"];
        $lote           = $_POST["lote"];
        $h_inicial      = $_POST["h_inicial"];
        $h_final        = $_POST["h_final"];
        $data           = $_POST["data"];
        if(isset($_POST["empatacao"])){
            $empatacao = $_POST["empatacao"];
        } else {
            $retorno["mensagem"] = "Falta informação sobre guarnição";
            $empatacao = "0";
            $correto = "NAO";
        }

        $encaixe_obs = $_POST["encaixe_obs"];
        if(isset($_POST["encaixe"])){
            $encaixe = $_POST["encaixe"];
            if($encaixe == "4"){
                if($encaixe_obs == ""){
                    $correto = "NAO";
                }
            }
        } else {
            $retorno["mensagem"] = "Falta informação sobre encaixe";
            $encaixe = "0";
            $correto = "NAO";
        }

        $solda_obs = $_POST["solda_obs"];
        if(isset($_POST["solda"])){
            $solda = $_POST["solda"];
            if($solda == "4"){
                if($solda_obs == ""){
                    $correto = "NAO";
                }
            }
        } else {
            $retorno["mensagem"] = "Falta informação sobre solda";
            $solda = "0";
            $correto = "NAO";
        }

        $cordoalha_obs = $_POST["cordoalha_obs"];
        if(isset($_POST["cordoalha"])){
            $cordoalha = $_POST["cordoalha"];
            if($cordoalha == "4"){
                if($cordoalha_obs == ""){
                    $correto = "NAO";
                }
            }
        } else {
            $retorno["mensagem"] = "Falta informação sobre cordoalha";
            $cordoalha = "0";
            $correto = "NAO";
        }

        $tipado_obs = $_POST["tipado_obs"];
        if(isset($_POST["tipado"])){
            $tipado = $_POST["tipado"];
            if($tipado == "4"){
                if($tipado_obs == ""){
                    $correto = "NAO";
                }
            }
        } else {
            $retorno["mensagem"] = "Falta informação sobre tipagem";
            $tipado = "0";
            $correto = "NAO";
        }

        $tag_obs = $_POST["tag_obs"];
        if(isset($_POST["tag"])){
            $tag = $_POST["tag"];
            if($tag == "4"){
                if($tag_obs == ""){
                    $correto = "NAO";
                }
            }
        } else {
            $retorno["mensagem"] = "Falta informação sobre tag";
            $tag = "0";
            $correto = "NAO";
        }
        $tag_num = $_POST["tag_numero"];

        $cola_obs = $_POST["cola_obs"];
        if(isset($_POST["cola"])){
            $cola = $_POST["cola"];
            if($cola == "4"){
                if($cola_obs == ""){
                    $correto = "NAO";
                }
            }
        } else {
            $retorno["mensagem"] = "Falta informação sobre cola";
            $cola = "0";
            $correto = "NAO";
        }

        $pead_obs = $_POST["pead_obs"];
        if(isset($_POST["pead"])){
            $pead = $_POST["pead"];
            if($pead == "4"){
                if($pead_obs == ""){
                    $correto = "NAO";
                }
            }
        } else {
            $retorno["mensagem"] = "Falta informação sobre pead";
            $pead = "0";
            $correto = "NAO";
        }

        $corda_obs = $_POST["corda_obs"];
        if(isset($_POST["corda"])){
            $corda = $_POST["corda"];
            if($corda == "4"){
                if($corda_obs == ""){
                    $correto = "NAO";
                }
            }
        } else {
            $retorno["mensagem"] = "Falta informação sobre corda";
            $corda = "0";
            $correto = "NAO";
        }
        $corda_cor = $_POST["corda_cor"];

        $silicone_obs = $_POST["silicone_obs"];
        if(isset($_POST["silicone"])){
            $silicone = $_POST["silicone"];
            if($silicone == "4"){
                if($silicone_obs == ""){
                    $correto = "NAO";
                }
            }
        } else {
            $retorno["mensagem"] = "Falta informação sobre silicone";
            $silicone = "0";
            $correto = "NAO";
        }

        $cupilha_obs = $_POST["cupilha_obs"];
        if(isset($_POST["cupilha"])){
            $cupilha = $_POST["cupilha"];
            if($cupilha == "4"){
                if($cupilha_obs == ""){
                    $correto = "NAO";
                }
            }
        } else {
            $retorno["mensagem"] = "Falta informação sobre cupilha";
            $cupilha = "0";
            $correto = "NAO";
        }

        $drenado_obs = $_POST["drenado_obs"];
        if(isset($_POST["drenado"])){
            $drenado = $_POST["drenado"];
            if($drenado == "4"){
                if($drenado_obs == ""){
                    $correto = "NAO";
                }
            }
        } else {
            $retorno["mensagem"] = "Falta informação sobre dreno";
            $drenado = "0";
            $correto = "NAO";
        }

        $plaqueta_obs = $_POST["plaqueta_obs"];
        if(isset($_POST["plaqueta"])){
            $plaqueta = $_POST["plaqueta"];
            if($plaqueta == "4"){
                if($plaqueta_obs == ""){
                    $correto = "NAO";
                }
            }
        } else {
            $retorno["mensagem"] = "Falta informação sobre plaqueta";
            $plaqueta = "0";
            $correto = "NAO";
        }

        $plaqueta_info_obs = $_POST["plaqueta_info_obs"];
        if(isset($_POST["plaqueta_info"])){
            $plaqueta_info = $_POST["plaqueta_info"];
            if($plaqueta_info == "4"){
                if($plaqueta_info_obs == ""){
                    $correto = "NAO";
                }
            }
        } else {
            $retorno["mensagem"] = "Falta informação sobre informações da plaqueta";
            $plaqueta_info = "0";
            $correto = "NAO";
        }

        $diametro_obs = $_POST["diametro_obs"];
        if(isset($_POST["diametro"])){
            $diametro = $_POST["diametro"];
            if($diametro == "4"){
                if(diametro_obs == ""){
                    $correto = "NAO";
                }
            }
        } else {
            $retorno["mensagem"] = "Falta informação sobre diametro";
            $diametro = "0";
            $correto = "NAO";
        }
        
        $etiquetas_obs = $_POST["etiquetas_obs"];
        if(isset($_POST["etiquetas"])){
            $etiquetas = $_POST["etiquetas"];
            if($etiquetas == "4"){
                if($etiquetas_obs == ""){
                    $correto = "NAO";
                }
            }
        } else {
            $retorno["mensagem"] = "Falta informação sobre etiqueta";
            $etiquetas = "0";
            $correto = "NAO";
        }
        
        $modelo_obs = $_POST["etiquetas_obs"];
        if(isset($_POST["modelo"])){
            $modelo = $_POST["modelo"];
            if($modelo == "4"){
                if(modelo_obs == ""){
                    $correto = "NAO";
                }
            }
        } else {
            $retorno["mensagem"] = "Falta informação sobre o modelo";
            $modelo = "0";
            $correto = "NAO";
        }
        
        $retrabalho_obs = $_POST["retrabalho_obs"];
        if(isset($_POST["retrabalho"])){
            $retrabalho = $_POST["retrabalho"];
            if($retrabalho == "4"){
                if($retrabalho_obs == ""){
                    $correto = "NAO";
                }
            }
        } else {
            $retorno["mensagem"] = "Falta informação sobre retrabalho";
            $retrabalho = "0";
            $correto = "NAO";
        }

        $data_armazenamento = $_POST["data_armazenamento"];

        $embalagem_obs = $_POST["embalagem_obs"];
        if(isset($_POST["embalagem"])){
            $embalagem = $_POST["embalagem"];
            if($embalagem == "4"){
                if($embalagem_obs == ""){
                    $correto = "NAO";
                }
            }
        } else {
            $retorno["mensagem"] = "Falta informação sobre embalagem";
            $embalagem = "0";
            $correto = "NAO";
        }

        $pregos_obs = $_POST["pregos_obs"];
        if(isset($_POST["pregos"])){
            $pregos = $_POST["pregos"];
            if($pregos == "4"){
                if($pregos_obs == ""){
                    $correto = "NAO";
                }
            }
        } else {
            $retorno["mensagem"] = "Falta informação sobre pregos";
            $pregos = "0";
            $correto = "NAO";
        }
        
        $falha_obs = $_POST["falha_obs"];
        if(isset($_POST["falha"])){
            $falha = $_POST["falha"];
            if($falha == "2"){
                if($falha_obs == ""){
                    $correto = "NAO";
                }
            }
        } else {
            $retorno["mensagem"] = "Falta informação sobre falha na inspeção";
            $falha = "0";
            $correto = "NAO";
        }
        
        $responsavel_obs = $_POST["responsavel_obs"];
        if(isset($_POST["responsavel"])){
            $responsavel = $_POST["responsavel"];
            if($responsavel == "2"){
                if($responsavel_obs == ""){
                    $correto = "NAO";
                }
            }
        } else {
            $retorno["mensagem"] = "Falta informação sobre o responsavel";
            $responsavel = "0";
            $correto = "NAO";
        }
        
        $qualidade_obs = $_POST["qualidade_obs"];
        $inspetor = $_POST["inspetor"];
        $data_inspecao = $_POST["data_inspecao"];

        $procura  ="SELECT lote FROM inspecao_final ";
        $procura .="WHERE lote ='{$lote}' ";
        $acesso = mysqli_query($conecta, $procura);
        $informacao = mysqli_fetch_assoc($acesso);

        if(isset($informacao)){

            $salvar  ="UPDATE inspecao_final  ";
            $salvar .="SET usuario_logado='{$usuario_logado}', correto='{$correto}', pedido='{$pedido}', ";
            $salvar .="cliente ='{$cliente}', cnpj ='{$cnpj}', exigencias='{$exigencias}', ";
            $salvar .="h_inicial ='{$h_inicial}', h_final ='{$h_final}', data='{$data}', ";
            $salvar .="empatacao ='{$empatacao}', encaixe ='{$encaixe}', encaixe_obs='{$encaixe_obs}', ";
            $salvar .="solda ='{$solda}', solda_obs ='{$solda_obs}', cordoalha='{$cordoalha}', ";
            $salvar .="cordoalha_obs ='{$cordoalha_obs}', tipado ='{$tipado}', tipado_obs='{$tipado_obs}', ";
            $salvar .="tag ='{$tag}', tag_obs ='{$tag_obs}', tag_num='{$tag_num}', ";
            $salvar .="cola ='{$cola}', cola_obs ='{$cola_obs}', pead='{$pead}', ";
            $salvar .="pead_obs ='{$pead_obs}', corda ='{$corda}', corda_obs='{$corda_obs}', ";
            $salvar .="corda_cor ='{$corda_cor}', silicone ='{$silicone}', silicone_obs='{$silicone_obs}', ";
            $salvar .="cupilha ='{$cupilha}', cupilha_obs ='{$cupilha_obs}', drenado='{$drenado}', ";
            $salvar .="drenado_obs ='{$drenado_obs}', plaqueta ='{$plaqueta}', plaqueta_obs='{$plaqueta_obs}', ";
            $salvar .="plaqueta_info ='{$plaqueta_info}', plaqueta_info_obs='{$plaqueta_info_obs}', ";
            $salvar .="diametro ='{$diametro}', diametro_obs ='{$diametro_obs}', etiquetas='{$etiquetas}', ";
            $salvar .="etiquetas_obs ='{$etiquetas_obs}', modelo ='{$modelo}', modelo_obs='{$modelo_obs}', ";
            $salvar .="retrabalho ='{$retrabalho}', retrabalho_obs ='{$retrabalho_obs}', ";
            $salvar .="data_armazenamento='{$data_armazenamento}', embalagem='{$embalagem}', ";
            $salvar .="embalagem_obs='{$embalagem_obs}', pregos='{$pregos}', pregos_obs='{$pregos_obs}', ";
            $salvar .="falha='{$falha}', falha_obs='{$falha_obs}', responsavel='{$responsavel}', ";
            $salvar .="responsavel_obs='{$responsavel_obs}', qualidade_obs='{$qualidade_obs}', ";
            $salvar .="inspetor ='{$inspetor}', data_inspecao ='{$data_inspecao}', finalizado ='{$finalizado}' ";
            $salvar .="WHERE lote ='{$lote}' ";
            $acesso = mysqli_query($conecta, $salvar);

        }   else {
            $salvar  ="INSERT INTO inspecao_final ";
            $salvar .="(usuario_logado, correto, pedido, ";
            $salvar .="cliente, cnpj, exigencias, lote,";
            $salvar .="h_inicial, h_final, data, ";
            $salvar .="empatacao, encaixe, encaixe_obs, ";
            $salvar .="solda, solda_obs, cordoalha, ";
            $salvar .="cordoalha_obs, tipado, tipado_obs, ";
            $salvar .="tag, tag_obs, tag_num, ";
            $salvar .="cola, cola_obs, pead, ";
            $salvar .="pead_obs, corda, corda_obs, ";
            $salvar .="corda_cor, silicone, silicone_obs, ";
            $salvar .="cupilha, cupilha_obs, drenado, ";
            $salvar .="drenado_obs, plaqueta, plaqueta_obs, ";
            $salvar .="plaqueta_info, plaqueta_info_obs, ";
            $salvar .="diametro, diametro_obs, etiquetas, ";
            $salvar .="etiquetas_obs, modelo, modelo_obs, ";
            $salvar .="retrabalho, retrabalho_obs, ";
            $salvar .="data_armazenamento, embalagem, ";
            $salvar .="embalagem_obs, pregos, pregos_obs, ";
            $salvar .="falha, falha_obs, responsavel, ";
            $salvar .="responsavel_obs, qualidade_obs, ";
            $salvar .="inspetor, data_inspecao, finalizado) ";
            $salvar .="VALUE ";
            $salvar .="('{$usuario_logado}', '{$correto}', '{$pedido}', ";
            $salvar .="'{$cliente}', '{$cnpj}', '{$exigencias}', '{$lote}', ";
            $salvar .="'{$h_inicial}', '{$h_final}', '{$data}', ";
            $salvar .="'{$empatacao}', '{$encaixe}', '{$encaixe_obs}', ";
            $salvar .="'{$solda}', '{$solda_obs}', '{$cordoalha}', ";
            $salvar .="'{$cordoalha_obs}', '{$tipado}', '{$tipado_obs}', ";
            $salvar .="'{$tag}', '{$tag_obs}', '{$tag_num}', ";
            $salvar .="'{$cola}', '{$cola_obs}', '{$pead}', ";
            $salvar .="'{$pead_obs}', '{$corda}', '{$corda_obs}', ";
            $salvar .="'{$corda_cor}', '{$silicone}', '{$silicone_obs}', ";
            $salvar .="'{$cupilha}', '{$cupilha_obs}', '{$drenado}', ";
            $salvar .="'{$drenado_obs}', '{$plaqueta}', '{$plaqueta_obs}', ";
            $salvar .="'{$plaqueta_info}', '{$plaqueta_info_obs}', ";
            $salvar .="'{$diametro}', '{$diametro_obs}', '{$etiquetas}', ";
            $salvar .="'{$etiquetas_obs}', '{$modelo}', '{$modelo_obs}', ";
            $salvar .="'{$retrabalho}', '{$retrabalho_obs}', ";
            $salvar .="'{$data_armazenamento}', '{$embalagem}', ";
            $salvar .="'{$embalagem_obs}', '{$pregos}', '{$pregos_obs}', ";
            $salvar .="'{$falha}', '{$falha_obs}', '{$responsavel}', ";
            $salvar .="'{$responsavel_obs}', '{$qualidade_obs}', ";
            $salvar .="'{$inspetor}', '{$data_inspecao}', '{$finalizado}') ";
            $acesso = mysqli_query($conecta, $salvar);
        }

        if($correto == "SIM") {
        $retorno["mensagem"] = "Atualizado com sucesso";
    }
        echo json_encode($retorno);
    }
?>