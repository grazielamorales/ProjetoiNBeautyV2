<?php 
  Class ReservaDAO{

    public function __construct( private $conexao){}

    public function listarReservas(){
    
    }

    public function insertReserva($reserva){

     $sql = "INSERT INTO reserva (DataReserva, HoraReserva, Procedimento, ValorProcedimento, idUsuario, idPrestador)
                  VALUe (?,?,?,?,?,?) ";
      try
			{
				$stm = $this->conexao->prepare($sql);				
				$stm->bindValue(1, $reserva->getDtReserva());
				$stm->bindValue(2, $reserva->getHoraReserva());
        $stm->bindValue(3, $reserva->getProcedimento());
        $stm->bindValue(4, $reserva->getValorProcedimento());
        $stm->bindValue(5, $reserva->getIdUsuario());
        $stm->bindValue(6, $reserva->getIdPrestador());
				
				$stm->execute();
				$this->conexao = null;
        return "Reserva realizada com sucesso!";
				
			}
			catch(PDOException $e)
			{
				$this->conexao = null;
				return "Problema ao cadastrar reserva";
			}

     
    
    }

    public function upDateReserva(){
    
    }

    public function deletReserva(){
    
    }
   
   
   }
?>