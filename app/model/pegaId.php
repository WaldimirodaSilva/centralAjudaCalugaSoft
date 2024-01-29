<?php

 	//classe para ajudar na passagem do id na inserção de dados
	class pegaId{
		private static $id;

		public static function getId($id){
			self::$id = $id;
		}

		public static function sendId($id){
			return self::$id;
		}
	}

?>