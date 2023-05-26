<?php
	class UsuarioDAO
	{
		public function __construct( private $conexao){}
		
		public function autenticar($usuario)
		{
			$sql = "SELECT idUsuario, Nome FROM usuario WHERE Email = ? AND Senha = ?";
			$stm = $this->conexao->prepare($sql);
			$stm->bindValue(1, $usuario->getEmail());
			$stm->bindValue(2, $usuario->getSenha());
			$stm->execute();
			$this->conexao = null;
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}

		
		public function inserir($usuario)
		{
			$sql = "INSERT INTO usuario (Nome, Cpf, DataNascimento, Celular, Email,
			 Senha, Situacao, Apelido, Sexo) VALUES(?,?,?,?,?,?,?,?,?)";
			$stm = $this->conexao->prepare($sql);
			$stm->bindValue(1, $usuario->getNome());
			$stm->bindValue(2, $usuario->getCpf());
			$stm->bindValue(3, $usuario->getDataNascimento());
			$stm->bindValue(4, $usuario->getCelular());
			$stm->bindValue(5, $usuario->getEmail());
			$stm->bindValue(6, $usuario->getSenha());			
			$stm->bindValue(7, $usuario->getSituacao());
			$stm->bindValue(8, $usuario->getApelido());
			$stm->bindValue(9, $usuario->getSexo());
			$stm->execute();
			$this->conexao = null;
		}

		public function verificar_por_email($usuario)
		{
			$sql = "SELECT Email FROM usuario WHERE Email = ?";
			try
			{
				$stm = $this->conexao->prepare($sql);
				$stm->bindValue(1, $usuario->getEmail());
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
	}//fim da classe
?>