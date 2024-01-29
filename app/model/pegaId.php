<?php

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