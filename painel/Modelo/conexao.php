<?php   
    $conecta = mysqli_connect("localhost", "root","" ,"Unip");
    mysqli_set_charset($conecta,"utf8");
    if( mysqli_connect_errno() ){
        die("falha na conexão: " . mysqli_connect_errno());
    }
?>