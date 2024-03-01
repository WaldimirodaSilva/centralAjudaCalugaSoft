<?php

	// classes para pegar os dados no banco de dados

	class dadosDatabase
	{
		// classe para pegar todos so software no banco de dados
		public static function softwares()
		{
			$con = conexao::pegandoConexao();

			$sql = "SELECT * FROM softwares ORDER BY id desc";
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

		public static function artigos($idSoft)
		{
			$con = conexao::pegandoConexao();

			$sql = "SELECT * FROM artigo WHERE softwarePertecente = '$idSoft' ORDER BY id desc";
			$sql = $con->prepare($sql);
			$sql->execute();

			$resultado = array();

			while ($tb= $sql->fetchObject()) {
				$resultado[] = $tb;
			}

			if (!$resultado) {
				return null;
			}

			return $resultado;
		}

		public static function passos($idArtigo){
			$con = conexao::pegandoConexao();

			$sql = "SELECT * FROM passos WHERE idArtigo = '$idArtigo' ORDER BY id asc";
			$sql = $con->prepare($sql);
			$sql->execute();

			$resultado = array();

			while ($tb= $sql->fetchObject()) {
				$resultado[] = $tb;
			}

			if (!$resultado) {
				return null;
			}

			return $resultado;
		}
	}

?>