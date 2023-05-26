<?php 
    class ServicoDAO extends Conexao
    {
        public function __construct( private $conexao){}

        public function buscarTodoServicos(){

            $sql = "SELECT *
                    FROM servico INNER JOIN prestador
                    ON servico.idPrestador = prestador.idPrestador;";
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
			$sql = "INSERT INTO servico(descritivo, preco, tempoEstimado, Profissional)VALUES(?,?, ?, ?)";
			
			$stm = $this->db->prepare($sql);
			//substituir os pontos de interrogação
			$stm->bindValue(1, $produto->getDescritivo());
			$stm->bindValue(2, $produto->getPreco());
			$stm->bindValue(3, $produto->getTempoEstim());
			
			$stm->execute();
			
			$this->db = null;
			
		}
    }
?>