<?php

	// classe que permite a conexao
	abstract class conexao{
		private static $con;

		// metodo que vai entregar a conexão com o banco de dados, fazendo o pedido via objeto PDO
		public static function pegandoConexao(){
			if (self::$con == null) {
				self::$con = new PDO('mysql: host=localhost; dbname=centralajudacalugasoft_db;','root','');
			}

			return self::$con;
		}
	}

?>