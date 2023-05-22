<?php 
	require_once "models/conexao.class.php";
	require_once "models/empresa.class.php";
	require_once "models/empresaDAO.class.php";
	require_once "models/Usuario.Class.php";
	require_once "models/UsuarioDAO.class.php";
	

    class inicioController
	{
		public function inicio()
		{
			require_once "views/home.html";
		}
	}
?>