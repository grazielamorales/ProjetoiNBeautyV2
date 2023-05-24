<?php 
    class ServicoDAO extends Conexao
    {
        public function __construct( private $conexao){}

        public function buscarTodoServicos(){

            $sql = "SELECT * FROM servico";
            $stm = $this->conexao->prepare($sql);
			//executa a frase sql no BD
			$stm->execute();
			//fecha a conexao com o BD
			$this->conexao = null;
			//returna o resultado no formato de OBJETOS
			return $stm->fetchAll(PDO::FETCH_OBJ);
        
        }
    }
?>