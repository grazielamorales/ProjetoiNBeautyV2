<?php 
    //incluir classes
    require_once "models/Conexao.class.php";
    require_once "models/usuario.class.php";
    require_once "models/usuarioDAO.class.php";
	require_once "models/Servico.Class.php";
	require_once "models/servicoDAO.class.php";
	require_once "models/Reserva.Class.php";
	require_once "models/ReservaDAO.Class.php";
	require_once "models/Prestador.Class.php";
	require_once "models/PrestadorDAO.Class.php";

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
				
				if(empty($_POST["Cpf"]))
				{
					$msg[1] = "Preencha o seu CPF";
					$erro = true;
				}
				if(empty($_POST["Celular"]))
				{
					$msg[2] = "Preencha o seu celular";
					$erro = true;
				}
				if($_POST["Sexo"] == "")
				{
					$msg[3] = "Selecione o sexo";
					$erro = true;
				}
				
				if(empty($_POST["DataNascimento"]))
				{
					$msg[4] = "Preencha a Data";
					$erro = true;
				}
				
				if(empty($_POST["Email"]))
				{
					$msg[5] = "Preencha o seu e-mail";
					$erro = true;
				}
				if(empty($_POST["Senha"]))
				{
					$msg[6] = "Preencha a senha";
					$erro = true;
				}
				if(empty($_POST["Confsenha"]))
				{
					$msg[7] = "Preencha a confirmação da senha";
					$erro = true;
				}
				
				if(!empty($_POST["Senha"]) && !empty($_POST["Confsenha"]))
				{
					if($_POST["Senha"] != $_POST["Confsenha"])
					{
						$msg[6] = "Senhas não conferem";
						$erro = true;
					}
				}
				if(!empty($_POST["Email"])) //se não estiver vazio email
				{
					$usuario = new usuario(Email:$_POST["Email"]);
					$usuarioDAO = new usuarioDAO($this->param);
					$retorno = $usuarioDAO->verificar_por_email($usuario);
					if(count($retorno) > 0)
					{
						$msg[5] = "E-mail já cadastrado";
						$erro = true;
					}
				}
				//se tudo certo
				
				if(!$erro)
				{
					
					//inserir BD	

					$usuario = new usuario(0,$_POST["Nome"],$_POST["Cpf"],
					$_POST["DataNascimento"], $_POST["Celular"], $_POST["Email"]
					,md5($_POST["Senha"]), $Situacao="Ativo", $_POST["Apelido"],
					 $_POST['Sexo']);
					
					$usuarioDAO = new usuarioDAO($this->param);
					
					$usuarioDAO->inserir($usuario);
					
					//mostrar login
					header("location:index.php?controle=usuarioController&metodo=login");
				}
			}
			require_once "views/formCadastroUsuario.php";
		}//fim do inserir

        public function login()
		{
			//validar se ta logado
			if(isset($_SESSION['idUsuario'])){
				header("Location:?controle=usuarioController&metodo=home");
			}

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
						$_SESSION['Tipo'] = "usuario";					
						
						header("location:index.php?controle=usuarioController&metodo=home");
						
					}
					else
					{
						$prestador = new Prestador(Email:$_POST["Email"], Senha:md5($_POST["Senha"]));
						$prestadorDAO = new PrestadorDAO($this->param);
						$retorno = $prestadorDAO->autenticar($prestador);

						if(is_array($retorno) && count($retorno) > 0){
							//é um prestador de serviços
							//guardar dados na sessão
							
							$idPrestador = $_SESSION['idPrestador'] = $retorno[0]->idPrestador;
							$prestador = $_SESSION["Nome"] = $retorno[0]->Nome;
							$_SESSION["Email"] = $retorno[0]->Email;
							$_SESSION["Tipo"] = "prestador";

							

							header("Location:index.php?controle=prestadorController&metodo=home&idPrestador=".$idPrestador);

						}else{
							$msg = "Senha ou usuário inválido!";
						}
						
					}  
				 
				}  			
			}
			require_once "views/loginUsuario.php";
		}

        public function logout()
        {
            $_SESSION = array();
            session_destroy();
            header("location:index.php");
        }  

		public function home(){
			if(isset($_SESSION["idUsuario"])){
				$usuario = $_SESSION["Nome"];
				$idUsuario = $_SESSION["idUsuario"];

				$servicoDAO = new ServicoDAO($this->param);
				$retorno = $servicoDAO->buscarTodoServicos();

				
			}
			
			require_once "views/homeUsuario.php";
		}

		public function editarUsuario()
		{
			$resp = "";
			if(isset($_SESSION["idUsuario"])){
				$usuario = $_SESSION["Nome"];
				$idUsuario = $_SESSION["idUsuario"];

				$usuarioGet = new Usuario(idUsuario:$idUsuario);

				$usuarioDAO = new UsuarioDAO($this->param);
				$ret = $usuarioDAO->getUsuario($idUsuario);

				$msg = array("","","","","","","","","");
				$erro = false;
			}
			if($_POST)
			{
				//verificação preenchimento
				if(empty($_POST["Nome"]))
				{
					$msg[0] = "Preencha o seu nome";
					$erro = true;
				}
				
				if(empty($_POST["Cpf"]))
				{
					$msg[1] = "Preencha o seu CPF";
					$erro = true;
				}
				if(empty($_POST["Celular"]))
				{
					$msg[2] = "Preencha o seu celular";
					$erro = true;
				}
				if($_POST["Sexo"] == "")
				{
					$msg[3] = "Selecione o sexo";
					$erro = true;
				}
				
				if(empty($_POST["DataNascimento"]))
				{
					$msg[4] = "Preencha a Data";
					$erro = true;
				}
				
				if(empty($_POST["Email"]))
				{
					$msg[5] = "Preencha o seu e-mail";
					$erro = true;
				}
				if(empty($_POST["Senha"]))
				{
					$msg[6] = "Preencha a senha";
					$erro = true;
				}								
					
				$usuarioEdit = new Usuario($_POST['idUsuario'], $_POST['Nome'],$_POST['Cpf'],$_POST['DataNascimento'], $_POST['Celular'], $_POST['Email'], md5($_POST['Senha']), $Situação = "Ativo", $_POST['Apelido'], $_POST['Sexo']);
				$editUsuario = new UsuarioDAO($this->param);
				$resp = $editUsuario->updateUsuario($usuarioEdit);			
					
			}	
		
			require_once "views/formEditUsuario.php";

		}

		public function pesquisar()
		{
			if(isset($_SESSION["idUsuario"])){
				$usuario = $_SESSION["Nome"];
				$idUsuario = $_SESSION["idUsuario"];
			

				//verificando se o search esta vazio
				if(!empty($_GET['search']))
				{
					$data = $_GET['search'];
					$servicoDAO = new ServicoDAO($this->param);
					$pesquisa = $servicoDAO->pesquisar($data);
					//echo "<pre>";
					//var_dump($pesquisa);
					require_once "views/homeUsuario.php";
					
				}else{

					$servicoDAO = new ServicoDAO($this->param);
					$retorno = $servicoDAO->buscarTodoServicos();
					require_once "views/homeUsuario.php";
				}
			}
    }
			

	}     
        
        
    
?>