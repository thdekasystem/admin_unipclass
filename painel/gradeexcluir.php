<?php
    session_start();
    if(! isset($_SESSION['usuario_unip']))
    {
        header("Location: login.php");
    }
    include_once("Modelo/conexao.php");
    include_once("Modelo/turma.php");
    ini_set('default_charset', 'UTF-8');
    if(isset($_GET["cursoturma"]) and isset($_GET["semestre"]) and isset($_GET["periodo"]))
    {
        $cursoturma = $_GET["cursoturma"];
        $periodo    = $_GET["periodo"];
        $semestre   = $_GET["semestre"];
        $exclucaoTurma = new Turma($cursoturma,null, $periodo, $semestre);
        $exclucaoTurma->excluirTurma();
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
            <button id="adcTurma" onclick="window.location.href='grade.php'">Adicionar Turma</button>
            <button id="excTurma" > Excluir Turma</button>
            <button id="edtTurma" onclick="window.location.href='gradeditar.php'"> Editar Turma</button>
        </div>
        <div id='addturma'>
            <form method="get" action="gradeexcluir.php">
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
                <br>
                <input type="submit" value="Excluir">
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
            var newUrl = "http://localhost/Deka/painel/gradeexcluir.php?cursoturma=" + itemSelecionado;
            window.location.href = newUrl;
            
            
        }

    </script>
</html>
<?php
    mysqli_close($conecta);
?>