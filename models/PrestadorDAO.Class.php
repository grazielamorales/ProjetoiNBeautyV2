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

           
            //obtem a ultima chave inserida!
           /* $idPrestador = $this->db->lastInsertId();

            $sql = "INSERT INTO prestador(idPrestador, NomePrestador, DataNascimento, Celular, Email, Senha, Situacao) values (?,?,?,?,?,?,?)";
            $stm = $this->db->prepare($sql);
			$stm->bindValue(1, $idPrestador);
			$stm->bindValue(2, $prestador->getPrestador()[0]->getNomePrestador());
            $stm->bindValue(3, $prestador->getPrestador()[0]->getDataNascimento());
            $stm->bindValue(4, $prestador->getPrestador()[0]->getCelular());
            $stm->bindValue(5, $prestador->getPrestador()[0]->getEmail());
            $stm->bindValue(6, $prestador->getPrestador()[0]->getSenha());
            $stm->bindValue(7, $prestador->getPrestador()[0]->getSituacao());
           	$stm->execute();
            $this->db=null;*/
        }

        //autenticar prestador
        public function autenticar($prestador)
		{
			$sql = "SELECT idPrestador, Email FROM prestador WHERE email = ? AND senha = ?";
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
    }
?>