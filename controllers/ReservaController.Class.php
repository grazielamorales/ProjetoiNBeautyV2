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
            $msg = "";
            //var_dump($_SESSION);
            if($_POST)
            {
               //fluxo pra salvar no banco               
               $reserva = new Reserva(0,DtReserva:$_POST["DataReserva"],HoraReserva:$_POST["HoraReserva"], Procedimento:$_POST["Procedimento"], ValorProcedimento:$_POST["ValorProcedimento"], idUsuario:$_POST["idUsuario"], idPrestador:$_POST["idPrestador"]);
               $reservaDAO = new ReservaDAO($this->param);
               $msg = $reservaDAO->insertReserva($reserva);
               //var_dump($reserva);
               //die();
              
            }
            
            if(isset($_SESSION['idUsuario'])){
                $usuario = $_SESSION["Nome"];
				$idUsuario = $_SESSION["idUsuario"];               

                $prestadorDAO = new PrestadorDAO($this->param);
                $prestador = $prestadorDAO->getPrestador($_GET["idPrestador"]);

                $servicoDAO = new ServicoDAO($this->param);
                $servico = $servicoDAO->getServico($_GET["idServico"]);              
                

            }
            require_once "views/calendarioUsuario.php";
        }


    }
?>