<?php
    class Curso
    {
        private $curso = "";
        private $idCurso = 0;
        private $semestres = 0;
        public function __construct($valueCurso, $valueIdCurso, $valueSemestres)
        {
            $this->curso = $valueCurso;
            $this->idCurso = $valueIdCurso;
            $this->semestres = $valueSemestres;
        }
        
        public function addCurso()
        {
            include_once("Modelo/conexao.php");
            $inserir = "INSERT INTO Cursos (idCursos, Nome, Semestres) VALUES( NULL, '$this->curso', '$this->semestres')";
            $query = mysqli_query($conecta, $inserir);
            if($query)
            {
                echo "<script> alert('Curso Cadastrado com Sucesso!');</script>";
            }
            else
            {
                 echo "<script> alert('ERRO ao cadastrar o Curso!');</script>";
            }
        }
        public function excluirCurso()
        {
            include_once("Modelo/conexao.php");
            $deletar = "DELETE FROM Cursos WHERE idCursos = '$this->idCurso'";
            $query   = mysqli_query($conecta, $deletar);
            if($query)
            {
                echo "<script> alert('Curso Deletado com Sucesso!');</script>";
            }
            else
            {
                 echo "<script> alert('ERRO ao Deletar o Curso!');</script>";
            }   
        }
    }
?>