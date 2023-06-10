<?php
     class PrestadorDAO 
     {
         public function __construct( private $conexao){}
         
 
        public function inserir($prestador)
        {
            //incluir prestador
            
            $sql = "INSERT INTO prestador (Nome, DtNasc,
                                 Celular, Email, Senha, Status) values (?,?,?,?,?,?)";
           $stm = $this->conexao->prepare($sql);
			$stm->bindValue(1, $prestador->getNome());
		    $stm->bindValue(2, $prestador->getDtNasc());
            $stm->bindValue(3, $prestador->getCelular());
            $stm->bindValue(4, $prestador->getEmail());
            $stm->bindValue(5, $prestador->getSenha());
            $stm->bindValue(6, $prestador->getStatus());
			$stm->execute();
            $this->conexao = null;
           
           
        }

        //autenticar prestador
        public function autenticar($prestador)
		{
			$sql = "SELECT idPrestador, Nome FROM prestador WHERE email = ? AND senha = ?";
            $stm = $this->conexao->prepare($sql);
			$stm->bindValue(1, $prestador->getEmail());
			$stm->bindValue(2, $prestador->getSenha());
			$stm->execute();
            $this->conexao = null;
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
        
		public function verificar_por_email($prestador)
		{
			$sql = "SELECT Email FROM prestador WHERE Email = ?";
			try
			{
				$stm = $this->conexao->prepare($sql);
				$stm->bindValue(1, $prestador->getEmail());
				$stm->execute();
				$this->conexao = null;
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e)
			{
				$this->conexao = null;
				return "Problema ao verificar usuário pelo e-mail";
			}
		}

        public function getPrestadores(){

            $sql = "SELECT idPrestador, Nome FROM prestador";
			try
			{
				$stm = $this->conexao->prepare($sql);
				$stm->execute();
				$this->conexao = null;
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e)
			{
				$this->conexao = null;
				return "Problema ao buscar fornecedores";
			}
        }

		public function getPrest($idPrestador)
		{
			$sql = "SELECT idPrestador, Nome FROM prestador
					WHERE idPrestador = ?";
			try
			{
				$stm = $this->conexao->prepare($sql);
				$stm->bindValue(1, $idPrestador);
				$stm->execute();
				$this->conexao = null;
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e)
			{
				$this->conexao = null;
				return "Problema ao buscar fornecedores";
			}
		}

		public function getTempoEstimado($idPrestador)
		{
			$sql = "SELECT tempoEstimado FROM prestador WHERE idPrestador = ?";
			try
			{
				$stm = $this->conexao->prepare($sql);
				$stm->bindValue(1, $idPrestador);				
				$stm->execute();
				$this->conexao = null;
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e)
			{
				$this->conexao = null;
				return "Problema ao verificar usuário pelo e-mail";
			}
		}
    }
?>