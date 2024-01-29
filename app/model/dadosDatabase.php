<?php

	// classes para pegar os dados no banco de dados

	class dadosDatabase
	{
		// classe para pegar todos so software no banco de dados
		public static function softwares()
		{
			$con = conexao::pegandoConexao();

			$sql = "SELECT * FROM softwares ORDER BY id";
			$sql = $con->prepare($sql);
			$sql->execute();

			$resultado = array();

			while ($tb = $sql->fetchObject()) {
				$resultado[] = $tb;
			}

			if (!$resultado) {
				return null;
			}

			return $resultado;
		}
	}

?>