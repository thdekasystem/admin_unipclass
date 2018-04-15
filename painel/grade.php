<?php
    session_start();
    if(! isset($_SESSION['usuario_unip']))
    {
        header("Location: login.php");
    }
    include_once("Modelo/conexao.php");
    include_once("Modelo/turma.php");
    ini_set('default_charset', 'UTF-8');
    if(isset($_GET["sala"]))
    {
        $cursoturma = $_GET["cursoturma"];
        $sala       = $_GET["sala"];
        $periodo    = $_GET["periodo"];
        $semestre   = $_GET["semestre"];
        $novaTurma = new Turma($cursoturma, $sala, $periodo, $semestre);
        $novaTurma->adcionarTurma();
    }

?>
<!DOCTYPE html>
<html>
    <meta charset="utf-8"/>
    <head>
        <title>Gerenciar Turmas - Unip Class</title>
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
            <a id='cursos' href="cursos.php">Cursos</a>
            <a id='grade'>Turmas</a>
            <a id='salas' href="salas.php">Salas</a>
        </header>
        <div id='botoesTurmas'>
            <button id="adcTurma">Adicionar Turma</button>
            <button id="excTurma" onclick="window.location.href='gradeexcluir.php'"> Excluir Turma</button>
            <button id="edtTurma" onclick="window.location.href='gradeditar.php'"> Editar Turma</button>
        </div>
        <div id='addturma'>
            <form method="get" action="grade.php">
                <select name="cursoturma" id="cursoturma" onchange="myFunction()">
                    <option value=""></option>

                    <?php
                        $cursos = array();
                            $acesso = "SELECT * FROM Cursos";
                            $query  = mysqli_query($conecta, $acesso);
                        if($query)
                        {
                            while($cursos = mysqli_fetch_array($query))
                            {
                                $selecionado= "";
                                if(isset($_GET["cursoturma"]) and ($cursos["idCursos"] == $_GET["cursoturma"]) )
                                {
                                    $selecionado = "selected";
                                }
                                echo "<option value='". $cursos['idCursos'] . "' ".$selecionado .">". $cursos['Nome'] ."</option>" ;
                            }
                        }
                    ?>
                </select>
                
                <br>
                <select name="periodo">
                    <option value="matutino">Matutino</option>
                    <option value="noturno">Noturno</option>
                </select>
                <br>
                <select name="semestre" id="semestre" >
                    <?php 
                        $numero_semestres  = array();
                        $curso_selecionado = $_GET["cursoturma"];
                        $acessar           = "SELECT * FROM Cursos WHERE idCursos = '$curso_selecionado'";
                        $query             = mysqli_query($conecta, $acessar);
                        $numero_semestres  = mysqli_fetch_assoc($query);
                        for ($i = 1; $i <= $numero_semestres["Semestres"]; $i++)
                        {
                            echo "<option value='". $i ."'>". $i ."</option>";
                        }
                    ?>
                </select>
                <br>
                <a>Escolha a Sala</a>
                <br>
                <select name="sala" id="sala_turma">
                    <?php
                        $salas       = array();
                        $acessar = "SELECT * FROM Salas"; 
                        $query   = mysqli_query($conecta, $acessar);
                        while($salas = mysqli_fetch_array($query))
                        {
                            echo "<option value='". $salas["idSalas"] ."'>" . $salas["Nome"] . "</option>" ;
                        }    
                    ?>
                </select>
                <br>
                <input type="submit" value="Adcionar">
            </form>
        </div>   
        

    </body>
        <script>
    </script>
    <script>
        function myFunction()
        {
            var e = document.getElementById("cursoturma");
            var itemSelecionado = e.options[e.selectedIndex].value;
            var newUrl = "http://localhost/Deka/painel/grade.php?cursoturma=" + itemSelecionado;
            window.location.href = newUrl;
            
            
        }

    </script>
</html>