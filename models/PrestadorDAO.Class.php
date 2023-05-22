<?php
    class PrestadorDAO extends Conexao
	{
		public function __construct()
		{
			parent:: __construct();
		}

        public function inserir($prestador)
        {
            //incluir prestador
            $sql = "INSERT INTO prestador (NomePrestador, DataNascimento, Celular, Email, Senha, Situacao) values (?,?,?,?,?,?)";
            $stm = $this->db->prepare($sql);
			$stm->bindValue(1, $prestador->getNomePrestador());
		    $stm->bindValue(2, $prestador->getDataNascimento());
            $stm->bindValue(3, $prestador->getCelular());
            $stm->bindValue(4, $prestador->getEmail());
            $stm->bindValue(5, $prestador->getSenha());
            $stm->bindValue(6, $prestador->getSituacao());
			$stm->execute();

           
            //obtem a ultima chave inserida!
            $idPrestador = $this->db->lastInsertId();

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
            $this->db=null;
        }

        //autenticar prestador
        public function autenticar($prestador)
		{
			$sql = "SELECT idPrestador, Email FROM prestador WHERE email = ? AND senha = ?";
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1, $prestador->getEmail());
			$stm->bindValue(2, $prestador->getSenha());
			$stm->execute();
			$this->db = null;
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
    }
?>