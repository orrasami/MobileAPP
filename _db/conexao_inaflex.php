<?php
    //1. ABERTURA DA CONECÇÃO
    $conecta = mysqli_connect("mysql.inaflex.kinghost.net","inaflex","zt4cr3","inaflex");
    //2. TESTE DA CONECÇÃO
    if (mysqli_connect_errno()) {
        die("Conexaofalhou: " . mysqli_connect_errno());
    }
?>