<?php 
    //incluir classes
    require_once "models/Conexao.Class.php";
    require_once "models/prestador.Class.php";
    require_once "models/PrestadorDAO.Class.php";
	require_once "models/Servico.Class.php";
	require_once "models/ServicoDAO.Class.php";
    require_once "models/PrestadorDAO.class.php";
	require_once "models/Servico.Class.php";
	require_once "models/ServicoDAO.class.php";

    if(!isset($_SESSION))
		session_start();

    class PrestadorController{

        private $param;
		public function __construct()
		{
			$this->param = Conexao::getInstancia();
		}
        
        public function inserir()
		{
			$msg = array("","","","","","","","","");
			$erro = false;
			if($_POST)
			{      

				//verificação preenchimento
				if(empty($_POST["Nome"]))
				{
					$msg[0] = "Preencha o seu nome";
					$erro = true;
				}
				
				if(empty($_POST["DtNasc"]))
				{
					$msg[1] = "Preencha o seu Data do Nascimento";
					$erro = true;
				}
				if(empty($_POST["Celular"]))
				{
					$msg[2] = "Preencha o seu celular";
					$erro = true;
				}
				
				
				if(empty($_POST["Email"]))
				{
					$msg[3] = "Preencha o seu e-mail";
					$erro = true;
				}
				if(empty($_POST["Senha"]))
				{
					$msg[4] = "Preencha a senha";
					$erro = true;
				}
				if(empty($_POST["Confsenha"]))
				{
					$msg[5] = "Preencha a confirmação da senha";
					$erro = true;
				}
				
				if(!empty($_POST["Senha"]) && !empty($_POST["Confsenha"]))
				{
					if($_POST["Senha"] != $_POST["Confsenha"])
					{
						$msg[4] = "Senhas não conferem";
						$erro = true;
					}
				}
				if(!empty($_POST["Email"]))
				{
					$prestador = new prestador(Email:$_POST["Email"]);
					$prestadorDAO = new prestadorDAO($this->param);
					$retorno = $prestadorDAO->verificar_por_email($prestador);
					if(count($retorno) > 0)
					{
						$msg[3] = "E-mail já cadastrado";
						$erro = true;
					}
				}
				//se tudo certo
				
				if(!$erro)
				{               
     
					//inserir BD
					$prestador = new prestador(0,$_POST["Nome"],$_POST["DtNasc"]
					,$_POST["Celular"],
					$_POST["Email"],md5($_POST["Senha"]),
					  $Status="Ativo");
					
					$prestadorDAO = new prestadorDAO($this->param);
					
					$prestadorDAO->inserir($prestador);
					
					//mostrar login
					header("location:index.php?controle=usuarioController&metodo=login");
				}
			}
			require_once "views/formCadastroPrestador.php";
		}//fim do inserir


		
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
				if($msg == ""){
					//verificar prestador e senha no BD
					$prestador = new prestador(Email:$_POST["Email"], 
					Senha:md5($_POST["Senha"]));
					
					$prestadorDAO = new prestadorDAO($this->param);
					$retorno = $prestadorDAO->autenticar($prestador);

					if(is_array($retorno) && count($retorno) > 0)
					{
						//é um usuário
						// vamos guardar dados na sessão

						session_start();					
						$_SESSION["idprestador"] = $retorno[0]->idprestador;
						
						$_SESSION["Nome"] = $retorno[0]->Nome;
						
						$_SESSION["Email"] = $retorno[0]->Email;
					
						
						header("location:index.php?controle=prestadorController&metodo=home&id=".$retorno[0]->idprestador);
						
					}
					else
					{
						$msg = "Senha ou usuário inválido!";
					}  
				 
				}  			
			}
			require_once "views/loginPrestador.php";
		}

        public function logout()
        {
            $_SESSION = array();
            session_destroy();
            header("location:index.php");
        }  

		public function home(){			

			if(isset($_SESSION["idPrestador"])){
				$prestador = $_SESSION["Nome"];
				$idprestador = $_SESSION["idprestador"];

				$servicoDAO = new ServicoDAO($this->param);
				$retorno = $servicoDAO->buscarTodoServicos();

				
			}
			
			//require_once "views/homePrestador.php";
		}

			

	}     
        
        
    
?>
	