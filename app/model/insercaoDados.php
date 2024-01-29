<?php

	class insercaoDados{
		public static function cadastrarSoftware($dadosInsercao){
			$conexao = conexao::pegandoConexao();

            // Utilizando prepared statement para prevenir SQL injection
            $stmt = $conexao->prepare("INSERT INTO softwares (nome, estado) VALUES (:nome, :estado)");
            $stmt->bindParam(':nome', );
            $stmt->bindParam(':estado', );

            $stmt->execute();

            $id = $conexao->lastInsertId();
		}

		public static function cadastrarArtigo($idSoftware,$dadosInsercao){
			$conexao = conexao::pegandoConexao();

            // Utilizando prepared statement para prevenir SQL injection
            $stmt = $conexao->prepare("INSERT INTO artigo (nome, softwarePertecente,estado) VALUES (:nome, :software,:estado)");
            $stmt->bindParam(':nome', );
            $stmt->bindParam(':estado', );

            $stmt->execute();

            $id = $conexao->lastInsertId();
		}

		public static function cadastrarPassos($idArtigo,$dadosInsercao){
			$conexao = conexao::pegandoConexao();

            // Utilizando prepared statement para prevenir SQL injection
            $stmt = $conexao->prepare("INSERT INTO passos (idArtigo, texto) VALUES (:idArtigo, :texto)");
            $stmt->bindParam(':nome', );
            $stmt->bindParam(':estado', );

            $stmt->execute();

            $id = $conexao->lastInsertId();
		}
	}

?>