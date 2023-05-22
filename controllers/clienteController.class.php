<?php 
    //incluir classes
    require_once "models/conexao.class.php";
    require_once "models/cliente.class.php";
    require_once "models/clienteDAO.class.php";

    class EmpresaController{
        private $param;
        public function __construct(){

            $this->param = conexao::getInstancia();
        
        }

        public function login(){

             $msg = "";
            if($_POST)
            {                   
                //verificar preenchimento
                if($_POST["Email"] == "" || $_POST["Senha"] == "")
                {
                    $msg ="Dados Obrigatórios";
                }                
                
                //se não tiver erro 
            
                if($msg ==  "")
                {                    
                    //verificar usuario e senha no BD
                    $cliente = new Cliente(Email:$_POST["Email"], Senha:md5($_POST["Senha"]));
                    
                    $clienteDAO = new clienteDAO($this->param);
                    $retorno = $clienteDAO->autenticar($cliente);
                    if(is_array($retorno) && count($retorno) > 0)
                    {
                    //é um usuário
                    // vamos guardar dados na sessão
                                        
                    $_SESSION["idCliente"] = $retorno[0]->idCliente;
                    
                    $_SESSION["Nome"] = $retorno[0]->Nome;
                    
                    $_SESSION["Email"] = $retorno[0]->Email;
                  
                    
                    header("location:index.php");
                    }
                    else
                    {
                        $msg = "Verificar os dados digitados";
                    }
                }
                require_once "views/login.php";
            }
        }

        public function logout()
        {
            $_SESSION = array();
            session_destroy();
            header("location:index.php");
        }       
        
        public function cadastrar(){

        }
    }
?>