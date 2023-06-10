<?php
require_once "models/Conexao.Class.php";
require_once "models/Servico.Class.php";
require_once "models/ServicoDAO.Class.php";
require_once "models/Usuario.Class.php";
require_once "models/UsuarioDAO.Class.php";
require_once "models/Prestador.Class.php";
require_once "models/PrestadorDAO.Class.php";


class ServicoController
{
    private $param;
    public function __construct(){

        $this->param = conexao::getInstancia();
    
    }    
    
    
    public function Adicionar()
    { 
        $resp = "";
        if($_GET["idPrestador"])
        {
            $idPrestador = $_GET["idPrestador"];

            //buscar dados do prestador que esta logado
            $getprest = new Prestador(idPrestador:$_GET['idPrestador']);
            $prestadorDAO = new PrestadorDAO($this->param);
            $ret = $prestadorDAO->getPrest($idPrestador);

            //buscar dados de todos os prestadores p/ preencher as opt
            $prestadores = new PrestadorDAO($this->param);
            $opt = $prestadores->getPrestadores();
            //echo "<pre>";
            //print_r($opt);
            //die();      
        }  
        
        if($_POST)
        {            
            $erro = false;
            if($_POST["descritivo"] == "")
            {
                $erro = true;
                echo "<script>alert('Preencha a descrição do serviço')</script>";
            } 
            if($_POST["preco"] == "")
            {
                $erro = true;
                echo "<script>alert('Preencha o preço do serviço')</script>";
            }  
            if($_POST["tempoEstimado"] == "")
            {
                $erro = true;
                echo "<script>alert('Preencha o tempo estimado do serviço')</script>";
            } 
            if($_POST["prestador"] == "")
            {
                $erro = true;
                echo "<script>alert('Escolha um prestador')</script>";
            } 
            if(!$erro)
            {                
                //inserir no banco de dados o serviço
                $servico = new Servico(descritivo:$_POST["descritivo"],preco:$_POST['preco'], tempoEstimado:$_POST['tempoEstimado'], prestador:[]);
                
                foreach($opt as $prestador)
				{
                    $prestador = new Prestador($idPrestador);
                   
				} 
                $servico->setPrestador($idPrestador);
                $servicoDAO = new ServicoDAO($this->param);
                $resp = $servicoDAO->inserir_servico($servico);     
               
            }  
           
        } 
       
        require_once "views/formAdicionarServico.php";
    }
    
    public function Editar()
{
    $resp = "";
    if (isset($_GET["idPrestador"]) && isset($_GET["idServico"])) {
        $idPrestador = $_GET["idPrestador"];
        $idServico = $_GET['idServico'];

        // buscar dados do prestador que está logado
        $prestadorDAO = new PrestadorDAO($this->param);
        $prest = $prestadorDAO->getPrest($idPrestador);

        // buscar dados do Serviço pelo idServico
        $servicoDAO = new ServicoDAO($this->param);
        $ret = $servicoDAO->getServico($idServico);

        // buscar dados de todos os prestadores p/ preencher as opções
        $prestadores = new PrestadorDAO($this->param);
        $opt = $prestadores->getPrestadores();

        // verificar se houve alteração correta e post
        if ($_POST) {
            $erro = false;
            if ($_POST["descritivo"] == "") {
                $erro = true;
                echo "<script>alert('Preencha a descrição do serviço')</script>";
            }
            if ($_POST["preco"] == "") {
                $erro = true;
                echo "<script>alert('Preencha o preço do serviço')</script>";
            }
            if ($_POST["tempoEstimado"] == "") {
                $erro = true;
                echo "<script>alert('Preencha o tempo estimado do serviço')</script>";
            }
            if ($_POST["prestador"] == "") {
                $erro = true;
                echo "<script>alert('Escolha um prestador')</script>";
            }
            if (!$erro) {
                
                // inserir no banco de dados a alteração do serviço
                $servico = new Servico(                    
                    descritivo: $_POST["descritivo"],
                    preco: $_POST['preco'],
                    tempoEstimado: $_POST['tempoEstimado'],
                    prestador:[]
                );  
                //pegar o prestador escolhido
                foreach($opt as $prestador)
				{
                    $prestador = new Prestador($idPrestador);
                   
				} 
                $servico->setPrestador($idPrestador);  
                       
                $servicoDAO = new ServicoDAO($this->param);
                $resp = $servicoDAO->editar_servico($servico);
            }
        }
    }
    require_once "views/formEditarServico.php";
}

   

}
?>