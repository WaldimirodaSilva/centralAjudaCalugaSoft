<?php

	class entregaIdSoftware{
		private static $idSoftware;

		public static function Send($id){
			self::$idSoftware = $id;
		}

		public static function get(){
			return self::$idSoftware;
		}
	}

?>