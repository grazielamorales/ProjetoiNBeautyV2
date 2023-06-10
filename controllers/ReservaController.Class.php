<?php 
    require_once "models/Conexao.Class.php";
    require_once "models/Reserva.Class.php";
    require_once "models/ReservaDAO.Class.php";
    require_once "models/Usuario.Class.php";
    require_once "models/UsuarioDAO.Class.php";
    require_once "models/Servico.Class.php";
    require_once "models/ServicoDAO.Class.php";
    require_once "models/Prestador.Class.php";
    require_once "models/PrestadorDAO.Class.php";
   

    if(!isset($_SESSION))
		session_start();

    Class ReservaController{

        private $param;
		public function __construct()
		{
			$this->param = Conexao::getInstancia();
		}

        public function agendar() 
        {
            if(isset($_SESSION['idUsuario'])){
                $usuario = $_SESSION["Nome"];
				$idUsuario = $_SESSION["idUsuario"];               
                //buscar os dados do prestador no BD
                $prestadorDAO = new PrestadorDAO($this->param);
                $prestador = $prestadorDAO->getPrest($_GET['idPrestador']);             
                //buscar os dados do Serviço no BD
                $servicoDAO = new ServicoDAO($this->param);
                $servico = $servicoDAO->getServico($_GET["idServico"]);              
                
            }
            
            $msg="";
            //var_dump($_SESSION);
            if($_POST)
            {
               //fluxo pra salvar no banco               
               $reserva = new Reserva(0,DtReserva:$_POST["DataReserva"],HoraReserva:$_POST["HoraReserva"], Procedimento:$_POST["Procedimento"],
                ValorProcedimento:$_POST["ValorProcedimento"], idUsuario:$_POST["idUsuario"], idPrestador:$_POST["idPrestador"]);
               $reservaDAO = new ReservaDAO($this->param);
               $msg = $reservaDAO->insertReserva($reserva);
              
            }
            
           
            require_once "views/calendarioUsuario.php";
        }

        public function listarAgenda()
        {
            
            if(isset($_SESSION["idUsuario"])){
                $msg = "";
				$usuario = $_SESSION["Nome"];
				$idUsuario = $_SESSION["idUsuario"];

				$agendaDAO = new ReservaDAO($this->param);
                $retorno = $agendaDAO->listReserva($idUsuario);
                
                //echo "<pre>";
                //var_dump($retorno);
                //die();

                if(is_array($retorno))
			    {
				    require_once "views/agendaUsuario.php";
			    }
                else
                {
                    echo $retorno;
                }
				
			}          
        }

        public function editReserva()
        {            
            $msg = "";
            if(isset($_SESSION["idUsuario"])){
				$usuario = $_SESSION["Nome"];
				$idUsuario = $_SESSION["idUsuario"];
                $idReserva = $_GET["idReserva"]; 
                $idPrestador = $_GET["idPrestador"];         

				$editReserva = new ReservaDAO($this->param);
              
                //echo "<pre>";
                //var_dump($retorno);
                //die();                  
               
                if($_POST){

                    $reserva = new Reserva(
                        $_POST["idReserva"], 
                        $_POST["DataReserva"],
                        $_POST["HoraReserva"], 
                        $_POST['Procedimento'],
                        $_POST['ValorProcedimento'],
                        $idUsuario, 
                        $idPrestador, 
                        $status = 'Ativo' );
                    $reservaEdit = new ReservaDAO($this->param);

                    $msg = $reservaEdit->upDateReserva($reserva);
                  
                }
                $retorno = $editReserva->getReserva($idReserva);
                $dado = $retorno[0];
     
			}             
            require_once "views/formEditReserva.php";
        }

        public function confirmaDeletReserva()
        {  
            $msg="";          
            if(isset($_SESSION["idUsuario"])){
                $usuario = $_SESSION["Nome"];
				$idUsuario = $_SESSION["idUsuario"];
                $idReserva = $_GET["idReserva"]; 
                $idPrestador = $_GET["idPrestador"]; 

                $getreserva = new ReservaDAO($this->param);
                $retorno = $getreserva->getReserva($idReserva); 
 
            }
            
           require "views/deletReservaUsuario.php";
        }

        public function deletReserva(){
            $msg = "";
             if ($_GET["idReserva"]){          
             
                $reserva = new Reserva(idReserva:$_GET["idReserva"], DtReserva:null, HoraReserva:null, Procedimento:null, ValorProcedimento:null, idUsuario:null, idPrestador:null);
                $reservaDAO = new reservaDAO($this->param);
                $msg = $reservaDAO->deletReserva($reserva); 
  
            }

            header("Location:index.php?controle=ReservaController&metodo=listarAgenda&id=1");

        }

        public function getHoraLivre()
        {
           
        }
                
                
    }
?>