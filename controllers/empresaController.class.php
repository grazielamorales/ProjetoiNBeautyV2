<?php 
    //incluir classes
    require_once "models/conexao.class.php";
    require_once "models/empresa.class.php";
    require_once "models/empresaDAO.class.php";

    class EmpresaController{
        private $param;
        public function __construct(){

            $this->param = conexao::getInstancia();
        
        }

        public function listar(){
            $empresaDAO = new empresaDAO($this->param);
			$retorno = $empresaDAO->buscarEmpresas();
			if(!is_array($retorno))
			{
				echo $retorno;
			}
			else
			{
				require_once "views/listarEmpresas.php";
			}
        }

        public function inserir()
        {      
            $msg = "";              
                 
            if($_POST)   
            {
                 if(!empty($_POST["Senha"]) && !empty($_POST["confirmaSenha"]))
                {
                    if($_POST["Senha"] != $_POST["confirmaSenha"])
                    {
                        $msg = "Senhas não conferem!";                       
                    
                    }
                }
                if(!empty($_POST["Email"]))
                {
                    $empresaEmail = new Empresa($Email=$_POST['Email']);
                    $empresaDAO = new empresaDAO($this->param);
                    $retorno = $empresaDAO->verificar_por_email($empresaEmail);
                    if(count($retorno) > 0)
                    {
                        $msg = "Email já cadastrado!";
                       
                    }
                     //inserir no BD
                    $empresa = new Empresa(RazaoSocial:$_POST['RazaoSocial'], 
                    Cnpj:$_POST['Cnpj'],Logradouro:$_POST['Logradouro'],Num:$_POST['Num'],Bairro:$_POST['Bairro'],Cep:$_POST['Cep'],Cidade:$_POST['Cidade'],Uf:$_POST['Uf'],Fone:$_POST['Fone'],Email:$_POST['Email'], Senha:md5($_POST['Senha']));

                    $empresaDAO = new empresaDAO($this->param);
                    $retorno = $empresaDAO->cadastrar($empresa);
                    
                }     

              
            } 
            require_once "views/formCadastroEmpresa.php";   
            
        }            
       
        public function login()
        {
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
                    $empresaUsuario = new Empresa(Email:$_POST["Email"], Senha:md5($_POST["Senha"]));
                    
                    $empresaUsuarioDAO = new empresaDAO($this->param);
                    $retorno = $empresaUsuarioDAO->autenticar($empresaUsuario);
                    if(is_array($retorno) && count($retorno) > 0)
                    {
                    //é um usuário
                    // vamos guardar dados na sessão
                                        
                    $_SESSION["idempresa"] = $retorno[0]->idempresa;
                    
                    $_SESSION["NomeFantasia"] = $retorno[0]->nomeFantasia;
                    
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
        

        public function deletar(){
        
        }

        
        
    }

    

    
?>