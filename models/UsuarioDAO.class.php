<?php
	class UsuarioDAO extends Conexao
	{
		public function __construct()
		{
			parent:: __construct();
		}//fim construtor
		
		public function autenticar($usuario)
		{
			$sql = "SELECT idUsuario, Nome, Tipo FROM usuario WHERE Email = ? AND Senha = ?";
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1, $usuario->getEmail());
			$stm->bindValue(2, $usuario->getSenha());
			$stm->execute();
			$this->db = null;
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		public function inserir($usuario)
		{
			$sql = "INSERT INTO usuario (Nome, Cpf, DataNascimento, Celular, Email, Senha, Tipo, Situacao, Apelido, Sexo) VALUES(?,?,?,?,?,?,?,?,?,?)";
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1, $usuario->getNome());
			$stm->bindValue(2, $usuario->getCpf());
			$stm->bindValue(3, $usuario->getDataNascimento());
			$stm->bindValue(4, $usuario->getCelular());
			$stm->bindValue(5, $usuario->getEmail());
			$stm->bindValue(6, $usuario->getSenha());
			$stm->bindValue(7, $usuario->getTipo());
			$stm->bindValue(8, $usuario->getSituacao());
			$stm->bindValue(9, $usuario->getApelido());
			$stm->bindValue(10, $usuario->getSexo());
			$stm->execute();
			$this->db = null;
		}
	}//fim da classe
?>