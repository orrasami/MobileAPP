<?php require_once("_db/conexao_inaflex.php"); ?>

<?php
    session_start();

    if (isset($_SESSION["usuario_sessao"])) {
//        $_SESSION["cliente"] = "Cliente não selecionado...";
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
            
        </script>
    </head>

    <body>
        <?php include_once("_incluir/topo.php"); ?>
        
        <main>  
            <div id="criar_evento">
                <form id="form_criar_evento">
                    <h2>MANUTENÇÃO</h2>
                    <h3>CRIAR EVENTO <?php $comentario ?></h3>
                    <textarea class="textarea" name="descricao" id="descricao" maxlength="255"></textarea>                  
                    <h2></h2>
                    <div>
                        <input class="botao_padrao" id="evento_enviar" type="submit" value="Criar Evento">
                    </div>
                    <div id="mensagem">
                        <p style="font-size: 50px"></p>
                    </div>
                </form>
            </div>
        </main>
        <script>
            $('#form_criar_evento').submit(function(e) {
                e.preventDefault();
                var formulario = $(this);
                var retorno = cria_evento_manutencao(formulario);
            });
            
            function cria_evento_manutencao(dados){
                $comentario = document.getElementById('descricao').value;
                if ($comentario.length > 5) {
                    $.ajax({
                        type:"POST",
                        data:dados.serialize(),
                        url:"_filtros/criar_evento_manutencao.php",
                        async:false
                    }).then(sucesso,falha);

                    function sucesso(data) {
                        $data = $.parseJSON(data);
                        $('#mensagem p').html($data.mensagem);
                        $('#mensagem p').show();
                        setTimeout(function() {
                            $('#mensagem p').fadeOut(); 
                        }, 5000);
                        document.getElementById('descricao').value = "";
                    }
                    function falha() {
                        $('#mensagem p').html("Erro");
                        document.getElementById('descricao').value = "";
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
