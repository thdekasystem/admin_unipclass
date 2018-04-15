<?php
    session_start();
    include_once("Modelo/conexao.php");
    if(isset($_POST["usuario"]))
    {
        if(isset($_POST["senha"]))
        {
            $usuario = $_POST["usuario"];
            $senha   = $_POST["senha"];
            $logarse = "SELECT * FROM admin WHERE login = '$usuario' and senha = '$senha' ";
            $query   = mysqli_query($conecta, $logarse);
            if(mysqli_num_rows($query) == 1)
            {
                $_SESSION['usuario_unip'] = $usuario;
                header("Location: admin.php");
            }
            else
            {
                echo"<script> alert('Usuário e/ou senha inválidos!');</script>";
            }
        }
        else
        {
            echo "<script> alert('Favor digitar a senha!');</script>";
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Login - Unip Class</title>
        <script
            src="http://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			crossorigin="anonymous">
        </script>
       <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
    <body>
        <form action="login.php" method="post" autocomplete="off" >
            <input type="text" placeholder="Usuário" name="usuario">
            <input type="password" placeholder="Senha" name="senha">
            <input type="submit" value="Entrar">
        </form>
    </body>
</html>