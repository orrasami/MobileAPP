<?php require_once("_db/conexao_inaflex.php"); ?>

<?php
    session_start();

    if (isset($_SESSION["usuario_sessao"])) {
        $_SESSION["cliente"] = "Cliente não selecionado...";
        $_SESSION["cnpj"] = "CNPJ...";
        $_SESSION["demanda"] = "Demandas...";
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

//BOTÃO LOGOUT------------------------------------------------------------------
            function logOut(){
                window.location.href = "index.php";
            }
            
            function botao_voltar(){
                window.location.href = "qualidade_selecao.php";
            }
            
            function checklist(){
                $cliente = document.getElementById('cliente').innerHTML;
                if ($cliente == "Cliente não selecionado...") {
                    $('#mensagem p').html("Selecionar cliente");
                    $('#mensagem p').show();
                    setTimeout(function() {
                        $('#mensagem p').fadeOut(); 
                    }, 5000);
                } else {
                    myObject.pedido = $pedido;
                    myObject.cliente = $data.cliente;
                    myObject.cnpj = $data.cnpj;
                    myObject.exigencia = $exigencia;

                    const myObjectString = JSON.stringify(myObject);
                    localStorage.setItem('objectCliente', myObjectString);
                    window.location.href = "qualidade_checklist.php";
                }
                    
            }
            
        </script>
    </head>

    <body>
        <?php include_once("_incluir/topo.php"); ?>
        
        <main>  
            <div id="criar_evento">
                <form id="cadeastro_cliente">
                    <h2>QUALIDADE</h2>
                    <h3>CADASTRO CLIENTE</h3>
                    <input type="text" class="textarea" name="pedido" id="pedido" placeholder="Pedido">
                    <label id="cliente" style="font-size: 50px"><?php echo $_SESSION["cliente"] ?></label><br><br><br><br>
                    <label id="cnpj" style="font-size: 50px"><?php echo $_SESSION["cnpj"] ?></label><br><br><br><br>
                    <label id="exigencia" style="font-size: 50px"><?php echo $_SESSION["demanda"] ?></label>
                    <h2></h2>
                    <div>
                        <input class="botao_padrao" id="evento_enviar" type="submit" value="Atualiza">
                    </div>
                </form>
                <input type="button" id="confirma_cliente" class="botao_normal" value="Confirma?" onclick="checklist()">
                <input class="botao_normal" id="voltar" type="button" value="Voltar" onclick="botao_voltar()">
                <div id="mensagem">
                    <p style="font-size: 50px"></p>
                </div>
            </div>
        </main>
        <script>
            $('#cadeastro_cliente').submit(function(e) {
                e.preventDefault();
                var formulario = $(this);
                var retorno = cria_evento_manutencao(formulario);
            });
            
            function cria_evento_manutencao(dados){
                $pedido = document.getElementById('pedido').value;
                if ($pedido.length >= 0) {
                    $.ajax({
                        type:"POST",
                        data:dados.serialize(),
                        url:"_filtros/pegar_cliente.php",
                        async:false
                    }).then(sucesso,falha);

                    function sucesso(data) {
                        console.log(data);
                        $data = $.parseJSON(data);
                        $('#cliente').html($data.cliente);
                        $('#cnpj').html($data.cnpj);
                        console.log($data);
                        $pedido = document.getElementById('pedido').value
                        if ($data.exigencia == ""){
                            $exigencia = "Sem exigencias para esse cliente"
                            $('#exigencia').html($exigencia);
                        } else  {
                            $exigencia = $data.exigencia
                            $('#exigencia').html($exigencia);
                        }
                        $lote = myObject.lote;
                        myObject.pedido = $pedido;
                        myObject.cliente = $data.cliente;
                        myObject.cnpj = $data.cnpj;
                        myObject.exigencia = $exigencia;

                        const myObjectString = JSON.stringify(myObject);
                        localStorage.setItem('objectCliente', myObjectString);
                        
                        $('#mensagem p').html($data.mensagem);
                        $('#mensagem p').show();
                        setTimeout(function() {
                            $('#mensagem p').fadeOut(); 
                        }, 5000);
                        document.getElementById('pedido').value = "";
                    }
                    function falha() {
                        $('#mensagem p').html("Erro");
                        document.getElementById('pedido').value = "";
                    }
                } else {
                        $('#mensagem p').html("Comentario muito curto");
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
