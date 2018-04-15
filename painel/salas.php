<?php
    session_start();
    if(! isset($_SESSION['usuario_unip']))
    {
        header("Location: login.php");
    }
    include_once("Modelo/conexao.php");
    include_once("Modelo/sala.php");
    ini_set('default_charset', 'UTF-8');
    if(isset($_POST["sala"]))
    {
         
        $sala = new Sala();
        $sala->setSala($_POST["sala"]);
        $sala->adcionarSala();
    }
    if(isset($_POST["salaexcluir"]))
    {
     
        $sala = new Sala();
        $sala->setSalaNum($_POST["salaexcluir"]);
        $sala->excluirSala();
    }

?>
<!DOCTYPE html>
<html>
    <meta charset="utf-8"/>
    <head>
        <title>Gerenciar Salas - Unip Class</title>
        <script
            src="http://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			crossorigin="anonymous">
        </script>
        <script src="jquery.maskedinput.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
    <body>
        <header id="cabecalho">
            <a id='home' href="admin.php">Home</a>
            <a id='cursos' href="cursos.php">Cursos</a>
            <a id='grade' href="grade.php">Turmas</a>
            <a id='salas'>Salas</a>
        </header>
        <div id='botoesSala'>
            <button id="adcSala">Adicionar Sala</button>
            <button id="excSala"> Excluir Sala</button>
        </div>
        <div id='addsala' hidden="hidden">
            <form method="post" action="salas.php">
                <a>Sala</a>
                <br>
                <input type="text" placeholder="exemplo: E12" maxlength="3" name="sala" id="sala" style="text-transform:uppercase">
                <br>
                <input type="submit" value="Adcionar">
            </form>
        </div>  
        <div id='excluirsala' hidden="hidden">
            <form method="post" action="salas.php">
                <a>Sala</a>
                <br>
                <select name="salaexcluir">
                    <?php
                        $salas   = array();
                        $acessar = "SELECT * FROM Salas";
                        $query   = mysqli_query($conecta, $acessar);
                        if($query)
                        {
                            while($salas = mysqli_fetch_array($query))
                            {
                                echo "<option value='". $salas['idSalas'] . "'>". $salas['Nome'] ."</option>" ;
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
                $("#adcSala").click(function(){
                    $("#excluirsala").hide();
                    $("#addsala").toggle();
                }); 
                $("#excSala").click(function(){
                    $("#addsala").hide();
                    $("#excluirsala").toggle();
                });
        
    </script>
    <script>
            
            $(function($){
               $("#sala").mask("a00");
            });
    </script>
</html>
<?php
    mysqli_close($conecta);
?>