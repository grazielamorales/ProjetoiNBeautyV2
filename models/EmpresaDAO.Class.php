<?php
    class EmpresaDAO extends Conexao
	{
		public function __construct()
		{
			parent:: __construct();
		}

            public function inserir($empresa)
        {
            //incluir empresa
            $sql = "INSERT INTO empresa (NomeEmpresa, Logradouro, Cep, Cidade, Uf, Telefone, Email, Situacao, HorarioFuncionamento) values (?,?,?,?,?,?,?,?,?)";
            $stm = $this->db->prepare($sql);
			$stm->bindValue(1, $empresa->getNomeEmpresa());
		    $stm->bindValue(2, $empresa->getLogradouro());
            $stm->bindValue(3, $empresa->getCep());
            $stm->bindValue(4, $empresa->getCidade());
            $stm->bindValue(5, $empresa->getUf());
            $stm->bindValue(6, $empresa->getTelefone());
            $stm->bindValue(7, $empresa->getEmail_empresa());
            $stm->bindValue(8, $empresa->getSituacao());
            $stm->bindValue(9, $empresa->getHorarioFuncionamento());
			$stm->execute();

            //obtem a ultima chave inserida!
            $idEmpresa = $this->db->lastInsertId();

            $sql = "INSERT INTO prestador(idEmpresa, NomePrestador, DataNascimento, Celular, Email, Senha, Situacao) values (?,?,?,?,?,?,?)";
            $stm = $this->db->prepare($sql);
			$stm->bindValue(1, $idEmpresa);
			$stm->bindValue(2, $empresa->getPrestador()[0]->getNomePrestador());
            $stm->bindValue(3, $empresa->getPrestador()[0]->getDataNascimento());
            $stm->bindValue(4, $empresa->getPrestador()[0]->getCelular());
            $stm->bindValue(5, $empresa->getPrestador()[0]->getEmail());
            $stm->bindValue(6, $empresa->getPrestador()[0]->getSenha());
            $stm->bindValue(7, $empresa->getPrestador()[0]->getSituacao());
           	$stm->execute();
            $this->db=null;
        }
    }
?>