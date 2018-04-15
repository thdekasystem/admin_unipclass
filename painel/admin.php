<?php
    session_start();
    if(! isset($_SESSION['usuario_unip']))
    {
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html>
    <meta charset="utf-8"/>
    <head>
        <title>Administrador - Unip Class</title>
         <script
            src="http://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			crossorigin="anonymous">
        </script>
       <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
    <body>
        <header id="cabecalho">
            <a id='home' >Home</a>
            <a id='cursos' href="cursos.php">Cursos</a>
            <a id='grade' href="grade.php">Turmas</a>
            <a id='salas' href="salas.php">Salas</a>
        </header>
    </body>
</html>