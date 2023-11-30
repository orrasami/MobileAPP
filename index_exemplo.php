<?php require_once("_db/conexao_inaflex.php"); ?>

<?php
    session_start();

    if (isset($_SESSION["usuario_sessao"])) {
    } else {
        header("location:login.php");
    }

?>

<!-- PHP SELECT TABELA USUARIO ------------------------------------------------------------------------------ -->

<?php
    $select_usuario = "SELECT usuarioID, nomeUsuario, senhaUsuario, ativo ";
    $select_usuario .= "FROM usuarios ";
    $select_usuario .= "WHERE ativo = 1 ";
    $select_usuario .= "ORDER BY nomeUsuario ASC ";
    
$filtro_search_usuario = mysqli_query($conecta, $select_usuario);
    
    if(!$filtro_search_usuario){
        die("Falha Seleção do Usuario Search");
    }
?>

<?php
    $select_usuario = "SELECT usuarioID, nomeUsuario, senhaUsuario, ativo ";
    $select_usuario .= "FROM usuarios ";
    $select_usuario .= "WHERE ativo = 1";

    $filtro_inserir_usuario = mysqli_query($conecta, $select_usuario);
    
    if(!$filtro_inserir_usuario){
        die("Falha Seleção do Usuario Search");
    }
?>

<?php
    $select_usuario = "SELECT usuarioID, nomeUsuario, senhaUsuario, ativo ";
    $select_usuario .= "FROM usuarios ";
    $select_usuario .= "WHERE ativo = 1";

    $filtro_inserir_usuario2 = mysqli_query($conecta, $select_usuario);
    
    if(!$filtro_inserir_usuario2){
        die("Falha Seleção do Usuario Search");
    }
?>

<?php
    $select_usuario = "SELECT usuarioID, nomeUsuario, senhaUsuario, ativo ";
    $select_usuario .= "FROM usuarios ";
    $select_usuario .= "WHERE ativo = 1";

    $filtro_inserir_usuario3 = mysqli_query($conecta, $select_usuario);
    
    if(!$filtro_inserir_usuario3){
        die("Falha Seleção do Usuario Search");
    }
?>

<!-- PHP SELECT TABELA TIPO EVENTOS ------------------------------------------------------------------------------ -->
<?php
    $select_tipoEventos = "SELECT tipoEventosID, tipoEvento, ativo ";
    $select_tipoEventos .= "FROM tipoeventos ";
    $select_tipoEventos .= "WHERE ativo = 1";

    $filtro_tipoEventos = mysqli_query($conecta, $select_tipoEventos);

    if(!$filtro_tipoEventos){
        die("Falha Seleção dos Tipos de Eventos");
    }
?>

<?php
    $select_tipoEventos = "SELECT tipoEventosID, tipoEvento, ativo ";
    $select_tipoEventos .= "FROM tipoeventos ";
    $select_tipoEventos .= "WHERE ativo = 1";

    $filtro_inserir_tipoEventos = mysqli_query($conecta, $select_tipoEventos);

    if(!$filtro_inserir_tipoEventos){
        die("Falha Seleção dos Tipos de Eventos");
    }
?>

<?php
    $select_tipoEventos = "SELECT tipoEventosID, tipoEvento, ativo ";
    $select_tipoEventos .= "FROM tipoeventos ";
    $select_tipoEventos .= "WHERE ativo = 1";

    $filtro_inserir_workflow = mysqli_query($conecta, $select_tipoEventos);

    if(!$filtro_inserir_workflow){
        die("Falha Seleção dos Tipos de Eventos");
    }
?>

<?php
    $select_tipoEventos = "SELECT tipoEventosID, tipoEvento, ativo ";
    $select_tipoEventos .= "FROM tipoeventos ";
    $select_tipoEventos .= "WHERE ativo = 1";

    $filtro_inserir_workflow2 = mysqli_query($conecta, $select_tipoEventos);

    if(!$filtro_inserir_workflow2){
        die("Falha Seleção dos Tipos de Eventos");
    }
?>



















<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>INAFLEX - SII</title>
        
        <link href="_css/inaflex_estilo.css" rel="stylesheet">
        <link href="_css/inaflex_estilo_mobile.css" rel="stylesheet">
        <link href="_css/chosen.css" rel="stylesheet">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <script src="_js/jquery-3.5.0.min.js"></script>
        <script src="_js/chosen.jquery.js"></script>
        <script src="_js/jquery.maskedinput.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script>
            var $evento_ID = "";
            var $titulo_comentario = "";

//BOTÃO CLEAR PESQUISA------------------------------------------------------------------
            function apagarPesquisa(){
                document.getElementById('search_evento').value = "";
                document.getElementById('search_orcamento').value = "";
                document.getElementById('search_pedido').value = "";
                document.getElementById('data_evento').value = "";
                document.getElementById('search_usuario').value = "";
                $("#search_usuario").trigger("chosen:updated");
                document.getElementById('search_tipo_evento').value = "";
                $("#search_tipo_evento").trigger("chosen:updated");
                $("#search_diretoria").prop("checked",false);
                $("#search_finalizados").prop("checked",false);
                $("#serach_meu_evento").prop("checked",false);
                $("#serach_pend_minha").prop("checked",false);
                $("#search_pendencia").prop("checked",false);
            }

//BOTÃO LOGOUT------------------------------------------------------------------
            function logOut(){
                window.location.href = "logout.php";
            }
            
        
//BOTÕES PARA MOSTRAR JANELAS        
            function mostrarCadastroEventos() {
                $('#janela_inserir').slideDown();
                $('#janela_botoes').slideUp();
                $('#janela_input').slideUp();
                $('#janela_comentarios').slideUp();
                $('#janela_checklist').slideUp();
            }

            function mostrarCadastroComentarios() {
                $('#janela_input').slideDown();
                $('#janela_inserir').slideUp();
                $('#janela_botoes').slideUp();
                $('#janela_comentarios').slideUp();
                $('#janela_checklist').slideUp();
            }
        
            function mostrarComentarios() {
                $('#janela_comentarios').slideDown();
                $('#janela_inserir').slideUp();
                $('#janela_botoes').slideUp();
                $('#janela_input').slideUp();
                $('#janela_checklist').slideUp();
            }
        
            function mostrarPesquisa() {
                $('#janela_botoes').slideDown();
                $('#janela_inserir').slideUp();
                $('#janela_input').slideUp();
                $('#janela_comentarios').slideUp();
                $('#janela_checklist').slideUp();
            }
            
            function mostrarCheckList() {
                if (document.getElementById('mem_evento_ID').value != 0 && document.getElementById('mem_evento_ID').value != "" && document.getElementById('mem_evento_checklist').value != "N/A") {
                    $('#janela_checklist').slideDown();
                    $('#janela_inserir').slideUp();
                    $('#janela_botoes').slideUp();
                    $('#janela_input').slideUp();
                    $('#janela_comentarios').slideUp();
                }
            }

//BOTÕES DO MENU
            function mostrarJanelaEventos() {
                $('#corpo_eventos').slideDown();
                $('#corpo_cadastro_usuarios').slideUp();
                $('#corpo_cadastro_tipo_eventos').slideUp();
                $('#corpo_cadastro_workflow').slideUp();
                $('#menu_mobile').slideUp();

            }
            
            function mostrarJanelaCadastroUsuarios() {
                $direito = "<?php echo $_SESSION["cad_usuario_sessao"]; ?>";
                if($direito == 1){
                    $('#corpo_eventos').slideUp();
                    $('#corpo_cadastro_usuarios').slideDown();
                    $('#corpo_cadastro_tipo_eventos').slideUp();
                    $('#corpo_cadastro_workflow').slideUp();
                    $('#menu_mobile').slideUp();
                }
            }
            
            function mostrarJanelaCadastroTipoEvento() {
                $direito = "<?php echo $_SESSION["cad_tipo_sessao"]; ?>";
                if($direito == 1){
                    $('#corpo_eventos').slideUp();
                    $('#corpo_cadastro_usuarios').slideUp();
                    $('#corpo_cadastro_tipo_eventos').slideDown();
                    $('#corpo_cadastro_workflow').slideUp();
                    $('#menu_mobile').slideUp();
                }
            }
        
            function mostrarJanelaCadastroWorkflow() {
                $direito = "<?php echo $_SESSION["cad_tipo_sessao"]; ?>";
                if($direito == 1){
                    $('#corpo_eventos').slideUp();
                    $('#corpo_cadastro_usuarios').slideUp();
                    $('#corpo_cadastro_tipo_eventos').slideUp();
                    $('#corpo_cadastro_workflow').slideDown();
                    $('#menu_mobile').slideUp();
                }
            }

//BOTÃO APAGAR CADASTRO DE USUARIOS
            function apagarSelecaoCadastroUsuario() {
                        document.getElementById('cadastro_usuarioID').value = "";
                        document.getElementById('cadastro_nome_usuario').value = "";
                        document.getElementById('cadastro_password1').value = "";
                        document.getElementById('cadastro_password2').value = "";
                        $("#cadastro_novo_ativo").prop("checked",false);
                        $("#cadastro_novo_usuario").prop("checked",false);
                        $("#cadastro_novo_tipo_evento").prop("checked",false);
                        $("#cadastro_novo_qqr_usuario").prop("checked",false);
            }
            
//BOTÃO APAGAR CADASTRO DE TIPO DE EVENTO
            function apagarSelecaoCadastroTipoEvento() {
                $("#cadastro_tipo_ativo").prop("checked",false);
                $("#cadastro_tipo_diretoria").prop("checked",false);
                document.getElementById('cadastro_tipo_evento').value = "";
                document.getElementById('cadastro_tipo_eventoID').value = "";
                document.getElementById('novo_tipo_check').value = "";
                
            }



//COLOCAR ENTER NO COMENTARIO----------------------------------------------------------------------------------------------------
            function onTestChange() {
                var key = window.event.keyCode;

                // If the user has pressed enter
                if (key === 13) {
                    document.getElementById("novo_comentario").value = document.getElementById("novo_comentario").value + "<br>";
                    return false;
                }
                else {
                    return true;
                }
            } 
        

        </script>
    </head>

    <body>
        <?php include_once("_incluir/topo.php"); ?>
        <main>  
            <div id="corpo_eventos">
<!-- CAIXA EVENTOS ------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------>
                <div class="janela_conteudo" id="janela_lista">
                    <h3>LISTA DE EVENTOS</h3>
                    <div id="tabela_principal">
                        <div id="t_head">
                            <div>
                                <p class="T_ID">ID</p>
                                <p class="T_Ped"># Orç.</p>
                                <p class="T_Ped"># Ped.</p>
                                <p class="T_Usuario">Responsável</p>
                                <p class="T_Evento">Tipo de Evento</p>
                                <p class="T_ID">E.</p>
                                <p class="T_ID">Chk</p>
                            </div>
                        </div>
                        <div id="t_body">
                            <ol>
                            </ol>
                        </div>
                    </div>
                    <div id="lista_eventos_btn">
                        <input class="botao_padrao" type="button" value="HISTÓRICO" id="show_comentarios">
                        <input class="botao_padrao" type="button" value="PESQUISAR" id="show_pesquisa">
                        <input class="botao_padrao" type="button" value="CHECKLIST" id="show_checklist">
                        <input class="botao_padrao" type="button" value="CONCLUIR / DEVOLVER" id="show_cadastro_comentarios">
                        <input class="botao_padrao" type="button" value="CRIAR EVENTO" id="show_cadastro_eventos">
                    </div>
                    <div class="cola_eventos1">
                        <div id="mem_1">
                            <div>
                                <input type="text" id="mem_evento_ID">
                                <label for="mem_evento_ID">mem_evento_ID</label>
                            </div>
                            <div>
                                <input type="text" id="mem_evento_tipo">
                                <label for="mem_evento_tipo">mem_evento_tipo</label>
                            </div>
                            <div>
                                <input type="text" id="mem_evento_usuario">
                                <label for="mem_evento_usuario">mem_evento_usuario</label>
                            </div>
                            <div>
                                <input type="text" id="mem_evento_orcamento">
                                <label for="mem_evento_orcamento">mem_evento_orcamento</label>
                            </div>
                            <div>
                                <input type="text" id="mem_evento_pedido">
                                <label for="mem_evento_pedido">mem_evento_pedido</label>
                            </div>
                        </div>
                        <div id="mem_2">
                            <div>
                                <input type="text" id="mem_evento_pendencia">
                                <label for="mem_evento_pendencia">mem_evento_pendencia</label>
                            </div>
                            <div>
                                <input type="text" id="mem_evento_ativo">
                                <label for="mem_evento_ativo">mem_evento_ativo</label>
                            </div>
                            <div>
                                <input type="text" id="mem_evento_diretoria">
                                <label for="mem_evento_diretoria">mem_evento_diretoria</label>
                            </div>
                            <div>
                                <input type="text" id="mem_evento_checklist">
                                <label for="mem_evento_checklist">mem_evento_checklist</label>
                            </div>
                            <div>
                                <input type="text" id="mem_evento_log_usuario">
                                <label for="mem_evento_log_usuario">mem_evento_log_usuario</label>
                            </div>
                        </div>
                    </div>
                </div>
                
                
  
                
                
                
                
                
                
                
                
<!-- CAIXA HISTORICO DE COMENTARIOS --------------------------------------------------------------------------------------------------->
                <div class="janela_conteudo" id="janela_comentarios">
                    <h3 id="titulo_comentario">HISTÓRICO DO EVENTO</h3>
                    <div id="tabela_comentarios">
                        <div id="t_head">
                            <div>
                                <p class="T_C_Comentario">Comentario</p>
                                <p class="T_C_Usuario">Usuario</p>
                                <p class="T_C_Data">Data</p>
                            </div>
                        </div>
                        <div id="t_body">
                            <ol>
                            </ol>
                        </div>
                    </div>
                </div>
                
                
                
                
  
                
                
                
                
                
                
                
                
                
<!-- CAIXA PESQUISA -------------------------------------------------------------------------------------------------------------->
                <div class="janela_conteudo" id="janela_botoes">
                    <h3>PESQUISA</h3>
                    <form id="search_form">
                        <input class="input_padrao input_evento" type="text" name="search_evento" id="search_evento" placeholder="# Evento">
                        <input class="input_padrao input_pedido" type="text" name="search_orcamento" id="search_orcamento" placeholder="Orçamento">
                        <input class="input_padrao input_pedido" type="text" name="search_pedido" id="search_pedido" placeholder="Pedido">
                        <select data-placeholder="Selecione um Usuario" class="input_select" name="search_usuario" id="search_usuario">
                            <option disabled selected value>SELECIONAR USUARIO</option>
                            <?php
                                while($usuarios = mysqli_fetch_assoc($filtro_search_usuario)) {
                            ?>
                            <option value="<?php echo $usuarios["nomeUsuario"] ?>"><?php echo $usuarios["nomeUsuario"] ?></option>
                            <?php
                                }
                            ?>
                        </select>
                        <select class="input_select" name="search_tipo_evento" id="search_tipo_evento">
                            <option disabled selected value>TIPO DE EVENTO</option>
                            <?php
                                while($tipoEventos = mysqli_fetch_assoc($filtro_tipoEventos)) {
                            ?>
                            <option><?php echo $tipoEventos["tipoEvento"] ?></option>
                            <?php
                                }
                            ?>
                        </select>
                        <div>
                            <p>Ultima Alteração: <input type="text" id="data_evento" class="input_padrao"></p>
                        </div>
                        <div>
                            <div id="serach_btn_pend_minha">
                                <label for="serach_pend_minha">Minhas Pendencias</label>
                                <input class="input_padrao" type="checkbox" name="serach_pend_minha" id="serach_pend_minha">
                            </div>
                            <div id="serach_btn_diretoria">
                                <input class="input_padrao" type="checkbox" name="search_diretoria" id="search_diretoria" disabled>
                                <label for="search_diretoria">Diretoria</label> 
                            </div>
                        </div>
                        <div>
                            <div id="serach_btn_meu_evento">
                                <label for="serach_meu_evento">Meus Eventos</label>
                                <input class="input_padrao" type="checkbox" name="serach_meu_evento" id="serach_meu_evento">
                            </div>
                            <div id="serach_btn_finalizados">
                                <input class="input_padrao" type="checkbox" name="search_finalizados" id="search_finalizados">
                                <label for="search_finalizados">Finalizados</label>
                            </div>
                        </div>
                        <div>
                            <div id="search_btn_pendencia">
                                <label for="search_pendencia">Eventos Devolvidos</label>
                                <input class="input_padrao" type="checkbox" name="search_pendencia" id="search_pendencia">
                            </div>
                        </div>
                        <div id="search_btn_pesquisar_limpar">
                            <input class="botao_padrao" id="search_apagar" type="button" value="LIMPAR">
                            <input class="botao_padrao" id="search_enviar" type="submit" value="PESQUISAR">
                        </div>
                    </form>
                </div>
                
                
                
     
                

                
                
                
                
                
                
                
                
                
                
                

                
<!-- HTML CAIXA CHECKLIST ------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------>
                
                <div id="janela_checklist">
                <h3>CHECKLIST</h3>
                    <div class="janela_conteudo" id="janela_chk_1">
                        <form id="inserir_chk1" action="inserir_chk.php" method="post" enctype="multipart/form-data">
                            <div>
                                <div>
                                    <div class="label">
                                        <label for="docs">Documento</label>
                                    </div>
                                    <div class="radio">
                                        <input type="text" name="doc11" id="doc11">
                                        <input type="text" name="doc12" id="doc12">
                                        <input type="text" name="doc13" id="doc13">
                                        <input type="text" name="doc14" id="doc14">
                                        <input type="text" name="doc15" id="doc15">
                                        <input type="text" name="doc16" id="doc16">
                                        <input type="text" name="doc17" id="doc17">
                                        <input type="text" name="na_chk1" id="na_chk1" value="N/A" disabled>
                                    </div>
                                </div>
                                <div>
                                    <div class="label">
                                        <label for="chk1">Pedido Cliente</label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="chk1" value="1">
                                        <input type="radio" name="chk1" value="2">
                                        <input type="radio" name="chk1" value="3">
                                        <input type="radio" name="chk1" value="4">
                                        <input type="radio" name="chk1" value="5">
                                        <input type="radio" name="chk1" value="6">
                                        <input type="radio" name="chk1" value="7">
                                        <input type="radio" name="chk1" value="8">
                                    </div>
                                </div>
                                <div>
                                    <div class="label">
                                        <label for="chk2">Itens</label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="chk2" value="1">
                                        <input type="radio" name="chk2" value="2">
                                        <input type="radio" name="chk2" value="3">
                                        <input type="radio" name="chk2" value="4">
                                        <input type="radio" name="chk2" value="5">
                                        <input type="radio" name="chk2" value="6">
                                        <input type="radio" name="chk2" value="7">
                                        <input type="radio" name="chk2" value="8">
                                    </div>
                                </div>
                                <div>
                                    <div class="label">
                                        <label for="chk3">Condição de pagamento</label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="chk3" value="1">
                                        <input type="radio" name="chk3" value="2">
                                        <input type="radio" name="chk3" value="3">
                                        <input type="radio" name="chk3" value="4">
                                        <input type="radio" name="chk3" value="5">
                                        <input type="radio" name="chk3" value="6">
                                        <input type="radio" name="chk3" value="7">
                                        <input type="radio" name="chk3" value="8">
                                    </div>
                                </div>
                                <div>
                                    <div class="label">
                                        <label for="chk4">Frete (CIF/FOB)</label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="chk4" value="1">
                                        <input type="radio" name="chk4" value="2">
                                        <input type="radio" name="chk4" value="3">
                                        <input type="radio" name="chk4" value="4">
                                        <input type="radio" name="chk4" value="5">
                                        <input type="radio" name="chk4" value="6">
                                        <input type="radio" name="chk4" value="7">
                                        <input type="radio" name="chk4" value="8">
                                    </div>
                                </div>
                                <div>
                                    <div class="label">
                                        <label for="chk5">Prazo de Entrega</label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="chk5" value="1">
                                        <input type="radio" name="chk5" value="2">
                                        <input type="radio" name="chk5" value="3">
                                        <input type="radio" name="chk5" value="4">
                                        <input type="radio" name="chk5" value="5">
                                        <input type="radio" name="chk5" value="6">
                                        <input type="radio" name="chk5" value="7">
                                        <input type="radio" name="chk5" value="8">
                                    </div>
                                </div>
                                <div>
                                    <div class="label">
                                        <label for="chk6">Dados para Faturamento</label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="chk6" value="1">
                                        <input type="radio" name="chk6" value="2">
                                        <input type="radio" name="chk6" value="3">
                                        <input type="radio" name="chk6" value="4">
                                        <input type="radio" name="chk6" value="5">
                                        <input type="radio" name="chk6" value="6">
                                        <input type="radio" name="chk6" value="7">
                                        <input type="radio" name="chk6" value="8">
                                    </div>
                                </div>
                                <div>
                                    <div class="label">
                                        <label for="chk7">Dados para Entrega</label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="chk7" value="1">
                                        <input type="radio" name="chk7" value="2">
                                        <input type="radio" name="chk7" value="3">
                                        <input type="radio" name="chk7" value="4">
                                        <input type="radio" name="chk7" value="5">
                                        <input type="radio" name="chk7" value="6">
                                        <input type="radio" name="chk7" value="7">
                                        <input type="radio" name="chk7" value="8">
                                    </div>
                                </div>
                                <div>
                                    <div class="label">
                                        <label for="chk8">Orçamento Inaflex</label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="chk8" value="1">
                                        <input type="radio" name="chk8" value="2">
                                        <input type="radio" name="chk8" value="3">
                                        <input type="radio" name="chk8" value="4">
                                        <input type="radio" name="chk8" value="5">
                                        <input type="radio" name="chk8" value="6">
                                        <input type="radio" name="chk8" value="7">
                                        <input type="radio" name="chk8" value="8">
                                    </div>
                                </div>
                                <div>
                                    <div class="label">
                                        <label for="chk9">Solicitação do Cliente</label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="chk9" value="1">
                                        <input type="radio" name="chk9" value="2">
                                        <input type="radio" name="chk9" value="3">
                                        <input type="radio" name="chk9" value="4">
                                        <input type="radio" name="chk9" value="5">
                                        <input type="radio" name="chk9" value="6">
                                        <input type="radio" name="chk9" value="7">
                                        <input type="radio" name="chk9" value="8">
                                    </div>
                                </div>
                                <div>
                                    <div class="label">
                                        <label for="chk11">Cotação de Fornecedores</label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="chk11" value="1">
                                        <input type="radio" name="chk11" value="2">
                                        <input type="radio" name="chk11" value="3">
                                        <input type="radio" name="chk11" value="4">
                                        <input type="radio" name="chk11" value="5">
                                        <input type="radio" name="chk11" value="6">
                                        <input type="radio" name="chk11" value="7">
                                        <input type="radio" name="chk11" value="8">
                                    </div>
                                </div>
                                <div>
                                    <div class="label">
                                        <label for="chk12">Plaquetas</label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="chk12" value="1">
                                        <input type="radio" name="chk12" value="2">
                                        <input type="radio" name="chk12" value="3">
                                        <input type="radio" name="chk12" value="4">
                                        <input type="radio" name="chk12" value="5">
                                        <input type="radio" name="chk12" value="6">
                                        <input type="radio" name="chk12" value="7">
                                        <input type="radio" name="chk12" value="8">
                                    </div>
                                </div>
                                <div>
                                    <div class="label">
                                        <label for="chk13">Desenhos/Croquis</label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="chk13" value="1">
                                        <input type="radio" name="chk13" value="2">
                                        <input type="radio" name="chk13" value="3">
                                        <input type="radio" name="chk13" value="4">
                                        <input type="radio" name="chk13" value="5">
                                        <input type="radio" name="chk13" value="6">
                                        <input type="radio" name="chk13" value="7">
                                        <input type="radio" name="chk13" value="8">
                                    </div>
                                </div>
                                <div>
                                    <div class="label">
                                        <label for="chk14">Desvios</label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="chk14" value="1">
                                        <input type="radio" name="chk14" value="2">
                                        <input type="radio" name="chk14" value="3">
                                        <input type="radio" name="chk14" value="4">
                                        <input type="radio" name="chk14" value="5">
                                        <input type="radio" name="chk14" value="6">
                                        <input type="radio" name="chk14" value="7">
                                        <input type="radio" name="chk14" value="8">
                                    </div>
                                </div>
                                <div>
                                    <div class="label">
                                        <label for="chk10" style="margin-top:7px">Analise de Contrato</label>
                                    </div>
                                    <div class="radio">
                                        <input class="input_padrao" type="checkbox" name="chk10" id="chk10">
                                    </div>
                                </div>
                                <div id="contato_para_faturamento">
                                    <p>Contato para Faturamento</p>
                                    <div>
                                        <input class="input_padrao" type="text" name="contato_fat" id="contato_fat" placeholder="Nome">
                                        <input class="input_padrao" type="text" name="telefone_fat" id="telefone_fat" placeholder="Telefone">
                                        <input class="input_padrao" type="text" name="email_fat" id="email_fat" placeholder="E-mail">
                                    </div>
                                </div>
                            </div>
                            <input class="botao_padrao" type="button" value="APAGAR" id="apagar_chk1">
                            <input class="botao_padrao" type="submit" value="SALVAR" id="salvar_chk1">
                            <div class="cola_eventos3" id="mem_4">
                                <input type="text" id="chk1_inserir_eventoID" name="chk1_inserir_eventoID">
                                <label for="chk1_inserir_eventoID">chk1_inserir_eventoID</label>
                            </div>
                        </form>
                        <input type="text" id="mensagem_checklist">
                    </div>

                    <div class="janela_conteudo" id="janela_chk_2">
                        <form id="inserir_chk2">
                            <div>
                                <div>
                                    <div class="label">
                                        <label for="text">Documento</label>
                                    </div>
                                    <div class="radio">
                                        <input type="text" name="doc21" id="doc21">
                                        <input type="text" name="doc22" id="doc22">
                                        <input type="text" name="na_chk2" id="na_chk2" value="N/A" disabled>
                                    </div>
                                </div>
                                <div>
                                    <div class="label">
                                        <label for="chk15">Descrição Completa</label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="chk15" value="1">
                                        <input type="radio" name="chk15" value="2">
                                        <input type="radio" name="chk15" value="3">
                                    </div>
                                </div>
                                <div>
                                    <div class="label">
                                        <label for="chk16">Vinculo Cliente/Descrição</label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="chk16" value="1">
                                        <input type="radio" name="chk16" value="2">
                                        <input type="radio" name="chk16" value="3">
                                    </div>
                                </div>
                            </div>
                            <input class="botao_padrao" type="button" value="APAGAR" id="apagar_chk2">
                            <input class="botao_padrao" type="submit" value="SALVAR" id="salvar_chk2">
                            <div class="cola_eventos3" id="mem_5" style="width:400px">
                                <input type="text" id="chk2_inserir_eventoID" name="chk2_inserir_eventoID">
                                <label for="chk2_inserir_eventoID">chk2_inserir_eventoID</label>
                            </div>
                        </form>
                        <input type="text" id="mensagem_checklist2">
                    </div>

                    <div class="janela_conteudo" id="janela_chk_3">
                        <h3>Janela 3</h3>
                    </div>

                    <div class="janela_conteudo" id="janela_chk_4">
                        <h3>Janela 4</h3>
                    </div>

                    <div class="janela_conteudo" id="janela_chk_5">
                        <h3>Janela 5</h3>
                    </div>
                </div>


            
            
            
            

            
            
            
            
            
            
            
            
            
            
            
            
            
            
<!-- CAIXA NOVO COMENTARIO --------------------------------------------------------------------------------------------------------->
                <div class="janela_conteudo" id="janela_input">
                    <h3 id="titulo_novo_comentario">CONCLUIR / DEVOLVER</h3>
                    <form id="inserir_comentario">
<!Aqui maxlength>   <textarea name="novo_comentario" id="novo_comentario" maxlength="254" onkeypress="onTestChange();" required></textarea>
                        <div>

                            <div id="checkbox_diretoria">
                                <input class="input_padrao" type="checkbox" name="novo_diretoria" id="novo_diretoria">
                                <label for="novo_diretoria">Diretoria?</label>
                            </div>

                            <select class="input_select" name="novo_status" id="novo_status" required>
                                <option disabled selected value>SELECIONAR</option>
                                <option value="1">CONCLUIR ETAPA</option>
                                <option value="2">RETORNAR COMO PENDENCIA</option>
                            </select>

                            <input class="botao_padrao" type="submit" value="SALVAR" id="novo_botao">

                        
                        </div>
                        <div id="novo_comentario_btn_set_0">
                            <input type="text" class="input_padrao" name="novo_orcamento" id="novo_orcamento" placeholder="# Orçamento">
                            <input type="text" class="input_padrao" name="novo_pedido" id="novo_pedido" placeholder="# Pedido">
                            <div id="checkbox_finalizado">
                                <input class="input_padrao" type="checkbox" name="novo_finalizado" id="novo_finalizado" disabled>
                                <label for="novo_finalizado">Restrito</label>
                            </div>
                        </div>
                        <div id="novo_comentario_btn_set_1">
                            <input class="botao_padrao" type="button" value="ADOTAR" id="novo_adotar">
                            <input type="text" id="inserir_evento_mensagem" name="inserir_evento_mensagem">
                        </div>
                            
                            <div class="cola_eventos2" id="mem_3">
                                <input type="text" id="inserir_eventoID" name="inserir_eventoID">
                                <label for="inserir_eventoID">inserir_eventoID</label>
                            </div>
                    </form>
                </div>
                
                
                
  
                
                
                
                
                
                
                
                
                

            
<!-- CAIXA NOVO EVENTO --------------------------------------------------------------------------------------------------------------->
                <div class="janela_conteudo" id="janela_inserir">
                    <h3>CRIAR NOVO EVENTO</h3>
                    <form id="inserir_evento">
                        <div id="janela_inserir_form">
                            <input class="input_padrao input_pedido" type="text" name="inserir_orcamento" id="inserir_orcamento" placeholder="Orçamento" required>
                            <input class="input_padrao input_pedido" type="text" name="inserir_pedido" id="inserir_pedido" placeholder="Pedido">
                            <select class="input_select" name="inserir_tipo_evento" id="inserir_tipo_evento" required>
                                <option disabled selected value>TIPO DE EVENTO</option>
                                <?php
                                    while($tipoEventos = mysqli_fetch_assoc($filtro_inserir_tipoEventos)) {
                                ?>
                                <option><?php echo $tipoEventos["tipoEvento"] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div id="mensagem_criar_evento">
                            <p></p>
                        </div>
                        <input class="botao_padrao" type="submit" value="SALVAR" id="novo_botao2">
                    </form>
                </div>
             </div>
               

                
                
                
 
            
            
            
            
            
            
            
            
            
            
<!-- HTML CAIXA CADASTRO DE USUARIOS ------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------>
            
            <div id="corpo_cadastro_usuarios">
                <div class="janela_conteudo" id="janela_lista_usuarios">
                    <h3>CADASTRO DE USUARIOS</h3>

                    <div id="tabela_usuarios">
                        <div id="t_head">
                            <div>
                                <p class="TU_ID">ID</p>
                                <p class="TU_Usuario">Usuario</p>
                                <p class="TU_Ativo">Ativo?</p>
                                <p class="TU_CU">C.U</p>
                                <p class="TU_CT">C.T</p>
                                <p class="TU_QU">Q.U</p>
                            </div>
                        </div>
                        <div id="t_body">
                            <ol>
                            </ol>
                        </div>
                    </div>
                </div>
                
                
                
                
                
                <div class="janela_conteudo" id="janela_cadastrar_usuarios">
                    <h3>CADASTRO</h3>
                    <form id="cadastra_usuario">
                        <div>
                            <h3 id="janela_cadastrar_usuarios_h3">ID:</h3>
                            <input type="text" class="input_padrao" name="cadastro_usuarioID" id="cadastro_usuarioID">
                            <input type="text" class="input_padrao" name="cadastro_nome_usuario" id="cadastro_nome_usuario" placeholder="USUARIO">
                        </div>
                        <input type="password" class="input_padrao" name="cadastro_password1" id="cadastro_password1" placeholder="SENHA">
                        <input type="password" class="input_padrao" name="cadastro_password2" id="cadastro_password2" placeholder="CONFIRMAR SENHA">
                        <div>
                            <div>
                                <input class="input_padrao" type="checkbox" name="cadastro_novo_ativo" id="cadastro_novo_ativo">
                                <label for="cadastro_novo_ativo">Tornar Usuario Ativo?</label>
                            </div>
                            <div>
                                <input class="input_padrao" type="checkbox" name="cadastro_novo_usuario" id="cadastro_novo_usuario">
                                <label for="cadastro_novo_usuario">Permite Cadastro de Usuario?</label>
                            </div>
                            <div>
                                <input class="input_padrao" type="checkbox" name="cadastro_novo_tipo_evento" id="cadastro_novo_tipo_evento">
                                <label for="cadastro_novo_tipo_evento">Permite Cadastro de Tipo de Evento?</label>
                            </div>
                            <div>
                                <input class="input_padrao" type="checkbox" name="cadastro_novo_qqr_usuario" id="cadastro_novo_qqr_usuario">
                                <label for="cadastro_novo_qqr_usuario">Permite Alterar Comentario de Qualquer Usuario?</label>
                            </div>
                            <div id="btn_apagar_cadastro_usuario">
                                <input class="input_padrao" type="text" name="cadastro_usuario_mensagem" id="cadastro_usuario_mensagem">
                                <input class="botao_padrao" type="submit" value="SALVAR" id="salvar_cadastro_usuario">
                                <input class="botao_padrao" type="button" value="LIMPAR" id="apagar_formulario_cadastro_usuarios">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            

            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
<!-- HTML CAIXA CADASTRO DE TIPO DE EVENTOS ------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------>
            <div id="corpo_cadastro_tipo_eventos">
                <div class="janela_conteudo" id="janela_lista_tipo_eventos">
                    <h3>CADASTRO DE TIPO DE EVENTOS</h3>

                    
                    <div id="tabela_tipo_eventos">
                        <div id="t_head">
                            <div>
                                <p class="TT_ID">ID</p>
                                <p class="TT_Tipo">Tipo de Evento</p>
                                <p class="TT_Chk">C.List</p>
                                <p class="TT_Ativo">Ativo?</p>
                                <p class="TT_Ativo">Dir.?</p>
                            </div>
                        </div>
                        <div id="t_body">
                            <ol>
                            </ol>
                        </div>
                    </div>
                </div>

                
                
                
                
                
                
                
                
                
                
                
                
                
                
                <div class="janela_conteudo" id="janela_cadastrar_tipo_evento">
                    <h3>CADASTRO</h3>
                    <form id="cadastra_tipo_evento">
                        <div>
                            <h3 id="janela_cadastrar_tipo_evento_h3">ID:</h3>
                            <input type="text" class="input_padrao" name="cadastro_tipo_eventoID" id="cadastro_tipo_eventoID">
                            <input type="text" class="input_padrao" name="cadastro_tipo_evento" id="cadastro_tipo_evento" placeholder="TIPO DE EVENTO">
                        </div>
                        <div>
                            <div id="info_apagar_cadastro_tipo_evento_1">
                                <input class="input_padrao" type="number" name="novo_tipo_check" id="novo_tipo_check">
                                <label for="novo_tipo_check">Tipo de checagem</label>
                                <input class="input_padrao" type="checkbox" name="cadastro_tipo_ativo" id="cadastro_tipo_ativo">
                                <label for="cadastro_tipo_ativo">Tornar Ativo?</label>
                            </div>
                            <div id="info_apagar_cadastro_tipo_evento_2">
                                <input class="input_padrao" type="checkbox" name="cadastro_tipo_diretoria" id="cadastro_tipo_diretoria">
                                <label for="cadastro_tipo_diretoria">Diretoria?</label>
                            </div>
                            <div id="btn_apagar_cadastro_tipo_evento">
                                <input class="botao_padrao" type="submit" value="SALVAR" id="salvar_cadastro_tipo_evento">
                                <input class="botao_padrao" type="button" value="LIMPAR" id="apagar_formulario_cadastro_tipo_evento">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        
        
        
        
        
        

            
            
            
            
            
<!-- HTML CAIXA CADASTRO DE WORKFLOW ------------------------------------------------------------------------------------------>
<!----------------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------------------------->
            <div id="corpo_cadastro_workflow">
                <div class="janela_conteudo" id="janela_lista_workflow">
                    <h3>CADASTRO DE WORKFLOW</h3>

                    <select class="input_select" name="inserir_tipo_evento_workflow" id="inserir_tipo_evento_workflow"  onchange="refreshListaWorkflow()">
                        <?php
                            while($tipoEventos = mysqli_fetch_assoc($filtro_inserir_workflow)) {
                        ?>
                        <option><?php echo $tipoEventos["tipoEvento"] ?></option>
                        <?php
                            }
                        ?>
                    </select>

                    <div id="tabela_workflow">
                        <div id="t_head">
                            <div>
                                <p class="TW_ID">ID</p>
                                <p class="TW_Tipo">Tipo de Evento</p>
                                <p class="TW_Usuario">De Quem</p>
                                <p class="TW_Usuario">Para Quem</p>
                                <p class="TW_Estagio">I</p>
                                <p class="TW_Estagio">F</p>
                            </div>
                        </div>
                        <div id="t_body">
                            <ol>
                            </ol>
                        </div>
                    </div>
                </div>
                <div width="80%" style="margin-top:460px;margin-left:15px;margin-bottom:100px">
                    <p>REGRAS "DE QUEM":</p>
                    <p>1. DE QUEM - VAZIO: Qualquer usuario</p>
                    <p>2. DE QUEM - NÃO VAZIO: A regra aplica para esse usuario apenas. Pode ser criado a mesma regra com outros usuarios ou vazio para diferenciar</p>
                    <p>3. DE QUEM - NÃO VAZIO e I = -1: Apenas esse usuario pode criar o evento. Pode ser criado mais regras iguais para adicionar outros usuarios tambem.</p>
                    <p>REGRAS "PARA QUEM":</p>
                    <p>1. PARA QUEM - VAZIO: Volta para o usuario que criou o evento</p>
                    <p>2. PARA QUEM - NÃO VAZIO: Direciona para esse usuario</p>
                    <p>REGRAS "I":</p>
                    <p>1. Etapa inicial dessa regra. Ela atuará no evento quando o mesmo estiver na etapa com o mesmo valor.</p>
                    <p>REGRAS "F":</p>
                    <p>1. Próxima etapa dessa regra. Ao aplicar a regra o evento irá para a etapa conforme esse numero. Aqui pode-se se colocar o próximo numero para ir para a próxima etapa, ou pode colocar outro numero para pular alguma etapa.</p>
                    <p>ADOTAR</p>
                    <p>1. Regras para adotar são feitas apenas via acesso ao SQL na tabela "direitos"</p>
                </div>

                
                
                
                
                
                
                
                
                
                
                
                
                
                
                <div class="janela_conteudo" id="janela_cadastrar_workflow">
                    <h3>CADASTRO</h3>
                    <form id="cadastra_workflow">
                        <div>
                            <h3 id="janela_cadastrar_workflow_h3">ID:</h3>
                            <input type="text" name="janela_cadastrar_workflow_h3_valor" id="janela_cadastrar_workflow_h3_valor">
                            <div id="workflow_1">
                                <select class="input_select" name="inserir_tipo_evento_workflow_cad" id="inserir_tipo_evento_workflow_cad"  onchange="refreshListaWorkflow()">
                                    <option disabled selected value>SELECIONAR TIPO DE EVENTO</option>
                                    <?php
                                        while($tipoEventos = mysqli_fetch_assoc($filtro_inserir_workflow2)) {
                                    ?>
                                    <option><?php echo $tipoEventos["tipoEvento"] ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div id="workflow_2">
                                <select data-placeholder="Selecione um Usuario" class="input_select" name="search_usuario_cad_workflow_1" id="search_usuario_cad_workflow_1">
                                    <option disabled selected value>SELECIONAR USUARIO</option>
                                    <?php
                                        while($usuarios = mysqli_fetch_assoc($filtro_inserir_usuario2)) {
                                    ?>
                                    <option value="<?php echo $usuarios["nomeUsuario"] ?>"><?php echo $usuarios["nomeUsuario"] ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div id="workflow_3">
                            <select data-placeholder="Selecione um Usuario" class="input_select" name="search_usuario_cad_workflow_2" id="search_usuario_cad_workflow_2">
                                <option disabled selected value>SELECIONAR USUARIO</option>
                                <?php
                                    while($usuarios = mysqli_fetch_assoc($filtro_inserir_usuario3)) {
                                ?>
                                <option value="<?php echo $usuarios["nomeUsuario"] ?>"><?php echo $usuarios["nomeUsuario"] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                            </div>
                        </div>
                        <div>
                            <div id="info_apagar_cadastro_workflow">
                                <input class="input_padrao" type="number" name="passo_ini" id="passo_ini">
                                <label for="passo_ini">Passo Inicial</label>
                                <input class="input_padrao" type="number" name="passo_fim" id="passo_fim">
                                <label for="passo_fim">Passo Final</label>
                            </div>
                            <div id="btn_apagar_cadastro_workflow">
                                <input class="botao_padrao" type="submit" value="SALVAR" id="salvar_cadastro_workflow">
                                <input class="botao_padrao" type="button" value="LIMPAR" id="apagar_formulario_workflow">
                                <input class="botao_padrao" type="button" value="APAGAR" id="apagar_registro_workflow">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        
        </main>
        <?php include_once("_incluir/rodape.php"); ?>
        
        
       
        
        
        
 
        
        
        
        
        
        
        
        
        
        
        
        
        <script>

// JAVA CRIAR NOVO EVENTO ------------------------------------------------------------------------------------------------------------

            $('#inserir_evento').submit(function(e) {
                e.preventDefault();
                var formulario = $(this);
                var retono = inserirFormulario(formulario);
            });
        
            function inserirFormulario(dados) {
                $.ajax({
                    type:"POST",
                    data:dados.serialize(),
                    url:"_filtros/inserir_evento.php",
                    async:false
                }).then(sucesso,falha);

                function sucesso(data) {
                    $data = $.parseJSON(data);
                    refreshListaEventos();
                    $('#tabela_principal #t_body li').on('click', mostrarDetalhes);
                    $('#mensagem_criar_evento p').html($data.mensagem);
                    if ($data.sucesso) {
                            document.getElementById("mensagem_criar_evento").style.backgroundColor = "#1EFF2C";
                        } else {
                            document.getElementById("mensagem_criar_evento").style.backgroundColor = "red";
                        }
                    $('#mensagem_criar_evento').show();
                    setTimeout(function() { 
                        $('#mensagem_criar_evento').fadeOut(); 
                    }, 5000);
                    document.getElementById('inserir_orcamento').value ="";
                    document.getElementById('inserir_pedido').value ="";
                    document.getElementById('inserir_tipo_evento').value ="";
                    $("#inserir_tipo_evento").trigger("chosen:updated");
                }
                function falha() {
                    document.getElementById("mensagem_criar_evento").style.backgroundColor = "red";
                    $('#mensagem_criar_evento p').html("ERRO BD");
                    $('#mensagem_criar_evento').show();
                    setTimeout(function() { 
                        $('#mensagem_criar_evento').fadeOut(); 
                    }, 5000);
                }
            }

            
            
   
            
            
            
            
            
            
            
            

            
            
            
            
            
            
            
            
            
            
            
// INSERIR NOVO COMENTARIO -----------------------------------------------------------------------------------------------------------            
            $('#inserir_comentario').submit(function(e) {
                e.preventDefault();
                var formulario = $(this);
                var retono = inserirComentario(formulario);
            });
        
            function inserirComentario(dados) {

                
                //VERIFICA SE O USUARIO QUE ESTÁ ALTERANDO É O MESMO DA PENDENCIA
                $usuario_1 = document.getElementById('mem_evento_usuario').value;
                $usuario_2 = "<?php echo $_SESSION["nomeUsuario_sessao"]; ?>";

                //VERIFICA SE A PESSOA TEM DIREITO DE ALTERAR EVENTO DE QUALQUER USUARIO
                $direito = "<?php echo $_SESSION["qqr_usuario_sessao"]; ?>";

                $permissao = 0;

                if($usuario_1 == $usuario_2){
                    $permissao = 1;
                }
                if($direito == 1){
                    $permissao = 1;
                }
                
                $evento_selecionado = document.getElementById('mem_evento_ID').value;

                if ($evento_selecionado != "") {

                    if($permissao == 1){

                        $.ajax({
                            type:"POST",
                            data:dados.serialize(),
                            url:"_filtros/inserir_comentario.php",
                            async:false
                        }).done(function(data) {
                            $data = $.parseJSON(data);
                            if ($data.sucesso) {
                                $teste = 1;
                                document.getElementById("inserir_evento_mensagem").style.backgroundColor = "#1EFF2C";
                                document.getElementById("inserir_evento_mensagem").style.color = "white";
                            } else {
                                $teste = 0;
                                document.getElementById("inserir_evento_mensagem").style.backgroundColor = "red";
                                document.getElementById("inserir_evento_mensagem").style.color = "white";
                            }
                            document.getElementById('inserir_evento_mensagem').value = $data.mensagem;
                            $('#inserir_evento_mensagem').show();
                            setTimeout(function() { 
                                $('#inserir_evento_mensagem').fadeOut(); 
                            }, 5000);
                            refreshListaEventos();
                            $('#tabela_principal #t_body li').on('click', mostrarDetalhes);
                            clear_novo_comentario();
                            $eventoID = document.getElementById('mem_evento_ID').value;    
                            mostrarDetalhes($eventoID);
                        }); 

                    } else {
                        document.getElementById("inserir_evento_mensagem").style.backgroundColor = "red";
                        document.getElementById('inserir_evento_mensagem').value = "EVENTO DE OUTRO USUARIO";
                        $('#inserir_evento_mensagem').show();
                        setTimeout(function() { 
                            $('#inserir_evento_mensagem').fadeOut(); 
                        }, 5000);
                    }
                } else {
                    document.getElementById("inserir_evento_mensagem").style.backgroundColor = "red";
                    document.getElementById('inserir_evento_mensagem').value = "SELECIONAR EVENTO";
                    $('#inserir_evento_mensagem').show();
                    setTimeout(function() { 
                        $('#inserir_evento_mensagem').fadeOut(); 
                    }, 5000);
                }
                
                document.getElementById('mem_evento_ID').value = "";
            }

            function clear_novo_comentario(){
             
                document.getElementById('novo_comentario').value = "";
                document.getElementById('novo_status').value = "";
                document.getElementById('novo_pedido').value = "";
                document.getElementById('novo_orcamento').value = "";
                $("#novo_status").trigger("chosen:updated");
                $("#novo_diretoria").prop("checked",false);
                $("#novo_finalizado").prop("checked",false);
            }



        
        
        
        
        
            
            
            
            
            
            
            
            
            

/*AO APERTAR O LINK NA LISTA DE EVENTOS  ---------------------------------------------------------
        1. COLOCA O VALOR DO eventoID NA JANELA DE INSERIR COMENTARIOS
        2. FILTRA E MOSTRA OS COMENTARIOS DO EVENTO SELECIONADO
*/
//SELECIONAR EVENTO ------------------------------------------------------------------

            function mostrarDetalhes(dados){
                //MARCAR SELEÇÃO NA TABLEA
                $conta = $('#tabela_principal div div').length;
                $elemento = $('#tabela_principal div div');
                for (var i = 0; i < $conta; i++) {
                    $elemento[i].removeAttribute('style');
                }
                dados.currentTarget.children[0].style.backgroundColor = '#000';
                dados.currentTarget.children[0].style.color = '#FFF';
                
                //INICIO DA SELEÇÃO
                if (typeof dados === 'object'){
                    $evento_ID = dados.currentTarget.children[0].children[0].innerHTML;
                } else {
                    $evento_ID = dados;
                }
                document.getElementById('inserir_eventoID').value = $evento_ID;
                document.getElementById('chk1_inserir_eventoID').value = $evento_ID;
                document.getElementById('chk2_inserir_eventoID').value = $evento_ID;
                $('#titulo_novo_comentario').html("CONCLUIR / DEVOLVER EVENTO ID: " + $evento_ID);
                $('#titulo_comentario').html("HISTÓRICO DO EVENTO ID: " + $evento_ID);
                $('#janela_checklist h3').html("CHECKLIST ID: " + $evento_ID);
                preencherDadosEvento($evento_ID); //Preenche os dados do evento escolhido nos campos secretos
                if (document.getElementById('mem_evento_checklist').value == "N/A") {$('#janela_checklist').slideUp();};
                apagarChk1(); //Apaga Checklist antes de preencher
                apagarChk2(); //Apaga Checklist antes de preencher
                preencherCheckList($evento_ID); //Preencher Checklist
                
                $.ajax({
                    type:"GET",
                    data:"eventoID=" + $evento_ID,
                    url:"_filtros/filtrar_comentarios.php",
                    async:false
                }).done(function(data) {
                    var comentarios = "";
                    $.each($.parseJSON(data), function(chave, valor) {
                        comentarios += '<li><div id="caixa_evento"><p class="T_C_Comentario">' + valor.comentario + '</p><p class="T_C_Usuario">' + valor.logUsuario + '</p><p class="T_C_Data">' + valor.logData + '</p></div></li>';
                    });
                    $('#tabela_comentarios #t_body').html(comentarios);
                });
            }
                
            function preencherDadosEvento(evento){
                $eventoID = evento;
                $.ajax({
                    type:"GET",
                    data:"eventoID=" + $eventoID,
                    url:"_filtros/filtrar_eventos_selecao.php",
                    async:false
                }).done(function(data) {
                    $data = $.parseJSON(data);

                    document.getElementById('mem_evento_ID').value = $data.eventoID;
                    document.getElementById('mem_evento_tipo').value = $data.tipoEvento;
                    document.getElementById('mem_evento_usuario').value = $data.usuario;
                    document.getElementById('mem_evento_orcamento').value = $data.numOrc;
                    document.getElementById('mem_evento_pedido').value = $data.numPed;
                    document.getElementById('mem_evento_pendencia').value = $data.pendencia;
                    document.getElementById('mem_evento_ativo').value = $data.ativo;
                    document.getElementById('mem_evento_diretoria').value = $data.diretoria;
                    document.getElementById('mem_evento_checklist').value = $data.checkList;
                    document.getElementById('mem_evento_log_usuario').value = $data.logUsuario;
                    abrirCustomCheckList();

                });
            }

            
/*FILTRA A PESQUISA  --------------------------------------------------------- */
            
            $('#search_form').submit(function(e) {
                e.preventDefault();
                var formulario = $(this);
                var retono = refreshListaEventos(formulario);
            });
        
            function refreshListaEventos(dados){
                var formularioGET = new String;
                $search_orcamento = document.getElementById('search_orcamento').value;
                formularioGET = "search_orcamento=" + $search_orcamento;
                $search_evento = document.getElementById('search_evento').value;
                formularioGET = formularioGET + "&search_evento=" + $search_evento;
                $search_pedido = document.getElementById('search_pedido').value;
                formularioGET = formularioGET + "&search_pedido=" + $search_pedido;
                $search_data = document.getElementById('data_evento').value;
                formularioGET = formularioGET + "&search_data=" + $search_data;
                if (document.getElementById('search_usuario').value == ""){}else{formularioGET = formularioGET + "&search_usuario=" + document.getElementById('search_usuario').value;};
                if (document.getElementById('search_tipo_evento').value == ""){}else{formularioGET = formularioGET + "&search_tipo_evento=" + document.getElementById('search_tipo_evento').value;};
                if(document.getElementById("serach_pend_minha").checked == true) {formularioGET = formularioGET + "&serach_pend_minha='on'";} else {};
                if(document.getElementById("search_diretoria").checked == true) {formularioGET = formularioGET + "&search_diretoria='on'";} else {};
                if(document.getElementById("search_finalizados").checked == true) {formularioGET = formularioGET + "&search_finalizados='on'";} else {};

                if(document.getElementById("search_pendencia").checked == true) {formularioGET = formularioGET + "&search_pendencia='on'";} else {};

                if(document.getElementById("serach_meu_evento").checked == true) {formularioGET = formularioGET + "&serach_meu_evento='on'";} else {};
                $.ajax({
                    type:"GET",
                    data:formularioGET,
                    url:"_filtros/filtrar_eventos.php",
                    async:false
                }).done(function(data) {
                    var eventos = "";
                    $.each($.parseJSON(data), function(chave, valor) {
                        eventos +=   '<li><div id="caixa_evento"><p class="T_ID">' + valor.eventoID + '</p><p class="T_Ped">' + valor.numOrc + '</p><p class="T_Ped">' + valor.numPed + '</p><p class="T_Usuario">' + valor.usuario + '</p><p class="T_Evento">' + valor.tipoEvento + '</p><p class="T_ID">' + valor.estagio + '</p><p class="T_Chk">' + valor.checkList + '</p></div></li>'
                    });
                    $('#tabela_principal #t_body').html(eventos);
                    $('#tabela_principal #t_body li').on('click', mostrarDetalhes);
                });
            }

            

            
            
            
            
            
            
/*REFRESH LISTA DE USUARIOS  --------------------------------------------------------- */
            function refreshListaUsuarios(dados){
                $.ajax({
                    type:"GET",
                    data:dados,
                    url:"_filtros/filtrar_usuarios.php",
                    async:false
                }).done(function(data) {
                    var eventos = "";
                    $.each($.parseJSON(data), function(chave, valor) {
                        eventos +=   '<li><div id="caixa_evento"><p class="TU_ID">' + valor.usuarioID + '</p><p class="TU_Usuario">' + valor.nomeUsuario + '</p><p class="TU_Ativo">' + valor.ativo + '</p><p class="TU_CU">' + valor.cadastroUsuario + '</p><p class="TU_CT">' + valor.cadastroTipoEvento + '</p><p class="TU_QU">' + valor.qqrUsuario + '</p></div></li>'
                    });
                    $('#tabela_usuarios #t_body').html(eventos);
                });            
            }
            
            
            
            
/*REFRESH LISTA DE TIPO DE EVENTOS  --------------------------------------------------------- */
            function refreshListaTipoEventos(dados){
                $.ajax({
                    type:"GET",
                    data:dados,
                    url:"_filtros/filtrar_tipo_eventos.php",
                    async:false
                }).done(function(data) {
                    var eventos = "";
                    $.each($.parseJSON(data), function(chave, valor) {
                        eventos +=   '<li><div id="caixa_evento"><p class="TT_ID">' + valor.tipoEventosID + '</p><p class="TT_Tipo">' + valor.tipoEvento + '</p><p class="TT_Chk">' + valor.checagem + '</p><p class="TT_Ativo">' + valor.ativo + '</p><p class="TT_Ativo">' + valor.diretoria + '</p></div></li>'
                    });
                    $('#tabela_tipo_eventos #t_body').html(eventos);
                });            
            }
            

            
/*REFRESH LISTA DE WORKFLOW  --------------------------------------------------------- */
            function refreshListaWorkflow(dados){
                $eventoTipo = document.getElementById("inserir_tipo_evento_workflow").value;
//                $eventoTipo = "GERAR PEDIDO";
                $.ajax({
                    type:"GET",
                    data:"tipoEvento=" + $eventoTipo,
                    url:"_filtros/filtrar_workflow.php",
                    async:false
                }).done(function(data) {
                    var eventos = "";
                    $.each($.parseJSON(data), function(chave, valor) {
                        eventos +=   '<li><div id="caixa_evento"><p class="TW_ID">' + valor.ID + '</p><p class="TW_Tipo">' + valor.tipoEvento + '</p><p class="TW_Usuario">' + valor.usuarioAtual + '</p><p class="TW_Usuario">' + valor.usuarioProx + '</p><p class="TW_Estagio">' + valor.passoAtual + '</p><p class="TW_Estagio">' + valor.passoProx + '</p></div></li>'
                    });
                    $('#tabela_workflow #t_body').html(eventos);
                    $('#tabela_workflow #t_body li').on('click', criaralterarCadastroWorkflow);
                });            
            }
            

            
/*CRIAR/ALTERAR CADASTRO DE USUARIO  --------------------------------------------------------- */

            function criaralterarCadastroUsuario(dados) {
                $eventoID = dados.currentTarget.children[0].children[0].innerHTML;
                if($eventoID){
                    $.ajax({
                        type:"GET",
                        data:"usuarioID=" + $eventoID,
                        url:"_filtros/filtrar_usuarios.php",
                        async:false
                    }).done(function(data) {
                        $data = $.parseJSON(data);
                        
                        document.getElementById('cadastro_usuarioID').value = $data[0].usuarioID;
                        document.getElementById('cadastro_nome_usuario').value = $data[0].nomeUsuario;
                        if($data[0].ativo == 1){$("#cadastro_novo_ativo").prop("checked",true);}else{$("#cadastro_novo_ativo").prop("checked",false);}
                        if($data[0].cadastroUsuario == 1){$("#cadastro_novo_usuario").prop("checked",true);}else{$("#cadastro_novo_usuario").prop("checked",false);}
                        if($data[0].cadastroTipoEvento == 1){$("#cadastro_novo_tipo_evento").prop("checked",true);}else{$("#cadastro_novo_tipo_evento").prop("checked",false);}
                        if($data[0].qqrUsuario == 1){$("#cadastro_novo_qqr_usuario").prop("checked",true);}else{$("#cadastro_novo_qqr_usuario").prop("checked",false);}
                    });            
                }
            }

            $('#cadastra_usuario').submit(function(e) {
                e.preventDefault();
                var formulario = $(this);
                var retono = inserir_alterarUsuario(formulario);
            });

            function inserir_alterarUsuario(dados) {
                senha1 = document.getElementById('cadastro_password1').value;
                senha2 = document.getElementById('cadastro_password2').value;
                if (senha1 == senha2) {
                    $.ajax({
                        type:"POST",
                        data:dados.serialize(),
                        url:"_filtros/criar_alterar_cadastro_usuario.php",
                        async:false
                    }).done(function(data) {
                        document.getElementById('cadastro_usuarioID').value = "";
                        document.getElementById('cadastro_nome_usuario').value = "";
                        document.getElementById('cadastro_password1').value = "";
                        document.getElementById('cadastro_password2').value = "";
                        $("#cadastro_novo_usuario").prop("checked",false);
                        $("#cadastro_novo_tipo_evento").prop("checked",false);
                        $("#cadastro_novo_ativo").prop("checked",false);
                        $("#cadastro_novo_qqr_usuario").prop("checked",false);
                        refreshListaUsuarios();
                        $('#tabela_usuarios #t_body li').on('click', criaralterarCadastroUsuario);
                    });
                } else {
                    document.getElementById('cadastro_usuario_mensagem').value = "AS SENHAS ESTÃO DIFERENTES";
                    $('#cadastro_usuario_mensagem').show();
                    setTimeout(function() {
                        $('#cadastro_usuario_mensagem').fadeOut(); 
                    }, 5000);
                }
            }
           

            
            
            
            

            
            
            
            
/*CRIAR TIPO DE EVENTO  ------------------------------------------------------------------- */
            
            function criaralterarCadastroTipoEvento(dados) {
                $eventoID = dados.currentTarget.children[0].children[0].innerHTML;
                if($eventoID){
                    $.ajax({
                        type:"GET",
                        data:"ID=" + $eventoID,
                        url:"_filtros/filtrar_tipo_eventos.php",
                        async:false
                    }).done(function(data) {
                        $data = $.parseJSON(data);
                        
                        document.getElementById('cadastro_tipo_eventoID').value = $data[0].tipoEventosID;
                        document.getElementById('cadastro_tipo_evento').value = $data[0].tipoEvento;
                        document.getElementById('novo_tipo_check').value = $data[0].checagem;
                        if($data[0].ativo == 1){$("#cadastro_tipo_ativo").prop("checked",true);}else{$("#cadastro_tipo_ativo").prop("checked",false);}
                        if($data[0].diretoria == 1){$("#cadastro_tipo_diretoria").prop("checked",true);}else{$("#cadastro_tipo_diretoria").prop("checked",false);}
                    });            
                }
            }

            $('#cadastra_tipo_evento').submit(function(e) {
                e.preventDefault();
                var formulario = $(this);
                var retono = inserirTipoEvento(formulario);
            });

            function inserirTipoEvento(dados) {
                $.ajax({
                    type:"POST",
                    data:dados.serialize(),
                    url:"_filtros/criar_alterar_tipo_evento.php",
                    async:false
                }).done(function(data) {
                    $("#cadastro_tipo_ativo").prop("checked",false);
                    $("#cadastro_tipo_diretoria").prop("checked",false);
                    document.getElementById('cadastro_tipo_eventoID').value = "";
                    document.getElementById('cadastro_tipo_evento').value = "";
                    document.getElementById('novo_tipo_check').value = "";
                    refreshListaTipoEventos();
                    $('#tabela_tipo_eventos #t_body li').on('click', criaralterarCadastroTipoEvento);
                });
            }


/*CRIAR WORKFLOW  ------------------------------------------------------------------- */
            
            function criaralterarCadastroWorkflow(dados) {
                $ID = dados.currentTarget.children[0].children[0].innerHTML;
                if($ID){
                    $.ajax({
                        type:"GET",
                        data:"ID=" + $ID,
                        url:"_filtros/filtrar_workflow.php",
                        async:false
                    }).done(function(data) {
                        $data = $.parseJSON(data);
                        
                        document.getElementById('janela_cadastrar_workflow_h3_valor').value = $data[0].ID;
                        document.getElementById('inserir_tipo_evento_workflow_cad').value = $data[0].tipoEvento;
                        document.getElementById('search_usuario_cad_workflow_1').value = $data[0].usuarioAtual;
                        document.getElementById('search_usuario_cad_workflow_2').value = $data[0].usuarioProx;
                        document.getElementById('passo_ini').value = $data[0].passoAtual;
                        document.getElementById('passo_fim').value = $data[0].passoProx;
                        $("#inserir_tipo_evento_workflow_cad").trigger("chosen:updated");
                        $("#search_usuario_cad_workflow_1").trigger("chosen:updated");
                        $("#search_usuario_cad_workflow_2").trigger("chosen:updated");
                    });            
                }
            }

            $('#cadastra_workflow').submit(function(e) {
                e.preventDefault();
                var formulario = $(this);
                var retono = inserirTipoWorkflow(formulario);
            });

            function inserirTipoWorkflow(dados) {
                $.ajax({
                    type:"POST",
                    data:dados.serialize(),
                    url:"_filtros/criar_alterar_workflow.php",
                    async:false
                }).done(function(data) {
                    apagarSelecaoCadastroWorkflow();
                    refreshListaWorkflow();
                    $('#tabela_workflow #t_body li').on('click', criaralterarCadastroWorkflow);
                });
            }
            
            function apagarCadastroWorkflow(dados) {
                workflowID = document.getElementById('janela_cadastrar_workflow_h3_valor').value;
                $.ajax({
                    type:"POST",
                    data:"workflowID=" + workflowID,
                    url:"_filtros/apagar_workflow.php",
                    async:false
                }).done(function(data) {
                    apagarSelecaoCadastroWorkflow();
                    refreshListaWorkflow();
                    $('#tabela_workflow #t_body li').on('click', criaralterarCadastroWorkflow);
                });
            }
            

            
//ABRIR TELA CHECKLIST  ------------------------------------------------------------------- //
            function abrirCustomCheckList () {
                $tipoEvento = document.getElementById('mem_evento_tipo').value;
                $('#janela_chk_1').hide();
                $('#janela_chk_2').hide();
                $('#janela_chk_3').hide();
                $('#janela_chk_4').hide();
                $('#janela_chk_5').hide();
                $.ajax({
                    type:"GET",
                    data:"tipoEvento=" + $tipoEvento,
                    url:"_filtros/filtrar_tipo_checklist.php",
                    async:false
                }).done(function(data) {
                    $data = $.parseJSON(data);
                    document.getElementById('mem_evento_pendencia').value = $data.checagem;
                    if ($data.checagem == 1){
                        $('#janela_chk_1').show();
                    }
                    if ($data.checagem == 2){
                        $('#janela_chk_2').show();
                    }
                    if ($data.checagem == 3){
                        $('#janela_chk_3').show();
                    }
                    if ($data.checagem == 4){
                        $('#janela_chk_4').show();
                    }
                    if ($data.checagem == 5){
                        $('#janela_chk_5').show();
                    }
                });            
            }
            
// JAVA SALVAR/ALTERAR CHECKLIST 1 ---------------------------------------------------
            $('#inserir_chk1').submit(function(e) {
                e.preventDefault();
                var formulario = $(this);
                var retono = inserirChecklist1(formulario);
            });
            
            function inserirChecklist1(dados) {
//                $usuario_1 = document.getElementById('mem_evento_log_usuario').value;
                $usuario_1 = document.getElementById('mem_evento_usuario').value;
                $usuario_2 = "<?php echo $_SESSION["nomeUsuario_sessao"]; ?>";
                if ($usuario_1 == $usuario_2) {
                    $.ajax({
                        type:"POST",
                        data:dados.serialize(),
                        url: '_filtros/inserir_chk1.php',
                        async:false
                    }).done(function(data) {
                        $data = $.parseJSON(data);
                        document.getElementById("mensagem_checklist").style.backgroundColor = "#1EFF2C";
                        document.getElementById("mensagem_checklist").value = $data;
                        $('#mensagem_checklist').show();
                        setTimeout(function() { 
                            $('#mensagem_checklist').fadeOut(); 
                        }, 5000);
                        refreshListaEventos();          
                        $('#tabela_principal #t_body li').on('click', mostrarDetalhes);
                    });
                } else {
                    apagarChk1();
                    apagarChk2();
                    document.getElementById("mensagem_checklist").style.backgroundColor = "red";
                    document.getElementById("mensagem_checklist").value = "EVENTO DE OUTRO USUARIO";
                    $('#mensagem_checklist').show();
                    setTimeout(function() { 
                        $('#mensagem_checklist').fadeOut(); 
                    }, 5000);
                }
            }
            
// JAVA SALVAR/ALTERAR CHECKLIST 2 ---------------------------------------------------
            $('#inserir_chk2').submit(function(e) {
                e.preventDefault();
                var formulario = $(this);
                var retono = inserirChecklist2(formulario);
            });
            
            function inserirChecklist2(dados) {
//                $usuario_1 = document.getElementById('mem_evento_log_usuario').value;
                $usuario_1 = document.getElementById('mem_evento_usuario').value;
                $usuario_2 = "<?php echo $_SESSION["nomeUsuario_sessao"]; ?>";
                if ($usuario_1 == $usuario_2) {
                    $.ajax({
                        type:"POST",
                        data:dados.serialize(),
                        url: '_filtros/inserir_chk2.php',
                        async:false
                    }).done(function(data) {
                        $data = $.parseJSON(data);
                        document.getElementById("mensagem_checklist2").style.backgroundColor = "#1EFF2C";
                        document.getElementById("mensagem_checklist2").value = $data;
                        $('#mensagem_checklist2').show();
                        setTimeout(function() { 
                            $('#mensagem_checklist2').fadeOut(); 
                        }, 5000);
                        refreshListaEventos();          
                        $('#tabela_principal #t_body li').on('click', mostrarDetalhes);
                    });
                } else {
                    apagarChk1();
                    apagarChk2();
                    document.getElementById("mensagem_checklist2").style.backgroundColor = "red";
                    document.getElementById("mensagem_checklist2").value = "EVENTO DE OUTRO USUARIO";
                    $('#mensagem_checklist2').show();
                    setTimeout(function() { 
                        $('#mensagem_checklist2').fadeOut(); 
                    }, 5000);
                }
            }
            
            
// JAVA ABRIR JANELA PRODUÇÃO LIVE ---------------------------------------------------
            function mostrarJanelaProducaoLive(){
                $('#menu_mobile').slideUp();
                window.open("producao.php", "");
            }
            
// JAVA PREENCHER CHECKLIST ---------------------------------------------------
            function preencherCheckList(evento){
                $evento = evento;
                $.ajax({
                    type:"GET",
                    data:"evento_ID=" + $evento,
                    url:"_filtros/filtrar_chk.php",
                    async:false
                }).done(function(data) {
                    $data = $.parseJSON(data);
                    if ($data == 0) {
                        apagarChk1();
                        apagarChk2();
                    } else {
                        document.getElementById("doc11").value = $data.doc1;
                        document.getElementById("doc12").value = $data.doc2;
                        document.getElementById("doc13").value = $data.doc3;
                        document.getElementById("doc14").value = $data.doc4;
                        document.getElementById("doc15").value = $data.doc5;
                        document.getElementById("doc16").value = $data.doc6;
                        document.getElementById("doc17").value = $data.doc7;
                        document.getElementById("doc21").value = $data.doc1;
                        document.getElementById("doc22").value = $data.doc2;
                        document.getElementById("contato_fat").value = $data.contatoFat;
                        document.getElementById("telefone_fat").value = $data.telefoneFat;
                        document.getElementById("email_fat").value = $data.emailFat;
                        if  ($data.chk1 == null){document.querySelector('input[name="chk1"]:checked').checked = false;}else{
                        var radios = document.getElementsByName("chk1");
                        for (var i = 0; i < radios.length; i++) {
                            if (radios[i].value === $data.chk1 ) {
                                radios[i].checked = true;
                            }
                        }}
                        if  ($data.chk2 == null){document.querySelector('input[name="chk2"]:checked').checked = false;}else{
                        var radios = document.getElementsByName("chk2");
                        for (var i = 0; i < radios.length; i++) {
                            if (radios[i].value === $data.chk2 ) {
                                radios[i].checked = true;
                            }
                        }
                        }
                        if  ($data.chk3 == null){document.querySelector('input[name="chk3"]:checked').checked = false;}else{
                        var radios = document.getElementsByName("chk3");
                        for (var i = 0; i < radios.length; i++) {
                            if (radios[i].value === $data.chk3 ) {
                                radios[i].checked = true;
                            }
                        }
                        }
                        if  ($data.chk4 == null){document.querySelector('input[name="chk4"]:checked').checked = false;}else{
                        var radios = document.getElementsByName("chk4");
                        for (var i = 0; i < radios.length; i++) {
                            if (radios[i].value === $data.chk4 ) {
                                radios[i].checked = true;
                            }
                        }
                        }
                        if  ($data.chk5 == null){document.querySelector('input[name="chk5"]:checked').checked = false;}else{
                        var radios = document.getElementsByName("chk5");
                        for (var i = 0; i < radios.length; i++) {
                            if (radios[i].value === $data.chk5 ) {
                                radios[i].checked = true;
                            }
                        }
                        }
                        if  ($data.chk6 == null){document.querySelector('input[name="chk6"]:checked').checked = false;}else{
                        var radios = document.getElementsByName("chk6");
                        for (var i = 0; i < radios.length; i++) {
                            if (radios[i].value === $data.chk6 ) {
                                radios[i].checked = true;
                            }
                        }
                        }
                        if  ($data.chk7 == null){document.querySelector('input[name="chk7"]:checked').checked = false;}else{
                        var radios = document.getElementsByName("chk7");
                        for (var i = 0; i < radios.length; i++) {
                            if (radios[i].value === $data.chk7 ) {
                                radios[i].checked = true;
                            }
                        }
                        }
                        if  ($data.chk8 == null){document.querySelector('input[name="chk8"]:checked').checked = false;}else{
                        var radios = document.getElementsByName("chk8");
                        for (var i = 0; i < radios.length; i++) {
                            if (radios[i].value === $data.chk8 ) {
                                radios[i].checked = true;
                            }
                        }
                        }
                        if  ($data.chk9 == null){document.querySelector('input[name="chk9"]:checked').checked = false;}else{
                        var radios = document.getElementsByName("chk9");
                        for (var i = 0; i < radios.length; i++) {
                            if (radios[i].value === $data.chk9 ) {
                                radios[i].checked = true;
                            }
                        }
                        }
                        if  ($data.chk10 != null){
                            if ($data.chk10 == 1) {
                                document.querySelector('input[name="chk10"]').checked = true;
                            } else {
                                document.querySelector('input[name="chk10"]').checked = false;
                            }
                        }
                        if  ($data.chk11 == null){document.querySelector('input[name="chk11"]:checked').checked = false;}else{
                        var radios = document.getElementsByName("chk11");
                        for (var i = 0; i < radios.length; i++) {
                            if (radios[i].value === $data.chk11 ) {
                                radios[i].checked = true;
                            }
                        }
                        }
                        if  ($data.chk12 == null){document.querySelector('input[name="chk12"]:checked').checked = false;}else{
                        var radios = document.getElementsByName("chk12");
                        for (var i = 0; i < radios.length; i++) {
                            if (radios[i].value === $data.chk12 ) {
                                radios[i].checked = true;
                            }
                        }
                        }
                        if  ($data.chk13 == null){document.querySelector('input[name="chk13"]:checked').checked = false;}else{
                        var radios = document.getElementsByName("chk13");
                        for (var i = 0; i < radios.length; i++) {
                            if (radios[i].value === $data.chk13 ) {
                                radios[i].checked = true;
                            }
                        }}
                        if  ($data.chk14 == null){document.querySelector('input[name="chk14"]:checked').checked = false;}else{
                        var radios = document.getElementsByName("chk14");
                        for (var i = 0; i < radios.length; i++) {
                            if (radios[i].value === $data.chk14 ) {
                                radios[i].checked = true;
                            }
                        }}
                        if  ($data.chk1 == null){document.querySelector('input[name="chk15"]:checked').checked = false;}else{
                        var radios = document.getElementsByName("chk15");
                        for (var i = 0; i < radios.length; i++) {
                            if (radios[i].value === $data.chk1 ) {
                                radios[i].checked = true;
                            }
                        }}
                        if  ($data.chk2 == null){document.querySelector('input[name="chk16"]:checked').checked = false;}else{
                        var radios = document.getElementsByName("chk16");
                        for (var i = 0; i < radios.length; i++) {
                            if (radios[i].value === $data.chk2 ) {
                                radios[i].checked = true;
                            }
                        }}
                    }
                })
            }

// JAVA APAGAR CHECKLIST ---------------------------------------------------
            function apagarChk1() {
                document.getElementById("doc11").value = "";
                document.getElementById("doc12").value = "";
                document.getElementById("doc13").value = "";
                document.getElementById("doc14").value = "";
                document.getElementById("doc15").value = "";
                document.getElementById("doc16").value = "";
                document.getElementById("doc17").value = "";
                document.getElementById("contato_fat").value = "";
                document.getElementById("telefone_fat").value = "";
                document.getElementById("email_fat").value = "";
                if (!$("input[name='chk1']:checked").val()) {} else {document.querySelector('input[name="chk1"]:checked').checked = false;}
                if (!$("input[name='chk2']:checked").val()) {} else {document.querySelector('input[name="chk2"]:checked').checked = false;}
                if (!$("input[name='chk3']:checked").val()) {} else {document.querySelector('input[name="chk3"]:checked').checked = false;}
                if (!$("input[name='chk4']:checked").val()) {} else {document.querySelector('input[name="chk4"]:checked').checked = false;}
                if (!$("input[name='chk5']:checked").val()) {} else {document.querySelector('input[name="chk5"]:checked').checked = false;}
                if (!$("input[name='chk6']:checked").val()) {} else {document.querySelector('input[name="chk6"]:checked').checked = false;}
                if (!$("input[name='chk7']:checked").val()) {} else {document.querySelector('input[name="chk7"]:checked').checked = false;}
                if (!$("input[name='chk8']:checked").val()) {} else {document.querySelector('input[name="chk8"]:checked').checked = false;}
                if (!$("input[name='chk9']:checked").val()) {} else {document.querySelector('input[name="chk9"]:checked').checked = false;}
                if (!$("input[name='chk10']:checked").val()) {} else {document.querySelector('input[name="chk10"]:checked').checked = false;}
                if (!$("input[name='chk11']:checked").val()) {} else {document.querySelector('input[name="chk11"]:checked').checked = false;}
                if (!$("input[name='chk12']:checked").val()) {} else {document.querySelector('input[name="chk12"]:checked').checked = false;}
                if (!$("input[name='chk13']:checked").val()) {} else {document.querySelector('input[name="chk13"]:checked').checked = false;}
                if (!$("input[name='chk14']:checked").val()) {} else {document.querySelector('input[name="chk14"]:checked').checked = false;}
            }
            function apagarChk2() {
                document.getElementById("doc21").value = "";
                document.getElementById("doc22").value = "";
                if (!$("input[name='chk15']:checked").val()) {} else {document.querySelector('input[name="chk15"]:checked').checked = false;}
                if (!$("input[name='chk16']:checked").val()) {} else {document.querySelector('input[name="chk16"]:checked').checked = false;}
            }
            
            function menu_mobile() {
                $('#menu_mobile').slideToggle();
            }
            
            function adotarEvento() {
                $evento_ID = document.getElementById('inserir_eventoID').value;
                    $.ajax({
                    type:"GET",
                    data:"evento_ID=" + $evento_ID,
                    url:"_filtros/adotar_evento.php",
                    async:false
                }).done(function(data) {
                    refreshListaEventos();
                });

            }

            function checkboxDiretoria () {
                $direito = "<?php echo $_SESSION["qqr_usuario_sessao"]; ?>";
                if ($direito == 1) {
                    document.getElementById("search_diretoria").disabled = false;
                    document.getElementById("novo_finalizado").disabled = false;
                }
            }
            
            function apagarSelecaoCadastroWorkflow() {
                document.getElementById('janela_cadastrar_workflow_h3_valor').value = "";
                document.getElementById('inserir_tipo_evento_workflow_cad').value = "";
                document.getElementById('search_usuario_cad_workflow_1').value = "";
                document.getElementById('search_usuario_cad_workflow_2').value = "";
                document.getElementById('passo_ini').value = "";
                document.getElementById('passo_fim').value = "";
                $("#inserir_tipo_evento_workflow_cad").trigger("chosen:updated");
                $("#search_usuario_cad_workflow_1").trigger("chosen:updated");
                $("#search_usuario_cad_workflow_2").trigger("chosen:updated");
            }
            

            
//            $("#serach_pend_minha").prop("checked",true);
            refreshListaEventos();          
            refreshListaUsuarios();
            refreshListaTipoEventos();
            refreshListaWorkflow();
            checkboxDiretoria();

// ON LOAD ----------------------------------------------------------------------------------------------------            
// ------------------------------------------------------------------------------------------------------------            
// ------------------------------------------------------------------------------------------------------------            
            $(function(e) {
                $('#mostra_menu_cadastros').hover( function (){
                    $('#mostra_menu_cadastros').css('box-shadow','5px 5px 5px #ccc');
                    $('#mostra_menu_cadastros').css('font-weight','normal');
                    $('#menu_cadastros').css('display','block');
                }, function(){
                    $('#tela_cad_usuarios').hover( function (){
                        $('#mostra_menu_cadastros').css('box-shadow','5px 5px 5px #ccc');
                        $('#menu_cadastros').css('display','block');
                    }, function(){
                        $('#mostra_menu_cadastros').css('box-shadow','none');
                        $('#menu_cadastros').css('display','none');
                    });
                    $('#tela_cad_tipo_evento').hover( function (){
                        $('#mostra_menu_cadastros').css('box-shadow','5px 5px 5px #ccc');
                        $('#menu_cadastros').css('display','block');
                    }, function(){
                        $('#mostra_menu_cadastros').css('box-shadow','none');
                        $('#menu_cadastros').css('display','none');
                    });
                    $('#tela_cad_workflow').hover( function (){
                        $('#mostra_menu_cadastros').css('box-shadow','5px 5px 5px #ccc');
                        $('#menu_cadastros').css('display','block');
                    }, function(){
                        $('#mostra_menu_cadastros').css('box-shadow','none');
                        $('#menu_cadastros').css('display','none');
                    });
                    $('#mostra_menu_cadastros').css('box-shadow','none');
                    $('#menu_cadastros').css('display','none');
                });
                $('#mostra_menu_mobile').on('click', menu_mobile);
                $('#tabela_usuarios #t_body li').on('click', criaralterarCadastroUsuario);
                $('#tabela_tipo_eventos #t_body li').on('click', criaralterarCadastroTipoEvento);
                $('#tabela_workflow #t_body li').on('click', criaralterarCadastroWorkflow);
                $('#search_apagar').on('click', apagarPesquisa);
                $('#show_cadastro_eventos').on('click', mostrarCadastroEventos);
                $('#show_cadastro_comentarios').on('click', mostrarCadastroComentarios);
                $('#apagar_chk1').on('click', apagarChk1);
                $('#apagar_chk2').on('click', apagarChk2);
                $('#novo_adotar').on('click', adotarEvento);
                $('#show_comentarios').on('click', mostrarComentarios);
                $('#show_pesquisa').on('click', mostrarPesquisa);
                $('#show_checklist').on('click', mostrarCheckList);
                $('#tela_eventos').on('click', mostrarJanelaEventos);
                $('#tela_eventos_mobile').on('click', mostrarJanelaEventos);
                $('#tela_producao').on('click', mostrarJanelaProducaoLive);
                $('#tela_producao_mobile').on('click', mostrarJanelaProducaoLive);
                $('#tela_cad_usuarios').on('click', mostrarJanelaCadastroUsuarios);
                $('#tela_cad_usuarios_mobile').on('click', mostrarJanelaCadastroUsuarios);
                $('#tela_cad_tipo_evento').on('click', mostrarJanelaCadastroTipoEvento);
                $('#tela_cad_tipo_evento_mobile').on('click', mostrarJanelaCadastroTipoEvento);
                $('#tela_cad_workflow').on('click', mostrarJanelaCadastroWorkflow);
                $('#tela_cad_workflow_mobile').on('click', mostrarJanelaCadastroWorkflow);
                $('#apagar_formulario_cadastro_usuarios').on('click', apagarSelecaoCadastroUsuario);
                $('#apagar_formulario_cadastro_tipo_evento').on('click', apagarSelecaoCadastroTipoEvento);
                $('#apagar_formulario_workflow').on('click', apagarSelecaoCadastroWorkflow);
                $('#apagar_registro_workflow').on('click', apagarCadastroWorkflow);
//                $('.input_pedido').mask('99999');
//                $('.input_evento').mask('99999');
                $('#novo_pedido').mask('99999');
                $('#novo_orcamento').mask('99999');
                $('.input_select').chosen();
                $('#data_evento').datepicker({
                    monthNames:['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                    dayNamesMin:['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
                    prevText:'Anterior',
                    nextText:'Próximo',
                    dateFormat:'dd/mm/yy',
                    maxDate:'0',
                });
                $('#janela_botoes').css('display','none');
                $('#janela_inserir').css('display','none');
                $('#janela_input').css('display','none');
                $('#corpo_cadastro_workflow').css('display','none');
                $('#doc12').focusin(function(){if(document.getElementById("doc11").value == ""){document.getElementById("doc11").focus();}else{document.getElementById("doc12").focus();}});
                $('#doc13').focusin(function(){if(document.getElementById("doc12").value == ""){document.getElementById("doc12").focus();}else{document.getElementById("doc13").focus();}});
                $('#doc14').focusin(function(){if(document.getElementById("doc13").value == ""){document.getElementById("doc13").focus();}else{document.getElementById("doc14").focus();}});
                $('#doc15').focusin(function(){if(document.getElementById("doc14").value == ""){document.getElementById("doc14").focus();}else{document.getElementById("doc15").focus();}});
                $('#doc16').focusin(function(){if(document.getElementById("doc15").value == ""){document.getElementById("doc15").focus();}else{document.getElementById("doc16").focus();}});
                $('#doc17').focusin(function(){if(document.getElementById("doc16").value == ""){document.getElementById("doc16").focus();}else{document.getElementById("doc17").focus();}});
                $('#doc22').focusin(function(){if(document.getElementById("doc21").value == ""){document.getElementById("doc21").focus();}else{document.getElementById("doc22").focus();}});

                //REFRESH A CADA 5 MINUTOS
                setInterval(function() {
                    refreshListaEventos();    
                }, 43200000);
                //LOGOFF A CADA HORA
                setInterval(function() {
                    header("location:login.php");
                    logOut();
                }, 900000);
            });
            
            

        </script>
        
    
        
        
   
        
        
        
        
        
        
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>

<!--               setInterval(function() {
                    $evento = 1;
                    $.ajax({
                        type:"GET",
                        data:"evento_ID=" + $evento,
                        url:"_filtros/escalonar_pt1.php",
                        async:false
                    }).done(function(data) {
                        $data = $.parseJSON(data);
                        $diaAgora = new Date().getDate();
                        $horaAgora = new Date().getHours();
                        
                        for (var i = 0; i < $data.length; i++) {
                            $diaComentario = $data[i].logUltimo.substring(8, 10);
                            $horaComentario = $data[i].logUltimo.substring(11, 13);
                            $saldoDia = $diaAgora - $diaComentario;
                            $eventoAtual = $data[i].eventoID;
                            if ($saldoDia > 0){
                                if ($horaAgora >= $horaComentario){
                                    $.ajax({
                                        type:"GET",
                                        data:"evento_ID=" + $eventoAtual,
                                        url:"_filtros/escalonar_pt2.php",
                                        async:false
                                    }).done(function(data2) {
                                        $data2 = $.parseJSON(data2);
                                    });
                                }
                            }
                        }
                    });
                }, 3600000);
-->