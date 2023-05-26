
<?php

class ServicoController{
    private $param;
    public function __construct(){

        $this->param = conexao::getInstancia();
    
    }



    public function listar()
    {
        $servicooDAO = new servicoDAO();
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
           /* if($_FILES["imagem"]["name"] == "")
            {
                $erro = true;
                echo "<script>alert('Escolha uma imagem para o produto')</script>";
            }
            if($_POST["categoria"] == "0")
            {
                $erro = true;
                echo "<script>alert('Escolha uma categoria')</script>";
            }
            if(!$erro)*/
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



           /* {
                //inserir no BD
                $categoria = new categoria($_POST["categoria"]);
                
                $produto = new Produto(nome:$_POST["nome"], descricao:$_POST["descricao"], preco:$_POST["preco"], estoque:$_POST["estoque"], imagem:$_FILES["imagem"]["name"], status:"Ativo", categoria:$categoria);
                
                $produtoDAO = new ProdutoDAO();
                $produtoDAO->inserir_produto($produto);
                
                header("location:index.php?controle=produtoController&metodo=listar");
           }*/
        }
           

    }
?>