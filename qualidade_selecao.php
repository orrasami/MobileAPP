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

//BOTÃO LOGOUT------------------------------------------------------------------
            function logOut(){
                window.location.href = "index.php";
            }
            
            function criar_relatorio(){
                $pedido = "";
                $cliente = "";
                $cnpj = "";
                $exigencia = "";
                $lote = "";
                $status = "ABERTO";
                const myObject = {pedido: $pedido, cliente: $cliente, cnpj: $cnpj, exigencia: $exigencia, lote:$lote, status:$status};
                const myObjectString = JSON.stringify(myObject);
                localStorage.setItem('objectCliente', myObjectString);
                window.location.href = "qualidade_cliente.php";
            }

        </script>
    </head>

    <body>
        <?php include_once("_incluir/topo.php"); ?>
        
        <main>  
            <div id="criar_evento">
                <form id="cadastro_lote">
                    <h2>QUALIDADE</h2>
                    <h3>SELECIONAR LOTE</h3>
                    <label class="separador">_____________________________________</label>
                    <label for="lote">Digitar o Lote:</label>
                    <input type="text" class="textarea" name="lote" id="lote" placeholder="# Lote" value="<?php if(isset($_GET['lote'])) { echo($_GET['lote']); } ?>">
                    <label></label>
                    <input class="botao_padrao" id="seleciona_lote" type="submit" value="Editar">
                </form>
                <label class="separador">_____________________________________</label>
                <input type="button" id="novo_lote" class="botao_normal" value="Novo" onclick="criar_relatorio()">
                <div id="mensagem">
                    <p style="font-size: 50px"></p>
                </div>
            </div>
        </main>
        <script>
            $lote = document.getElementById('lote').value;
            if($lote != ""){
                setTimeout(function() {
                    document.getElementById('seleciona_lote').click();
                }, 500);
            }
            $('#cadastro_lote').submit(function(e) {
                e.preventDefault();
                var formulario = $(this);
                var retorno = cria_evento_manutencao(formulario);
            });
            
            function cria_evento_manutencao(dados){
                $.ajax({
                    type:"POST",
                    data:dados.serialize(),
                    url:"_filtros/pegar_lote.php",
                    async:false
                }).then(sucesso,falha);

                function sucesso(data) {
                    $data = $.parseJSON(data);

                    $pedido = "";
                    $cliente = "";
                    $cnpj = "";
                    $exigencia = "";
                    $lote = document.getElementById('lote').value;
                    console.log($data);
                    if($data.finalizado == "Relatorio aberto") {
                        $status = "ABERTO"
                    }
                    if($data.finalizado == "Relatorio finalizado") {
                        $status = "FINALIZADO"
                    }
                    if($data.finalizado == "Relatorio aberto" || $data.finalizado == "Relatorio finalizado") {
                    const myObject = {pedido: $pedido, cliente: $cliente, cnpj: $cnpj, exigencia: $exigencia, lote:$lote, status:$status};
                    const myObjectString = JSON.stringify(myObject);
                    localStorage.setItem('objectCliente', myObjectString);
                    window.location.href = "qualidade_checklist.php";
                    }
                    
                    $('#mensagem p').html($data.finalizado);
                    $('#mensagem p').show();
                    setTimeout(function() {
                        $('#mensagem p').fadeOut(); 
                    }, 5000);
                }
                function falha() {
                }
            }

        </script>
    </body>
</html>

<?php
    mysqli_close($conecta);
?>
