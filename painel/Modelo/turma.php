<?php
class Turma
{
    private  $idCursos = 0;
    private  $idSalas  = 0;
    private  $periodo  = "";
    private  $semestre = 0;
    
    public function __construct($idcursos, $idsalas, $periodos, $semestres)
    {
        $this->idCursos = $idcursos;
        $this->idSalas  = $idsalas;
        $this->periodo  = $periodos;
        $this->semestre = $semestres;
    
    }

    public function adcionarTurma()
    {
        include("conexao.php");
        $this->periodo = mysqli_real_escape_string($conecta, $this->periodo);
        $sql  = "SELECT idTurmas FROM Turmas WHERE Cursos_idCursos ='$this->idCursos' AND Periodo = '$this->periodo' AND Semestre = '$this->semestre' "; 
        $query    = mysqli_query($conecta, $sql);
        $info     = mysqli_fetch_assoc($query);
        if(mysqli_num_rows($query) >=1)
        {
            echo"<script>alert('Essa turma já foi adcionado, vá em Editar turma para atualizar')</script>";
        }
        else
        {
            $sql  = "INSERT INTO `Turmas` (`idTurmas`, `Cursos_idCursos`, `Salas_idSalas`, `Periodo`, `Semestre`) VALUES (NULL, '{$this->idCursos}', '{$this->idSalas}', '{$this->periodo}', '{$this->semestre}')";
            // INSERT INTO `Turmas` (`idTurmas`, `Cursos_idCursos`, `Salas_idSalas`, `Periodo`, `Semestre`) VALUES (NULL, '4', '2', 'matutino', '2');
            $query    = mysqli_query($conecta, $sql);
            
            if($query)
            {
            
                echo "<script> alert('Turma adcionada com sucesso!'); </script>";
            }
            else
            {
                echo mysqli_error($conecta);
                echo "<script> alert('ERRO ao adcionar turma!'); </script>";
            }
        }


    }
    public function editarTurma()
    {
        include("conexao.php");
        $info = array();
        $this->periodo = mysqli_real_escape_string($conecta, $this->periodo);
        $sql  = "SELECT idTurmas FROM Turmas WHERE Cursos_idCursos ='$this->idCursos' AND Periodo = '$this->periodo' AND Semestre = '$this->semestre' "; 
        $query    = mysqli_query($conecta, $sql);
        $info     = mysqli_fetch_assoc($query);
        $idTurma  = $info['idTurmas'];
        $trocarsala = "UPDATE Turmas SET Salas_idSalas = '$this->idSalas' WHERE idTurmas = '$idTurma' ";
        $query    = mysqli_query($conecta, $trocarsala) or die(mysqli_error());
        if($query)
        {
            
            echo "<script> alert('Nova Sala atualizada  com sucesso!'); </script>";
        }
        else
        {
            echo mysqli_error($conecta);
            echo "<script> alert('ERRO ao atualizar Sala!'); </script>";
        }
        
    }
    
    public function excluirTurma()
    {
        include("conexao.php");
        $info = array();
        $this->periodo = mysqli_real_escape_string($conecta, $this->periodo);
        $sql  = "SELECT idTurmas FROM Turmas WHERE Cursos_idCursos ='$this->idCursos' AND Periodo = '$this->periodo' AND Semestre = '$this->semestre' "; 
        $query    = mysqli_query($conecta, $sql);
        $info     = mysqli_fetch_assoc($query);
        $idTurma  = $info['idTurmas'];
        $deletar  = "DELETE FROM Turmas WHERE idTurmas = '$idTurma'";
        $query    = mysqli_query($conecta, $deletar);
                if($query)
        {
            
            echo "<script> alert('Turma excluida com sucesso!'); </script>";
        }
        else
        {
            echo mysqli_error($conecta);
            echo "<script> alert('ERRO ao exluir a turma!'); </script>";
        }
    }
}
?>