<?php require_once("_db/conexao_inaflex.php"); ?>

<?php
    session_start();

    if (isset($_SESSION["usuario_sessao"])) {
    } else {
        header("location:index.php");
    }

?>

<!doctype html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>INAFLEX - SII</title>
        
        <!-- estilo -->
        <link href="_css/inaflex_topo_rodape.css" rel="stylesheet">
        <link href="_css/inaflex_padrao.css" rel="stylesheet">
        <script src="_js/jquery-3.5.0.min.js"></script>

        <script>
            const myObjectString = localStorage.getItem('objectCliente');
            const myObject = JSON.parse(myObjectString);
            console.log(myObject);
            $lote = myObject.lote;
            $status = myObject.status;

            if($lote != ""){
                $.ajax({
                    type:"GET",
                    data:"lote=" + $lote,
                    url:"_filtros/pegar_relatorio.php",
                    async:false
                }).done(function(data) {
                    $data = $.parseJSON(data);
                });
                $informacao = $data.finalizado;
                $cliente = $informacao.cliente;
                $exigencia = $informacao.exigencias;
                $finalizado = $informacao.finalizado;
            } else {
                $finalizado = "0";
            }

            //BOTÃO LOGOUT------------------------------------------------------------------
            function logOut(){
                window.location.href = "index.php";
            }
            
            function botao_voltar(){
                window.location.href = "qualidade_selecao.php";
            }
            
            function botao_finalizar(){
                if($finalizado == "0"){
                    $('#status_label').html("FINALIZADO");
                    document.getElementById('status').value = "FINALIZADO";
                    myObject.pedido = $informacao.pedido;
                    myObject.cliente = $informacao.cliente;
                    myObject.cnpj = $informacao.cnpj;
                    myObject.exigencia = $informacao.exigencias;
                    myObject.lote = document.getElementById('lote').value;
                    myObject.status = document.getElementById('status').value;
                    console.log(myObject);
                    const myObjectString = JSON.stringify(myObject);
                    localStorage.setItem('objectCliente', myObjectString);
                    document.getElementById('evento_enviar').click();
                    window.location.href = "qualidade_checklist.php";
                } else {
                    $('#evento_enviar').hide();
                }
            }
            
            function Clickguarnicao(myRadio) {
                $guarnicao = true;
            }
            function ClickEncaixe(myRadio) {
                if(myRadio.value == 4) {
                    $('#encaixe_obs').show();
                } else {
                    $('#encaixe_obs').hide();
                }
                $encaixe = true;
            }
            function Clicksolda(myRadio) {
                if(myRadio.value == 4) {
                    $('#solda_obs').show();
                } else {
                    $('#solda_obs').hide();
                }
                $solda = true;
            }
            function Clickcordoalha(myRadio) {
                if(myRadio.value == 4) {
                    $('#cordoalha_obs').show();
                } else {
                    $('#cordoalha_obs').hide();
                }
                $cordoalha = true;
            }
            function Clicktipado(myRadio) {
                if(myRadio.value == 4) {
                    $('#tipado_obs').show();
                } else {
                    $('#tipado_obs').hide();
                }
                $tipado = true;
            }
            function Clicktag(myRadio) {
                if(myRadio.value == 4) {
                    $('#tag_obs').show();
                } else {
                    $('#tag_obs').hide();
                }
                $tag = true;
            }
            function Clickcola(myRadio) {
                if(myRadio.value == 4) {
                    $('#cola_obs').show();
                } else {
                    $('#cola_obs').hide();
                }
                $cola = true;
            }
            function Clickpead(myRadio) {
                if(myRadio.value == 4) {
                    $('#pead_obs').show();
                } else {
                    $('#pead_obs').hide();
                }
                $pead = true;
            }
            function Clickcorda(myRadio) {
                if(myRadio.value == 4) {
                    $('#corda_obs').show();
                } else {
                    $('#corda_obs').hide();
                }
                $corda = true;
            }
            function Clicksilicone(myRadio) {
                if(myRadio.value == 4) {
                    $('#silicone_obs').show();
                } else {
                    $('#silicone_obs').hide();
                }
                $silicone = true;
            }
            function Clickcupilha(myRadio) {
                if(myRadio.value == 4) {
                    $('#cupilha_obs').show();
                } else {
                    $('#cupilha_obs').hide();
                }
                $cupilha = true;
            }
            function Clickdrenado(myRadio) {
                if(myRadio.value == 4) {
                    $('#drenado_obs').show();
                } else {
                    $('#drenado_obs').hide();
                }
                $drenado = true;
            }
            function Clickplaqueta(myRadio) {
                if(myRadio.value == 4) {
                    $('#plaqueta_obs').show();
                } else {
                    $('#plaqueta_obs').hide();
                }
                $plaqueta = true;
            }
            function Clickplaqueta_info(myRadio) {
                if(myRadio.value == 4) {
                    $('#plaqueta_info_obs').show();
                } else {
                    $('#plaqueta_info_obs').hide();
                }
                $plaqueta_info = true;
            }
            function Clickdiametro(myRadio) {
                if(myRadio.value == 4) {
                    $('#diametro_obs').show();
                } else {
                    $('#diametro_obs').hide();
                }
                $diametro = true;
            }
            function Clicketiquetas(myRadio) {
                if(myRadio.value == 4) {
                    $('#etiquetas_obs').show();
                } else {
                    $('#etiquetas_obs').hide();
                }
                $etiqueta = true;
            }
            function Clickmodelo(myRadio) {
                if(myRadio.value == 4) {
                    $('#modelo_obs').show();
                } else {
                    $('#modelo_obs').hide();
                }
                $modelo = true;
            }
            function Clickretrabalho(myRadio) {
                if(myRadio.value == 4) {
                    $('#retrabalho_obs').show();
                } else {
                    $('#retrabalho_obs').hide();
                }
                $retrabalho = true;
            }
            function Clickembalagem(myRadio) {
                if(myRadio.value == 4) {
                    $('#embalagem_obs').show();
                } else {
                    $('#embalagem_obs').hide();
                }
                $embalagem = true;
            }
            function Clickpregos(myRadio) {
                if(myRadio.value == 4) {
                    $('#pregos_obs').show();
                } else {
                    $('#pregos_obs').hide();
                }
                $pregos = true;
            }
            function Clickfalha(myRadio) {
                if(myRadio.value == 2) {
                    $('#falha_obs').show();
                } else {
                    $('#falha_obs').hide();
                }
                $falha = true;
            }
            function Clickresponsavel(myRadio) {
                if(myRadio.value == 2) {
                    $('#responsavel_obs').show();
                } else {
                    $('#responsavel_obs').hide();
                }
                $responsavel = true;
            }
            
        </script>
    </head>

    <body>
        <?php include_once("_incluir/topo.php"); ?>
        
        <main>  
            <div id="criar_evento">
                <form id="salvar_relatorio">
                    <h2>QUALIDADE</h2>
                    <h3>CHECKLIST</h3>
                    <label id="status_label" class="status_relatorio"></label><br><br><br><br>
                    <input type="text" class="textarea" name="status" id="status">
                    <label id="pedido_label" style="font-size: 50px"><?php echo $_SESSION["pedido"] ?></label><br><br><br><br>
                    <input type="text" class="textarea" name="pedido" id="pedido">
                    <label id="cliente_label" style="font-size: 50px"><?php echo $_SESSION["cliente"] ?></label><br><br><br><br>
                    <input type="text" class="textarea" name="cliente" id="cliente">
                    <label id="cnpj_label" style="font-size: 50px"><?php echo $_SESSION["cnpj"] ?></label><br><br><br><br>
                    <input type="text" class="textarea" name="cnpj" id="cnpj">
                    <label id="exigencia_label" style="font-size: 50px; color:red"><?php echo $_SESSION["demanda"] ?></label><br><br><br><br>
                    <input type="text" class="textarea" name="exigencias" id="exigencias">
                    <label for="lote">Lote:</label>
                    <input type="text" class="textarea" name="lote" id="lote" placeholder="Lote">
                    <label for="lote">Hora inicial:</label>
                    <input type="text" class="textarea" name="h_inicial" id="h_inicial" placeholder="Hora inicial">
                    <label for="lote">Hora final:</label>
                    <input type="text" class="textarea" name="h_final" id="h_final" placeholder="Hora final">
                    <label for="lote">Data:</label>
                    <input type="text" class="textarea" name="data" id="data" placeholder="Data">
                    <!--------------------------------------------------------------------------------------------------------->
                    <label class="separador">_____________________________________</label>
                    <label for="data_armazenamento" style="font-size:53px; font-weight: bold; display: block; text-align: center">EMPATACAO</label><br>
                    <div>
                        <label for="empatacao_na">Sem guarnicao</label>
                        <input type="radio" name="empatacao" value="1" id="empatacao_sem" onclick="Clickguarnicao(this)">
                        <br><label for="empatacao_aprovado">Com guarnicao</label>
                        <input type="radio" name="empatacao" value="2" id="empatacao_com" onclick="Clickguarnicao(this)">
                        <br><label for="empatacao_aprovado">N/A</label>
                        <input type="radio" name="empatacao" value="3" id="empatacao_na" onclick="Clickguarnicao(this)">
                    </div>
                    <!--------------------------------------------------------------------------------------------------------->
                    <label class="separador">_____________________________________</label>
                    <label for="encaixe">O encaixe dos terminais estão conformes (desalinhados)?</label>
                    <div>
                        <label for="encaixe_na">N/A</label>
                        <input type="radio" name="encaixe" value="1" id="encaixe_na" onclick="ClickEncaixe(this)">
                        <label for="encaixe_aprovado">Aprov.</label>
                        <input type="radio" name="encaixe" value="2" id="encaixe_aprovado" onclick="ClickEncaixe(this)">
                        <label for="encaixe_reprovado">Repr.</label>
                        <input type="radio" name="encaixe" value="3" id="encaixe_reprovado" onclick="ClickEncaixe(this)">
                        <label for="encaixe_condicional">Cond.</label>
                        <input type="radio" name="encaixe" value="4" id="encaixe_condicional" onclick="ClickEncaixe(this)">
                    </div>
                    <textarea class="textarea" name="encaixe_obs" id="encaixe_obs" maxlength="255" placeholder="Obs:"></textarea>
                    <!--------------------------------------------------------------------------------------------------------->
                    <label class="separador">_____________________________________</label>
                    <label for="solda">O mangote apresenta pontos de solda?</label>
                    <div>
                        <label for="na">N/A</label>
                        <input type="radio" name="solda" value="1" id="solda_na" onclick="Clicksolda(this)">
                        <label for="manutencao">Aprov.</label>
                        <input type="radio" name="solda" value="2" id="solda_aprovado" onclick="Clicksolda(this)">
                        <label for="manutencao">Repr.</label>
                        <input type="radio" name="solda" value="3" id="solda_reprovado" onclick="Clicksolda(this)">
                        <label for="manutencao">Cond.</label>
                        <input type="radio" name="solda" value="4" id="solda_condicional" onclick="Clicksolda(this)">
                    </div>
                    <textarea class="textarea" name="solda_obs" id="solda_obs" maxlength="255" placeholder="Obs:"></textarea>
                    <!--------------------------------------------------------------------------------------------------------->
                    <label class="separador">_____________________________________</label>
                    <label for="cordoalha">O mangote apresenta pontas de cordoalha?</label>
                    <div>
                        <label for="na">N/A</label>
                        <input type="radio" name="cordoalha" value="1" id="cordoalha_na" onclick="Clickcordoalha(this)">
                        <label for="manutencao">Aprov.</label>
                        <input type="radio" name="cordoalha" value="2" id="cordoalha_aprovado" onclick="Clickcordoalha(this)">
                        <label for="manutencao">Repr.</label>
                        <input type="radio" name="cordoalha" value="3" id="cordoalha_reprovado" onclick="Clickcordoalha(this)">
                        <label for="manutencao">Cond.</label>
                        <input type="radio" name="cordoalha" value="4" id="cordoalha_condicional" onclick="Clickcordoalha(this)">
                    </div>
                    <textarea class="textarea" name="cordoalha_obs" id="cordoalha_obs" maxlength="255" placeholder="Obs:"></textarea>
                    <!--------------------------------------------------------------------------------------------------------->
                    <label class="separador">_____________________________________</label>
                    <label for="tipado">O modelo foi tipado conforme ordem de producao?</label>
                    <div>
                        <label for="na">N/A</label>
                        <input type="radio" name="tipado" value="1" id="tipado_na" onclick="Clicktipado(this)">
                        <label for="manutencao">Aprov.</label>
                        <input type="radio" name="tipado" value="2" id="tipado_aprovado" onclick="Clicktipado(this)">
                        <label for="manutencao">Repr.</label>
                        <input type="radio" name="tipado" value="3" id="tipado_reprovado" onclick="Clicktipado(this)">
                        <label for="manutencao">Cond.</label>
                        <input type="radio" name="tipado" value="4" id="tipado_condicional" onclick="Clicktipado(this)">
                    </div>
                    <textarea class="textarea" name="tipado_obs" id="tipado_obs" maxlength="255" placeholder="Obs:"></textarea>
                    <!--------------------------------------------------------------------------------------------------------->
                    <label class="separador">_____________________________________</label>
                    <label for="tag">O mangote foi tipado com o numero da tag?</label>
                    <div>
                        <label for="na">N/A</label>
                        <input type="radio" name="tag" value="1" id="tag_na" onclick="Clicktag(this)">
                        <label for="manutencao">Aprov.</label>
                        <input type="radio" name="tag" value="2" id="tag_aprovado" onclick="Clicktag(this)">
                        <label for="manutencao">Repr.</label>
                        <input type="radio" name="tag" value="3" id="tag_reprovado" onclick="Clicktag(this)">
                        <label for="manutencao">Cond.</label>
                        <input type="radio" name="tag" value="4" id="tag_condicional" onclick="Clicktag(this)">
                    </div>
                    <textarea class="textarea" name="tag_obs" id="tag_obs" maxlength="255" placeholder="Obs:"></textarea>
                    <br><br><br><br><label for="tag_numero">Informar numero da TAG:</label>
                    <input type="text" class="textarea" name="tag_numero" id="tag_numero" placeholder="Numero da tag">
                    <!--------------------------------------------------------------------------------------------------------->
                    <label class="separador">_____________________________________</label>
                    <label for="cola">O mangote apresenta excesso de cola?</label>
                    <div>
                        <label for="na">N/A</label>
                        <input type="radio" name="cola" value="1" id="cola_na" onclick="Clickcola(this)">
                        <label for="manutencao">Aprov.</label>
                        <input type="radio" name="cola" value="2" id="cola_aprovado" onclick="Clickcola(this)">
                        <label for="manutencao">Repr.</label>
                        <input type="radio" name="cola" value="3" id="cola_reprovado" onclick="Clickcola(this)">
                        <label for="manutencao">Cond.</label>
                        <input type="radio" name="cola" value="4" id="cola_condicional" onclick="Clickcola(this)">
                    </div>
                    <textarea class="textarea" name="cola_obs" id="cola_obs" maxlength="255" placeholder="Obs:"></textarea>
                    <!--------------------------------------------------------------------------------------------------------->
                    <label class="separador">_____________________________________</label>
                    <label for="pead">Sera aplicado PEAD?</label>
                    <div>
                        <label for="na">N/A</label>
                        <input type="radio" name="pead" value="1" id="pead_na" onclick="Clickpead(this)">
                        <label for="manutencao">Aprov.</label>
                        <input type="radio" name="pead" value="2" id="pead_aprovado" onclick="Clickpead(this)">
                        <label for="manutencao">Repr.</label>
                        <input type="radio" name="pead" value="3" id="pead_reprovado" onclick="Clickpead(this)">
                        <label for="manutencao">Cond.</label>
                        <input type="radio" name="pead" value="4" id="pead_condicional" onclick="Clickpead(this)">
                    </div>
                    <textarea class="textarea" name="pead_obs" id="pead_obs" maxlength="255" placeholder="Obs:"></textarea>
                    <!--------------------------------------------------------------------------------------------------------->
                    <label class="separador">_____________________________________</label>
                    <label for="corda">Sera aplicado encordoamento?</label>
                    <div>
                        <label for="na">N/A</label>
                        <input type="radio" name="corda" value="1" id="corda_na" onclick="Clickcorda(this)">
                        <label for="manutencao">Aprov.</label>
                        <input type="radio" name="corda" value="2" id="corda_aprovado" onclick="Clickcorda(this)">
                        <label for="manutencao">Repr.</label>
                        <input type="radio" name="corda" value="3" id="corda_reprovado" onclick="Clickcorda(this)">
                        <label for="manutencao">Cond.</label>
                        <input type="radio" name="corda" value="4" id="corda_condicional" onclick="Clickcorda(this)">
                    </div>
                    <textarea class="textarea" name="corda_obs" id="corda_obs" maxlength="255" placeholder="Obs:"></textarea>
                    <br><br><br><br><label for="corda_numero">Qual cor?:</label>
                    <input type="text" class="textarea" name="corda_cor" id="corda_cor" placeholder="Cor">
                    <!--------------------------------------------------------------------------------------------------------->
                    <label class="separador">_____________________________________</label>
                    <label for="silicone">O mangote apresenta excesso de silicone?</label>
                    <div>
                        <label for="na">N/A</label>
                        <input type="radio" name="silicone" value="1" id="silicone_na" onclick="Clicksilicone(this)">
                        <label for="manutencao">Aprov.</label>
                        <input type="radio" name="silicone" value="2" id="silicone_aprovado" onclick="Clicksilicone(this)">
                        <label for="manutencao">Repr.</label>
                        <input type="radio" name="silicone" value="3" id="silicone_reprovado" onclick="Clicksilicone(this)">
                        <label for="manutencao">Cond.</label>
                        <input type="radio" name="silicone" value="4" id="silicone_condicional" onclick="Clicksilicone(this)">
                    </div>
                    <textarea class="textarea" name="silicone_obs" id="silicone_obs" maxlength="255" placeholder="Obs:"></textarea>
                    <!--------------------------------------------------------------------------------------------------------->
                    <label class="separador">_____________________________________</label>
                    <label for="cupilha">Tem cupilha?</label>
                    <div>
                        <label for="na">N/A</label>
                        <input type="radio" name="cupilha" value="1" id="cupilha_na" onclick="Clickcupilha(this)">
                        <label for="manutencao">Aprov.</label>
                        <input type="radio" name="cupilha" value="2" id="cupilha_aprovado" onclick="Clickcupilha(this)">
                        <label for="manutencao">Repr.</label>
                        <input type="radio" name="cupilha" value="3" id="cupilha_reprovado" onclick="Clickcupilha(this)">
                        <label for="manutencao">Cond.</label>
                        <input type="radio" name="cupilha" value="4" id="cupilha_condicional" onclick="Clickcupilha(this)">
                    </div>
                    <textarea class="textarea" name="cupilha_obs" id="cupilha_obs" maxlength="255" placeholder="Obs:"></textarea>
                    <!--------------------------------------------------------------------------------------------------------->
                    <label class="separador">_____________________________________</label>
                    <label for="drenado">O mangote precisa ser drenado?</label>
                    <div>
                        <label for="na">N/A</label>
                        <input type="radio" name="drenado" value="1" id="drenado_na" onclick="Clickdrenado(this)">
                        <label for="manutencao">Aprov.</label>
                        <input type="radio" name="drenado" value="2" id="drenado_aprovado" onclick="Clickdrenado(this)">
                        <label for="manutencao">Repr.</label>
                        <input type="radio" name="drenado" value="3" id="drenado_reprovado" onclick="Clickdrenado(this)">
                        <label for="manutencao">Cond.</label>
                        <input type="radio" name="drenado" value="4" id="drenado_condicional" onclick="Clickdrenado(this)">
                    </div>
                    <textarea class="textarea" name="drenado_obs" id="drenado_obs" maxlength="255" placeholder="Obs:"></textarea>
                    <!--------------------------------------------------------------------------------------------------------->
                    <label class="separador">_____________________________________</label>
                    <label for="plaqueta">O modeloa da plaqueta esta correto?</label>
                    <div>
                        <label for="na">N/A</label>
                        <input type="radio" name="plaqueta" value="1" id="plaqueta_na" onclick="Clickplaqueta(this)">
                        <label for="manutencao">Aprov.</label>
                        <input type="radio" name="plaqueta" value="2" id="plaqueta_aprovado" onclick="Clickplaqueta(this)">
                        <label for="manutencao">Repr.</label>
                        <input type="radio" name="plaqueta" value="3" id="plaqueta_reprovado" onclick="Clickplaqueta(this)">
                        <label for="manutencao">Cond.</label>
                        <input type="radio" name="plaqueta" value="4" id="plaqueta_condicional" onclick="Clickplaqueta(this)">
                    </div>
                    <textarea class="textarea" name="plaqueta_obs" id="plaqueta_obs" maxlength="255" placeholder="Obs:"></textarea>
                    <!--------------------------------------------------------------------------------------------------------->
                    <label class="separador">_____________________________________</label>
                    <label for="plaqueta_info">As informacoes da plaqueta estao conforme aprovado pelo cliente?</label>
                    <div>
                        <label for="na">N/A</label>
                        <input type="radio" name="plaqueta_info" value="1" id="plaqueta_info_na" onclick="Clickplaqueta_info(this)">
                        <label for="manutencao">Aprov.</label>
                        <input type="radio" name="plaqueta_info" value="2" id="plaqueta_info_aprovado" onclick="Clickplaqueta_info(this)">
                        <label for="manutencao">Repr.</label>
                        <input type="radio" name="plaqueta_info" value="3" id="plaqueta_info_reprovado" onclick="Clickplaqueta_info(this)">
                        <label for="manutencao">Cond.</label>
                        <input type="radio" name="plaqueta_info" value="4" id="plaqueta_info_condicional" onclick="Clickplaqueta_info(this)">
                    </div>
                    <textarea class="textarea" name="plaqueta_info_obs" id="plaqueta_info_obs" maxlength="255" placeholder="Obs:"></textarea>
                    <!--------------------------------------------------------------------------------------------------------->
                    <label class="separador">_____________________________________</label>
                    <label for="diametro">Os parametros do diamentro externo estao conforme aprovado? (Randon/Sem engates)</label>
                    <div>
                        <label for="na">N/A</label>
                        <input type="radio" name="diametro" value="1" id="diametro_na" onclick="Clickdiametro(this)">
                        <label for="manutencao">Aprov.</label>
                        <input type="radio" name="diametro" value="2" id="diametro_aprovado" onclick="Clickdiametro(this)">
                        <label for="manutencao">Repr.</label>
                        <input type="radio" name="diametro" value="3" id="diametro_reprovado" onclick="Clickdiametro(this)">
                        <label for="manutencao">Cond.</label>
                        <input type="radio" name="diametro" value="4" id="diametro_condicional" onclick="Clickdiametro(this)">
                    </div>
                    <textarea class="textarea" name="diametro_obs" id="diametro_obs" maxlength="255" placeholder="Obs:"></textarea>
                    <!--------------------------------------------------------------------------------------------------------->
                    <label class="separador">_____________________________________</label>
                    <label for="etiquetas">As etiquetas inseridas nas pontas dos mangotes (Randon), comecam com o digito 2?</label>
                    <div>
                        <label for="na">N/A</label>
                        <input type="radio" name="etiquetas" value="1" id="etiquetas_na" onclick="Clicketiquetas(this)">
                        <label for="manutencao">Aprov.</label>
                        <input type="radio" name="etiquetas" value="2" id="etiquetas_aprovado" onclick="Clicketiquetas(this)">
                        <label for="manutencao">Repr.</label>
                        <input type="radio" name="etiquetas" value="3" id="etiquetas_reprovado" onclick="Clicketiquetas(this)">
                        <label for="manutencao">Cond.</label>
                        <input type="radio" name="etiquetas" value="4" id="etiquetas_condicional" onclick="Clicketiquetas(this)">
                    </div>
                    <textarea class="textarea" name="etiquetas_obs" id="etiquetas_obs" maxlength="255" placeholder="Obs:"></textarea>
                    <!--------------------------------------------------------------------------------------------------------->
                    <label class="separador">_____________________________________</label>
                    <label for="modelo">O modelo produzido esta conforme ordem de producao?</label>
                    <div>
                        <label for="na">N/A</label>
                        <input type="radio" name="modelo" value="1" id="modelo_na" onclick="Clickmodelo(this)">
                        <label for="manutencao">Aprov.</label>
                        <input type="radio" name="modelo" value="2" id="modelo_aprovado" onclick="Clickmodelo(this)">
                        <label for="manutencao">Repr.</label>
                        <input type="radio" name="modelo" value="3" id="modelo_reprovado" onclick="Clickmodelo(this)">
                        <label for="manutencao">Cond.</label>
                        <input type="radio" name="modelo" value="4" id="modelo_condicional" onclick="Clickmodelo(this)">
                    </div>
                    <textarea class="textarea" name="modelo_obs" id="modelo_obs" maxlength="255" placeholder="Obs:"></textarea>
                    <!--------------------------------------------------------------------------------------------------------->
                    <label class="separador">_____________________________________</label>
                    <label for="retrabalho">O mangote precisa ser retrabalhado no acabamento?</label>
                    <div>
                        <label for="na">N/A</label>
                        <input type="radio" name="retrabalho" value="1" id="retrabalho_na" onclick="Clickretrabalho(this)">
                        <label for="manutencao">Aprov.</label>
                        <input type="radio" name="retrabalho" value="2" id="retrabalho_aprovado" onclick="Clickretrabalho(this)">
                        <label for="manutencao">Repr.</label>
                        <input type="radio" name="retrabalho" value="3" id="retrabalho_reprovado" onclick="Clickretrabalho(this)">
                        <label for="manutencao">Cond.</label>
                        <input type="radio" name="retrabalho" value="4" id="retrabalho_condicional" onclick="Clickretrabalho(this)">
                    </div>
                    <textarea class="textarea" name="retrabalho_obs" id="retrabalho_obs" maxlength="255" placeholder="Obs:"></textarea>
                    <!--------------------------------------------------------------------------------------------------------->
                    <label class="separador">_____________________________________</label>
                    <label for="data_armazenamento" style="font-size:53px; font-weight: bold; display: block; text-align: center">ARMAZENAMENTO - EMBALAGEM</label><br><br>
                    <br><br><label for="data_armazenamento">Data do armazenamento:</label>
                    <input type="text" class="textarea" name="data_armazenamento" id="data_armazenamento" placeholder="Data">
                    <label for="embalagem">O Qualidade foi acionada para analisar a embalagem (caixa)?</label>
                    <div>
                        <label for="na">N/A</label>
                        <input type="radio" name="embalagem" value="1" id="embalagem_na" onclick="Clickembalagem(this)">
                        <label for="manutencao">Sim</label>
                        <input type="radio" name="embalagem" value="2" id="embalagem_aprovado" onclick="Clickembalagem(this)">
                        <label for="manutencao">Nao</label>
                        <input type="radio" name="embalagem" value="3" id="embalagem_reprovado" onclick="Clickembalagem(this)">
                        <label for="manutencao">Cond.</label>
                        <input type="radio" name="embalagem" value="4" id="embalagem_condicional" onclick="Clickembalagem(this)">
                    </div>
                    <textarea class="textarea" name="embalagem_obs" id="embalagem_obs" maxlength="255" placeholder="Obs:"></textarea>
                    <label for="pregos">A caixa para armazenamento dos mangotes apresenta pregos, entre outros?</label>
                    <div>
                        <label for="na">N/A</label>
                        <input type="radio" name="pregos" value="1" id="pregos_na" onclick="Clickpregos(this)">
                        <label for="manutencao">Sim</label>
                        <input type="radio" name="pregos" value="2" id="pregos_aprovado" onclick="Clickpregos(this)">
                        <label for="manutencao">Nao</label>
                        <input type="radio" name="pregos" value="3" id="pregos_reprovado" onclick="Clickpregos(this)">
                        <label for="manutencao">Cond.</label>
                        <input type="radio" name="pregos" value="4" id="pregos_condicional" onclick="Clickpregos(this)">
                    </div>
                    <textarea class="textarea" name="pregos_obs" id="pregos_obs" maxlength="255" placeholder="Obs:"></textarea>
                    <!--------------------------------------------------------------------------------------------------------->
                    <label class="separador">_____________________________________</label>
                    <label for="data_armazenamento" style="font-size:53px; font-weight: bold; display: block; text-align: center">CONSIDERACOES FINAIS</label><br><br>
                    <label for="falha">Foi detectado falha durante a inspecao?</label>
                    <div>
                        <label for="falha">Nao</label>
                        <input type="radio" name="falha" value="1" id="falha_aprovado" onclick="Clickfalha(this)">
                        <label for="falha">Sim</label>
                        <input type="radio" name="falha" value="2" id="falha_reprovado" onclick="Clickfalha(this)">
                    </div>
                    <textarea class="textarea" name="falha_obs" id="falha_obs" maxlength="255" placeholder="Obs:"></textarea>
                    <label for="responsavel">O responsavel pelo setor foi acionado?</label>
                    <div>
                        <label for="responsavel">Nao</label>
                        <input type="radio" name="responsavel" value="1" id="responsavel_aprovado" onclick="Clickresponsavel(this)">
                        <label for="responsavel">Sim</label>
                        <input type="radio" name="responsavel" value="2" id="responsavel_reprovado" onclick="Clickresponsavel(this)">
                    </div>
                    <input type="text" class="textarea" name="responsavel_obs" id="responsavel_obs" placeholder="Nome do responsavel acionado">
                    <!--------------------------------------------------------------------------------------------------------->
                    <label class="separador">_____________________________________</label>
                    <label for="data_armazenamento" style="font-size:53px; font-weight: bold; display: block; text-align: center">OBSERVACOES DA QUALIDADE</label><br><br>
                    <textarea class="textarea" name="qualidade_obs" id="qualidade_obs" maxlength="255" placeholder="Obs:"></textarea>
                    <!--------------------------------------------------------------------------------------------------------->
                    <label class="separador">_____________________________________</label>
                    <label for="inspetor">Nome do inspetor:</label>
                    <input type="text" class="textarea" name="inspetor" id="inspetor" placeholder="Nome do inspetor">
                    <label for="data_inspecao">Data da inspecao:</label>
                    <input type="text" class="textarea" name="data_inspecao" id="data_inspecao" placeholder="Data da inspecao">

                    <label id="correto_label" class="status_relatorio"></label><br><br><br><br>
                    <input type="text" class="textarea" name="correto" id="correto">
                    <h2></h2>
                    <div>
                        <input class="botao_padrao" id="evento_enviar" type="submit" value="Salvar" style="margin-top: -60px">
                    </div>
                </form>
                <div id="mensagem">
                    <p style="font-size: 50px"></p>
                </div>
                <input class="botao_normal" id="evento_finalizar" type="button" value="Finalisar" onclick="botao_finalizar()">
                <input class="botao_normal" id="voltar" type="button" value="Voltar" onclick="botao_voltar()">
            </div>
        </main>
        <script>
            $('#status').hide();
            $('#correto').hide();
            $('#pedido').hide();
            $('#cliente').hide();
//            $('#status').show();
//            $('#correto').show();
//            $('#pedido').show();
//            $('#cliente').show();
            $('#cnpj').hide();
            $('#exigencias').hide();
            $('#encaixe_obs').hide();
            $('#solda_obs').hide();
            $('#cordoalha_obs').hide();
            $('#tipado_obs').hide();
            $('#tag_obs').hide();
            $('#cola_obs').hide();
            $('#pead_obs').hide();
            $('#corda_obs').hide();
            $('#silicone_obs').hide();
            $('#cupilha_obs').hide();
            $('#drenado_obs').hide();
            $('#plaqueta_obs').hide();
            $('#plaqueta_info_obs').hide();
            $('#diametro_obs').hide();
            $('#etiquetas_obs').hide();
            $('#modelo_obs').hide();
            $('#retrabalho_obs').hide();
            $('#embalagem_obs').hide();
            $('#pregos_obs').hide();
            $('#falha_obs').hide();
            $('#responsavel_obs').hide();
            if($lote != ""){
                $('#pedido_label').html("Pedido: " + $informacao.pedido);
                $('#cliente_label').html("Cliente: " + $informacao.cliente);
                $('#cnpj_label').html("CNPJ: " + $informacao.cnpj);
                $('#exigencia_label').html("Exigencias: " + $informacao.exigencias);
                /* CAMPOS INPUT PARA PODER ENVIAR NO FORM */
                document.getElementById('pedido').value = $informacao.pedido;
                document.getElementById('cliente').value = $informacao.cliente;
                document.getElementById('cnpj').value = $informacao.cnpj;
                document.getElementById('exigencias').value = $informacao.exigencias;
                
                document.getElementById('lote').value = $lote;
                document.getElementById('h_inicial').value = $informacao.h_inicial;
                document.getElementById('h_final').value = $informacao.h_final;
                document.getElementById('data').value = $informacao.data;
                
                myObject.pedido = $informacao.pedido;
                myObject.cliente = $informacao.cliente;
                myObject.cnpj = $informacao.cnpj;
                myObject.exigencia = $informacao.exigencias;
                myObject.lote = document.getElementById('lote').value;
                console.log(myObject);
                const myObjectString = JSON.stringify(myObject);
                localStorage.setItem('objectCliente', myObjectString);

                $('#status_label').html(myObject.status);
                document.getElementById('status').value = myObject.status;
                $('#correto_label').html("LIBERADO: " + $informacao.correto);
                document.getElementById('correto').value = $informacao.correto;

                if($informacao.empatacao == 1){
                    document.getElementById('empatacao_sem').checked = true;
                   }
                if($informacao.empatacao == 2){
                    document.getElementById('empatacao_com').checked = true;
                   }
                if($informacao.empatacao == 3){
                    document.getElementById('empatacao_na').checked = true;
                   }
                
                if($informacao.encaixe == 1){
                    document.getElementById('encaixe_na').checked = true;
                    $('#encaixe_obs').hide();
                   }
                if($informacao.encaixe == 2){
                    document.getElementById('encaixe_aprovado').checked = true;
                    $('#encaixe_obs').hide();
                   }
                if($informacao.encaixe == 3){
                    document.getElementById('encaixe_reprovado').checked = true;
                    $('#encaixe_obs').hide();
                   }
                if($informacao.encaixe == 4){
                    document.getElementById('encaixe_condicional').checked = true;
                    $('#encaixe_obs').show();
                   }
                document.getElementById('encaixe_obs').value = $informacao.encaixe_obs;

                if($informacao.solda == 1){
                    document.getElementById('solda_na').checked = true;
                    $('#solda_obs').hide();
                   }
                if($informacao.solda == 2){
                    document.getElementById('solda_aprovado').checked = true;
                    $('#solda_obs').hide();
                   }
                if($informacao.solda == 3){
                    document.getElementById('solda_reprovado').checked = true;
                    $('#solda_obs').hide();
                   }
                if($informacao.solda == 4){
                    document.getElementById('solda_condicional').checked = true;
                    $('#solda_obs').show();
                   }
                document.getElementById('solda_obs').value = $informacao.solda_obs;
                
                if($informacao.cordoalha == 1){
                    document.getElementById('cordoalha_na').checked = true;
                    $('#cordoalha_obs').hide();
                   }
                if($informacao.cordoalha == 2){
                    document.getElementById('cordoalha_aprovado').checked = true;
                    $('#cordoalha_obs').hide();
                   }
                if($informacao.cordoalha == 3){
                    document.getElementById('cordoalha_reprovado').checked = true;
                    $('#cordoalha_obs').hide();
                   }
                if($informacao.cordoalha == 4){
                    document.getElementById('cordoalha_condicional').checked = true;
                    $('#cordoalha_obs').show();
                   }
                document.getElementById('cordoalha_obs').value = $informacao.cordoalha_obs;
                
                if($informacao.tipado == 1){
                    document.getElementById('tipado_na').checked = true;
                    $('#tipado_obs').hide();
                   }
                if($informacao.tipado == 2){
                    document.getElementById('tipado_aprovado').checked = true;
                    $('#tipado_obs').hide();
                   }
                if($informacao.tipado == 3){
                    document.getElementById('tipado_reprovado').checked = true;
                    $('#tipado_obs').hide();
                   }
                if($informacao.tipado == 4){
                    document.getElementById('tipado_condicional').checked = true;
                    $('#tipado_obs').show();
                   }
                document.getElementById('tipado_obs').value = $informacao.tipado_obs;
                
                if($informacao.tag == 1){
                    document.getElementById('tag_na').checked = true;
                    $('#tag_obs').hide();
                   }
                if($informacao.tag == 2){
                    document.getElementById('tag_aprovado').checked = true;
                    $('#tag_obs').hide();
                   }
                if($informacao.tag == 3){
                    document.getElementById('tag_reprovado').checked = true;
                    $('#tag_obs').hide();
                   }
                if($informacao.tag == 4){
                    document.getElementById('tag_condicional').checked = true;
                    $('#tag_obs').show();
                   }
                document.getElementById('tag_obs').value = $informacao.tag_obs;
                document.getElementById('tag_numero').value = $informacao.tag_num;
                
                if($informacao.cola == 1){
                    document.getElementById('cola_na').checked = true;
                    $('#cola_obs').hide();
                   }
                if($informacao.cola == 2){
                    document.getElementById('cola_aprovado').checked = true;
                    $('#cola_obs').hide();
                   }
                if($informacao.cola == 3){
                    document.getElementById('cola_reprovado').checked = true;
                    $('#cola_obs').hide();
                   }
                if($informacao.cola == 4){
                    document.getElementById('cola_condicional').checked = true;
                    $('#cola_obs').show();
                   }
                document.getElementById('cola_obs').value = $informacao.cola_obs;

                if($informacao.pead == 1){
                    document.getElementById('pead_na').checked = true;
                    $('#pead_obs').hide();
                   }
                if($informacao.pead == 2){
                    document.getElementById('pead_aprovado').checked = true;
                    $('#pead_obs').hide();
                   }
                if($informacao.pead == 3){
                    document.getElementById('pead_reprovado').checked = true;
                    $('#pead_obs').hide();
                   }
                if($informacao.pead == 4){
                    document.getElementById('pead_condicional').checked = true;
                    $('#pead_obs').show();
                   }
                document.getElementById('pead_obs').value = $informacao.pead_obs;

                if($informacao.corda == 1){
                    document.getElementById('corda_na').checked = true;
                    $('#corda_obs').hide();
                   }
                if($informacao.corda == 2){
                    document.getElementById('corda_aprovado').checked = true;
                    $('#corda_obs').hide();
                   }
                if($informacao.corda == 3){
                    document.getElementById('corda_reprovado').checked = true;
                    $('#corda_obs').hide();
                   }
                if($informacao.corda == 4){
                    document.getElementById('corda_condicional').checked = true;
                    $('#corda_obs').show();
                   }
                document.getElementById('corda_obs').value = $informacao.corda_obs;
                document.getElementById('corda_cor').value = $informacao.corda_cor;

                if($informacao.silicone == 1){
                    document.getElementById('silicone_na').checked = true;
                    $('#silicone_obs').hide();
                   }
                if($informacao.silicone == 2){
                    document.getElementById('silicone_aprovado').checked = true;
                    $('#silicone_obs').hide();
                   }
                if($informacao.silicone == 3){
                    document.getElementById('silicone_reprovado').checked = true;
                    $('#silicone_obs').hide();
                   }
                if($informacao.silicone == 4){
                    document.getElementById('silicone_condicional').checked = true;
                    $('#silicone_obs').show();
                   }
                document.getElementById('silicone_obs').value = $informacao.silicone_obs;

                if($informacao.cupilha == 1){
                    document.getElementById('cupilha_na').checked = true;
                    $('#cupilha_obs').hide();
                   }
                if($informacao.cupilha == 2){
                    document.getElementById('cupilha_aprovado').checked = true;
                    $('#cupilha_obs').hide();
                   }
                if($informacao.cupilha == 3){
                    document.getElementById('cupilha_reprovado').checked = true;
                    $('#cupilha_obs').hide();
                   }
                if($informacao.cupilha == 4){
                    document.getElementById('cupilha_condicional').checked = true;
                    $('#cupilha_obs').show();
                   }
                document.getElementById('cupilha_obs').value = $informacao.cupilha_obs;

                if($informacao.drenado == 1){
                    document.getElementById('drenado_na').checked = true;
                    $('#drenado_obs').hide();
                   }
                if($informacao.drenado == 2){
                    document.getElementById('drenado_aprovado').checked = true;
                    $('#drenado_obs').hide();
                   }
                if($informacao.drenado == 3){
                    document.getElementById('drenado_reprovado').checked = true;
                    $('#drenado_obs').hide();
                   }
                if($informacao.drenado == 4){
                    document.getElementById('drenado_condicional').checked = true;
                    $('#drenado_obs').show();
                   }
                document.getElementById('drenado_obs').value = $informacao.drenado_obs;

                if($informacao.plaqueta == 1){
                    document.getElementById('plaqueta_na').checked = true;
                    $('#plaqueta_obs').hide();
                   }
                if($informacao.plaqueta == 2){
                    document.getElementById('plaqueta_aprovado').checked = true;
                    $('#plaqueta_obs').hide();
                   }
                if($informacao.plaqueta == 3){
                    document.getElementById('plaqueta_reprovado').checked = true;
                    $('#plaqueta_obs').hide();
                   }
                if($informacao.plaqueta == 4){
                    document.getElementById('plaqueta_condicional').checked = true;
                    $('#plaqueta_obs').show();
                   }
                document.getElementById('plaqueta_obs').value = $informacao.plaqueta_obs;

                if($informacao.plaqueta_info == 1){
                    document.getElementById('plaqueta_info_na').checked = true;
                    $('#plaqueta_info_obs').hide();
                   }
                if($informacao.plaqueta_info == 2){
                    document.getElementById('plaqueta_info_aprovado').checked = true;
                    $('#plaqueta_info_obs').hide();
                   }
                if($informacao.plaqueta_info == 3){
                    document.getElementById('plaqueta_info_reprovado').checked = true;
                    $('#plaqueta_info_obs').hide();
                   }
                if($informacao.plaqueta_info == 4){
                    document.getElementById('plaqueta_info_condicional').checked = true;
                    $('#plaqueta_info_obs').show();
                   }
                document.getElementById('plaqueta_info_obs').value = $informacao.plaqueta_info_obs;

                if($informacao.diametro == 1){
                    document.getElementById('diametro_na').checked = true;
                    $('#diametro_obs').hide();
                   }
                if($informacao.diametro == 2){
                    document.getElementById('diametro_aprovado').checked = true;
                    $('#diametro_obs').hide();
                   }
                if($informacao.diametro == 3){
                    document.getElementById('diametro_reprovado').checked = true;
                    $('#diametro_obs').hide();
                   }
                if($informacao.diametro == 4){
                    document.getElementById('diametro_condicional').checked = true;
                    $('#diametro_obs').show();
                   }
                document.getElementById('diametro_obs').value = $informacao.diametro_obs;

                if($informacao.etiquetas == 1){
                    document.getElementById('etiquetas_na').checked = true;
                    $('#etiquetas_obs').hide();
                   }
                if($informacao.etiquetas == 2){
                    document.getElementById('etiquetas_aprovado').checked = true;
                    $('#etiquetas_obs').hide();
                   }
                if($informacao.etiquetas == 3){
                    document.getElementById('etiquetas_reprovado').checked = true;
                    $('#etiquetas_obs').hide();
                   }
                if($informacao.etiquetas == 4){
                    document.getElementById('etiquetas_condicional').checked = true;
                    $('#etiquetas_obs').show();
                   }
                document.getElementById('etiquetas_obs').value = $informacao.etiquetas_obs;

                if($informacao.modelo == 1){
                    document.getElementById('modelo_na').checked = true;
                    $('#modelo_obs').hide();
                   }
                if($informacao.modelo == 2){
                    document.getElementById('modelo_aprovado').checked = true;
                    $('#modelo_obs').hide();
                   }
                if($informacao.modelo == 3){
                    document.getElementById('modelo_reprovado').checked = true;
                    $('#modelo_obs').hide();
                   }
                if($informacao.modelo == 4){
                    document.getElementById('modelo_condicional').checked = true;
                    $('#modelo_obs').show();
                   }
                document.getElementById('modelo_obs').value = $informacao.modelo_obs;

                if($informacao.retrabalho == 1){
                    document.getElementById('retrabalho_na').checked = true;
                    $('#retrabalho_obs').hide();
                   }
                if($informacao.retrabalho == 2){
                    document.getElementById('retrabalho_aprovado').checked = true;
                    $('#retrabalho_obs').hide();
                   }
                if($informacao.retrabalho == 3){
                    document.getElementById('retrabalho_reprovado').checked = true;
                    $('#retrabalho_obs').hide();
                   }
                if($informacao.retrabalho == 4){
                    document.getElementById('retrabalho_condicional').checked = true;
                    $('#retrabalho_obs').show();
                   }
                document.getElementById('retrabalho_obs').value = $informacao.retrabalho_obs;
                document.getElementById('data_armazenamento').value = $informacao.data_armazenamento;

                if($informacao.embalagem == 1){
                    document.getElementById('embalagem_na').checked = true;
                    $('#embalagem_obs').hide();
                   }
                if($informacao.embalagem == 2){
                    document.getElementById('embalagem_aprovado').checked = true;
                    $('#embalagem_obs').hide();
                   }
                if($informacao.embalagem == 3){
                    document.getElementById('embalagem_reprovado').checked = true;
                    $('#embalagem_obs').hide();
                   }
                if($informacao.embalagem == 4){
                    document.getElementById('embalagem_condicional').checked = true;
                    $('#embalagem_obs').show();
                   }
                document.getElementById('embalagem_obs').value = $informacao.embalagem_obs;

                if($informacao.pregos == 1){
                    document.getElementById('pregos_na').checked = true;
                    $('#pregos_obs').hide();
                   }
                if($informacao.pregos == 2){
                    document.getElementById('pregos_aprovado').checked = true;
                    $('#pregos_obs').hide();
                   }
                if($informacao.pregos == 3){
                    document.getElementById('pregos_reprovado').checked = true;
                    $('#pregos_obs').hide();
                   }
                if($informacao.pregos == 4){
                    document.getElementById('pregos_condicional').checked = true;
                    $('#pregos_obs').show();
                   }
                document.getElementById('pregos_obs').value = $informacao.pregos_obs;

                if($informacao.falha == 1){
                    document.getElementById('falha_aprovado').checked = true;
                    $('#falha_obs').hide();
                   }
                if($informacao.falha == 2){
                    document.getElementById('falha_reprovado').checked = true;
                    $('#falha_obs').show();
                   }
                document.getElementById('falha_obs').value = $informacao.falha_obs;

                if($informacao.responsavel == 1){
                    document.getElementById('responsavel_aprovado').checked = true;
                    $('#responsavel_obs').hide();
                   }
                if($informacao.responsavel == 2){
                    document.getElementById('responsavel_reprovado').checked = true;
                    $('#responsavel_obs').show();
                   }
                document.getElementById('responsavel_obs').value = $informacao.responsavel_obs;
                document.getElementById('qualidade_obs').value = $informacao.qualidade_obs;
                document.getElementById('inspetor').value = $informacao.inspetor;
                document.getElementById('data_inspecao').value = $informacao.data_inspecao;
            } else {
                $('#pedido_label').html("Pedido: " + myObject.pedido);
                $('#cliente_label').html("Cliente: " + myObject.cliente);
                $('#cnpj_label').html("CNPJ: " + myObject.cnpj);
                $('#exigencia_label').html("Exigencias: " + myObject.exigencia);
                document.getElementById('pedido').value = myObject.pedido;
                document.getElementById('cliente').value = myObject.cliente;
                document.getElementById('cnpj').value = myObject.cnpj;
                document.getElementById('exigencias').value = myObject.exigencia;
                $('#status_label').html("ABERTO");
                document.getElementById('status').value = "ABERTO";
                $('#correto_label').html("LIBERADO: NAO");
                document.getElementById('correto').value = "NAO";
            };
            
            
            if($finalizado == "0"){
                $('#evento_finalizar').show();
                $('#evento_enviar').show();
                if(typeof $informacao != "undefined"){
                    if($informacao.correto == "NAO"){
                        $('#evento_finalizar').hide();
                    }
                } else {
                    $('#evento_finalizar').hide();
                }
            } else {
                $('#evento_finalizar').hide();
                $('#evento_enviar').hide();
            }
            $('#salvar_relatorio').submit(function(e) {
                e.preventDefault();
                var formulario = $(this);
                var retorno = cria_evento_manutencao(formulario);
            });
            
            function cria_evento_manutencao(dados){
                $lote = document.getElementById('lote').value;
                if ($lote != "") {
                    $.ajax({
                        type:"POST",
                        data:dados.serialize(),
                        url:"_filtros/criar_relatorio.php",
                        async:false
                    }).then(sucesso,falha);

                    function sucesso(data) {
                        $data = $.parseJSON(data);
                        $('#mensagem p').html($data.mensagem);
                        $('#mensagem p').show();
                        setTimeout(function() {
                            $('#mensagem p').fadeOut(); 
                        }, 5000);
                        myObject.lote = document.getElementById('lote').value;
                        console.log(myObject);
                        const myObjectString = JSON.stringify(myObject);
                        localStorage.setItem('objectCliente', myObjectString);

                        window.location.href = "qualidade_checklist.php";
                    }
                    function falha() {
                        $('#mensagem p').html("Erro");
                    }
                } else {
                        $('#mensagem p').html("Lote é obrigatório");
                        $('#mensagem p').show();
                        setTimeout(function() {
                            $('#mensagem p').fadeOut(); 
                        }, 5000);
                }
            }

        </script>
    </body>
</html>

<?php
    mysqli_close($conecta);
?>
