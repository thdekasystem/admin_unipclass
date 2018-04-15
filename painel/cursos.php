<?php
    session_start();
    if(! isset($_SESSION['usuario_unip']))
    {
        header("Location: login.php");
    }


    include_once("Modelo/curso.php");
    ini_set('default_charset', 'UTF-8');
    if(isset($_POST["curso"]) and isset($_POST["semestres"]))
    {
        $curso = new Curso($_POST["curso"], null, $_POST["semestres"]);
        $curso->addCurso();
    }
?>
<?php
    if(isset($_POST["cursoexcluir"]))
    {
        $curso = new Curso(null, $_POST["cursoexcluir"], null);
        $curso->excluirCurso();
    }
?>
<!DOCTYPE html>
<html>
    <meta charset="utf-8"/>
    <head>
        <title>Gerenciar Cursos - Unip Class</title>
         <script
            src="http://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			crossorigin="anonymous">
        </script>
       <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
    <body>
        <header id="cabecalho">
            <a id='home' href="admin.php">Home</a>
            <a id='cursos'>Cursos</a>
            <a id='grade' href="grade.php">Turmas</a>
            <a id='salas' href="salas.php">Salas</a>
        </header>
        <div id='botoesCursos'>
            <button id="adcionar">Adicionar Cursos</button>
            <button id="excluir"> Excluir Cursos</button>
        </div>
        <div id="editor" name="editor"></div>
        <div id='excluidor' name='excluidor' hidden="hidden">
            <form method='post' action='cursos.php'>
                <select name='cursoexcluir'>
                <?php
                    include_once("Modelo/conexao.php");
                    $info = array();
                    $acesso = "SELECT * FROM Cursos";
                    $query  = mysqli_query($conecta, $acesso);
                    if($query)
                    {
                        while($info = mysqli_fetch_array($query))
                        {
                            echo "<option value='". $info['idCursos'] . "'>". $info['Nome'] ."</option>" ;
                        }
                    }
                ?>
                </select>
                <br>
                <input type="submit" value="Excluir">
            </form>
        </div>
    </body>
    <script>
            $("#adcionar").click(function(){
                $("#editor").replaceWith("<div id='editor'></div>");
                $("#excluidor").hide();
                $("#editor").append(
                            "<form method='post' action='cursos.php'>"+
                            "<a>Curso</a><br><input type='text' name='curso' id='curso' placeholder='Nome do Curso'>"+
                            "<br><a>Quantidade de Semestres</a><br><input type='number' name='semestres' id='semestres' min='1' max='10'> "+
                            " "+
                            "<br><input type='submit' value='Adcionar Curso'>"+
                            "</form>"
                            );

            });        
            $("#excluir").click(function(){
                $("#editor").replaceWith("<div id='editor'></div>");
                $("#excluidor").toggle();
            });    

    </script>
</html>
