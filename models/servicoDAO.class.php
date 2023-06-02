<?php 
    class ServicoDAO extends Conexao
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

        
        public function inserir_servico($servico)
		{
			$sql = "INSERT INTO servico (descritivo, preco, tempoEstimado) VALUES (?,?,?)";

			try
			{
				$stm = $this->conexao->prepare($sql);				
				$stm->bindValue(1, $servico->getDescritivo());
				$stm->bindValue(2, $servico->getPreco());
				$stm->bindValue(3, $servico->getTempoEstimado());
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

		
    }
?>