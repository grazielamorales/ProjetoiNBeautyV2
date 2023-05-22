<?php 
    //incluir classes
    require_once "models/Conexao.class.php";
    require_once "models/usuario.class.php";
    require_once "models/usuarioDAO.class.php";

    if(!isset($_SESSION))
		session_start();

    class UsuarioController{

        private $param;
		public function __construct()
		{
			$this->param = Conexao::getInstancia();
		}
        
        public function inserir()
		{
			$msg = array("","","","");
			$erro = false;
			if($_POST)
			{
				//verificação preenchimento
				if(empty($_POST["Nome"]))
				{
					$msg[0] = "Preencha o seu nome";
					$erro = true;
				}
				
				if(empty($_POST["Email"]))
				{
					$msg[1] = "Preencha o seu e-mail";
					$erro = true;
				}
				if(empty($_POST["Senha"]))
				{
					$msg[2] = "Preencha a senha";
					$erro = true;
				}
				if(empty($_POST["Confsenha"]))
				{
					$msg[3] = "Preencha a confirmação da senha";
					$erro = true;
				}
				
				if(!empty($_POST["Senha"]) && !empty($_POST["Confsenha"]))
				{
					if($_POST["senha"] != $_POST["confsenha"])
					{
						$msg[2] = "Senhas não conferem";
						$erro = true;
					}
				}
				if(!empty($_POST["email"]))
				{
					$usuario = new usuario(Email:$_POST["Email"]);
					$usuarioDAO = new usuarioDAO($this->param);
					$retorno = $usuarioDAO->verificar_por_email($usuario);
					if(count($retorno) > 0)
					{
						$msg[1] = "E-mail já cadastrado";
						$erro = true;
					}
				}
				//se tudo certo
				if(!$erro)
				{
					//inserir BD
					$usuario = new usuario(0, $_POST["Nome"], $_POST["Email"], md5($_POST["Senha"]), "Usuario");
					
					$usuarioDAO = new usuarioDAO($this->param);
					
					$usuarioDAO->inserir($usuario);
					
					//mostrar login
					//header("location:index.php?controle=usuarioController&metodo=login");
				}
			}
			require_once "views/formCadastroUsuario.php";
		}//fim do inserir

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
                    $usuario = new Usuario(Email:$_POST["Email"], Senha:md5($_POST["Senha"]));
                    
                    $usuarioDAO = new UsuarioDAO($this->param);
                    $retorno = $usuarioDAO->autenticar($usuario);
                    if(is_array($retorno) && count($retorno) > 0)
                    {
                    //é um usuário
                    // vamos guardar dados na sessão
                                        
                    $_SESSION["idUsuario"] = $retorno[0]->idUsuario;
                    
                    $_SESSION["Nome"] = $retorno[0]->Nome;
                    
                    $_SESSION["Email"] = $retorno[0]->Email;
                  
                    
                    header("location:index.php");
                    }
                    else
                    {
                        $msg = "Verificar os dados digitados";
                    }
                }
                require_once "views/loginUsuario.php";
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