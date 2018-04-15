<?php
    
    if($_GET["tabela"] == "salas")
    {
        include_once("painel/Modelo/conexao.php");
        $selecionar_salas = "SELECT * FROM Salas";
        $query = mysqli_query($conecta, $selecionar_salas);
        $info = array( );
        while($r = mysqli_fetch_assoc($query)) 
        {
            $info[] = $r;
        }
        header("Content-type:application/json"); 
        echo json_encode($info);
    }
    else if($_GET["tabela"] == "turmas")
    {
        include_once("painel/Modelo/conexao.php");
        $selecionar_salas = "SELECT * FROM Turmas";
        $query = mysqli_query($conecta, $selecionar_salas);
        $info = array( );
        while($r = mysqli_fetch_assoc($query)) 
        {
            $info[] = $r;
        }
        header("Content-type:application/json"); 
        echo json_encode($info);
    }
    else if($_GET["tabela"] == "cursos")
    {
        include_once("painel/Modelo/conexao.php");
        $selecionar_salas = "SELECT * FROM Cursos";
        $query = mysqli_query($conecta, $selecionar_salas);
        $info = array( );
        while($r = mysqli_fetch_assoc($query)) 
        {
            $info[] = $r;
        }
        header("Content-type:application/json"); 
        echo json_encode($info);
    }
    else
    {
        header("Location: painel/login.phps");
    }
  
?>
