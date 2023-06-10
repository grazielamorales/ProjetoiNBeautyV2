<?php 
    class ServicoDAO
    {
        public function __construct( private $conexao){}

        public function buscarTodoServicos(){

            $sql = "SELECT *
                    FROM servico INNER JOIN servicoprestadorservico
                    ON servicoprestadorservico.idServico = servico.idServico
					INNER JOIN prestador ON prestador.idPrestador=servicoprestadorservico.idPrestador";

            $stm = $this->conexao->prepare($sql);
			//executa a frase sql no BD
			$stm->execute();
			//fecha a conexao com o BD
			$this->conexao = null;
			//returna o resultado no formato de OBJETOS
			return $stm->fetchAll(PDO::FETCH_OBJ);
        
        }

		public function buscarTodoServicosPrestador($idPrestador)
		{
			 $sql = "SELECT * FROM `servicoprestadorservico` AS sp 
			 		 INNER JOIN servico AS s 
					 ON s.idServico = sp.idServico 
					 WHERE idPrestador=? ORDER BY descritivo ASC";

            $stm = $this->conexao->prepare($sql);
			$stm->bindValue(1, $idPrestador);		
			$stm->execute();			
			$this->conexao = null;			
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}

		//função search da pag do usuario pesquisa serviço ou prestador
		public function pesquisar($data){
	
			$sql = "SELECT * FROM servicoprestadorservico AS sp 
					INNER JOIN prestador AS p 
					ON sp.idPrestador = p.idPrestador 
					INNER JOIN servico AS s 
					ON sp.idServico = s.idServico 
					WHERE id LIKE '%$data%' OR Nome LIKE '%$data%' OR descritivo LIKE '%$data%'";
			$stm = $this->conexao->prepare($sql);		
			$stm->execute();			
			$this->conexao = null;			
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}

        
       	public function inserir_servico($servico)
		{
			$this->conexao->beginTransaction();
			$sql = "INSERT INTO servico (descritivo, preco, tempoEstimado) VALUES (?,?,?)";

		try
		{
			$stm = $this->conexao->prepare($sql);
			$stm->bindValue(1, $servico->getDescritivo());
			$stm->bindValue(2, $servico->getPreco());
			$stm->bindValue(3, $servico->getTempoEstimado());
			$stm->execute();
		}
		catch(PDOException $e)
		{
			$this->conexao->rollback();
			$this->conexao = null;
			return $e->getMessage();
		}

			$idservico = $this->conexao->lastInsertId();

			$sql = "INSERT INTO servicoprestadorservico (idPrestador, idServico) VALUES(?,?)";

			$idprestador = $servico->getPrestador(); 
		
		try
		{
			$stm = $this->conexao->prepare($sql);
			foreach($idprestador as $dado) 
			{
				$stm->bindValue(1, $dado);
				$stm->bindValue(2, $idservico);								
			}
			$stm->execute();
		}
		catch(PDOException $e)
		{
			$this->conexao->rollback();
			$this->conexao = null;
			return $e->getMessage();
		}

		$this->conexao->commit();
		$this->conexao = null;
		return "Serviço inserido com sucesso!";
	}

	//função para EDITAR o serviço no BD
	public function editar_servico($servico)
	{ 
		
		$sql = "UPDATE servico SET descritivo = ?, preco = ?, tempoEstimado = ?
				WHERE idServico = ?";

		try {
			$stm = $this->conexao->prepare($sql);			
			$stm->bindValue(1, $servico->getDescritivo());
			$stm->bindValue(2, floatval($servico->getPreco()));
			$stm->bindValue(3, $servico->getTempoEstimado());
			$stm->bindValue(4, $servico->getIdServico());
			$stm->execute();		

		}catch(PDOException $e)
		{
			
			$this->conexao = null;
			return $e->getMessage();
		}			

		
		return "Serviço alterado com sucesso!";

	}	

	//função para deletar o serviço no BD
	public function deletar_servico($idServico)
	{
		
		$sql = "DELETE FROM servico WHERE idServico = ?";
		try {
			$stm = $this->conexao->prepare($sql);
			$stm->bindValue(1, $idServico);
			$stm->execute();
			$stm->conexao = null;
			return "Serviço apagado com sucesso!";
			

		} catch (PDOException $e) {
			$this->conexao = null;
			return $e->getMessage();
		}
		
			

		
		

	}

	public function getServico($idServico){

		$sql = "SELECT * FROM servico WHERE idServico = ?";
		try
		{
			$stm = $this->conexao->prepare($sql);
			$stm->bindValue(1, $idServico);				
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

	public function getServicoPrestador($idServico)
	{
		$sql = "SELECT * FROM servicoprestadorservico WHERE idPrestador = ?";
		try
		{
			$stm = $this->conexao->prepare($sql);
			$stm->bindValue(1, $idServico);				
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

	public function getServPrestador($idPrestador)
	{
		$sql = "SELECT * FROM `servicoprestadorservico` AS sp 
				INNER JOIN servico AS s 
				ON sp.idServico = s.idServico WHERE idPrestador = ?";			

		$stm = $this->conexao->prepare($sql);
		$stm->bindValue(1, $idPrestador);			
		$stm->execute();		
		$this->conexao = null;		
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}
		
}
?>