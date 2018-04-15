
<?php


//adcionar e excluir salas
class Sala
{
    private $sala ="";
    private $salaNum = 0;
    function __construct()
    {
        
    }
    public function setSala($value)
    {
        $this->sala = $value;
    }
    public function setSalaNum($value)
    {
        $this->salaNum = $value;
    }
    public function adcionarSala()
    {
        include("conexao.php");
        $inserir = "INSERT INTO Salas (idSalas, Nome) VALUES( NULL, '$this->sala')";
        $query   = mysqli_query($conecta, $inserir);
        if($query)
        {
            echo "<script> alert('Sala adcionada com Sucesso!');</script>";
        }
        else
        {
             echo "<script> alert('ERRO ao adcionar a Sala!');</script>";
        }
    }
    
    function excluirSala()
    {
        include("conexao.php");
        $deletar = "DELETE FROM Salas WHERE idSalas = '$this->salaNum'";
        $query   = mysqli_query($conecta, $deletar);
        if($query)
        {
            echo "<script> alert('Sala excluida com Sucesso!');</script>";
        }
        else
        {
             echo "<script> alert('ERRO ao excluir a Sala!');</script>";
        }
    }
}
?>