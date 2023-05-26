<?php 
    require_once "models/Conexao.Class.php";
    require_once "models/Reserva.Class.php";
    require_once "models/ReservaDAO.Class.php";
    require_once "models/Usuario.Class.php";
    require_once "models/UsuarioDAO.Class.php";

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
            if(isset($_SESSION['idusuario'])){

                $reserva = new Reserva(0,DtReserva:$_POST['DtReserva'], HoraReserva:$_POST['HoraReserva']);
                $reservaDAO = new ReservaDAO($this->param,$reserva);
                $ret = $reservaDAO->listarReservas();

            }
            require_once "views/calendarioUsuario.php";
        }


    }
?>