<?php 
	require_once "models/conexao.class.php";
	require_once "models/empresa.class.php";
	require_once "models/empresaDAO.class.php";
	require_once "models/cliente.class.php";
	require_once "models/clienteDAO.class.php";

    class inicioController
	{
		public function inicio()
		{
			require_once "views/home.html";
		}
	}
?>