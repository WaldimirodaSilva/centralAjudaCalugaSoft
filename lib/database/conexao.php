<?php

	abstract class conexao{
		private static $con;

		public static function pegandoConexao(){
			if (self::$con == null) {
				self::$con = new PDO('mysql: host=localhost; dbname=centralajudacalugasoft_db;','root','');
			}

			return self::$con;
		}
	}

?>