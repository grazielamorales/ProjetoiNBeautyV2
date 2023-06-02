
<?php

class ServicoController{
    private $param;
    public function __construct(){

        $this->param = conexao::getInstancia();
    
    }


    public function listar()
    {
        $servicoDAO = new servicoDAO($this->param);
        $retorno = $servicoDAO->buscarTodoServicos();

        require_once "views/listar_servico.php";
        
    }


    public function inserir()
    {
        
        if($_POST)
        {
            //verificaçoes
            //se tudo certo,inserir no BD      
	
            $erro = false;
            if($_POST["descritivo"] == "")
            {
                $erro = true;
                echo "<script>alert('Preencha o nome do serviço')</script>";
            }
          
            if($_POST["preco"] == "")
            {
                $erro = true;
                echo "<script>alert('Preencha o Valor do Servico')</script>";
            }


            if($_POST["tempo"] == "")
            {
                $erro = true;
                echo "<script>alert('Preencha o Tempo estimado para esse serviço')</script>";
            }

            if($_POST["preco"] == "")
            {
                $erro = true;
                echo "<script>alert('Preencha o Nome do Profissional')</script>";
            }



           
        }
           

    }
}
?>