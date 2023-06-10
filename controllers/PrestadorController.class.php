<?php 
    //incluir classes
    require_once "models/Conexao.Class.php";
    require_once "models/prestador.Class.php";
    require_once "models/PrestadorDAO.Class.php";
	require_once "models/Servico.Class.php";
	require_once "models/ServicoDAO.Class.php";

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
       
        public function logout()
        {
            $_SESSION = array();
            session_destroy();
            header("location:index.php");
        }  

		public function home(){			

			if(isset($_SESSION["idPrestador"])){
				$prestador = $_SESSION["Nome"];
				$idprestador = $_SESSION["idPrestador"];

				//printf($idprestador);
						
				
			}

			require_once "views/homePrestador.php";
			
			
		}

		public function editarCadastro()
		{

		}

		public function listarServicos()
		{
			$resp="";
			if(isset($_SESSION["idPrestador"]))
        	{  
				$idPrestador = $_SESSION["idPrestador"];
				$prestador = $_SESSION["Nome"];	
				$Tipo = "prestador";				
				
				$servicoDAO = new servicoDAO($this->param);
				$retorno = $servicoDAO->buscarTodoServicosPrestador($idPrestador);
				//echo"<pre>";
				//print_r($retorno);
				//die();

        	}

			require_once "views/homeServicoPrestador.php";
		}

		 public function Deletar()
    	{   
			if(isset($_SESSION["idPrestador"]))
        	{  
				$idPrestador = $_SESSION["idPrestador"];
				$prestador = $_SESSION["Nome"];	
				$Tipo = "prestador";
				
				
				if($_GET["idServico"])
				{
					$idServico = $_GET['idServico'];					
					//buscar todos os serviços do 					
					$servicoDAO = new servicoDAO($this->param);
					$retorno = $servicoDAO->buscarTodoServicosPrestador($idPrestador);	
										
					//apagar o serviço no banco					
					$servico = new ServicoDAO($this->param);
					$resp = $servico->deletar_servico($idPrestador); 

					     

				}
			}
		
			require_once "views/homeServicoPrestador.php";
    
    	}

			

	}     
        
        
    
?>
	