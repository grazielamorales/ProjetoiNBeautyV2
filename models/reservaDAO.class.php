<?php 
  Class ReservaDAO
  {

    public function __construct( private $conexao){}

    public function listReserva($idUsuario)
    {
      try {
        $sql = "SELECT * FROM `reserva` AS r INNER JOIN prestador AS p 
                ON r.idPrestador = p.idPrestador WHERE idUsuario = ?
                ORDER BY DataReserva";
        $stm = $this->conexao->prepare($sql);
			  $stm->bindValue(1, $idUsuario);
			  $stm->execute();
			  $this->conexao = null;
			  return $stm->fetchAll(PDO::FETCH_OBJ);

      } catch (PDOException $e) {
        $this->conexao = null;
				return "Problema ao verificar agenda por idUsuario";
      }
    }

    public function insertReserva($reserva)
    {

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

    public function getReserva($idReserva)
    {
      try {
        $sql = "SELECT * FROM `reserva` INNER JOIN prestador 
                ON reserva.idPrestador = prestador.idPrestador 
                WHERE idReserva = ?";
        $stm = $this->conexao->prepare($sql);
			  $stm->bindValue(1, $idReserva);
			  $stm->execute();
			  $this->conexao = null;
			  return $stm->fetchAll(PDO::FETCH_OBJ);
        
      } catch (PDOException $e) {
        $this->conexao = null;
				return "Problema ao verificar agenda por idUsuario";
      }
    }

    public function upDateReserva($reserva)
    {
      $sql = "UPDATE reserva SET DataReserva=?, HoraReserva=? WHERE idReserva=?";
      
      try {
        $stm = $this->conexao->prepare($sql);
        $stm->bindValue(1, $reserva->getDtReserva());
        $stm->bindValue(2, $reserva->getHoraReserva());       
        $stm->bindValue(3, $reserva->getIdReserva());

        $stm->execute();
        $this->conexao = null;
        return "Alteração realizada com sucesso!";
       

      } catch (PDOException $e){
          $this->conexao = null;
          return "Problema ao alterar reserva!".$e->getMessage();
      }
    }

    

    public function deletReserva($reserva){
      $sql = "DELETE FROM reserva WHERE idReserva = ?";
			try
			{
				$stm = $this->conexao->prepare($sql);
				$stm->bindValue(1, $reserva->getIdReserva());
				$stm->execute();
				$this->conexao = null;
				return "Reserva excluida com sucesso!";
			}
			catch(PDOException $e)
			{
				return "Erro! Problema ao excluir a reserva, verifique!";
			}
    
    }

    public function getHorarios($idReserva, $data, $idPrestador)
    {
      try {
        $sql = "SELECT HoraReserva FROM `reserva` WHERE idReserva != ?
                AND idPrestador = ? AND DataReserva = ?";                
                
        $stm = $this->conexao->prepare($sql);
			  $stm->bindValue(1, $idReserva);
        $stm->bindValue(2, $idPrestador);
        $stm->bindValue(3, $data);
			  $stm->execute();
			  //$this->conexao = null;
			  return $stm->fetchAll(PDO::FETCH_OBJ);
        
      } catch (\Throwable $th) {
        $this->conexao = null;
				return "Problema ao verificar agenda por idUsuario";
      }
    }    
   
   
   }
?>