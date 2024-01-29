<?php

      // classe para colocar os arquivos (video e imagem) no sistema

      abstract class inserirArquivos
      {
            public static function mandarArquivo($arquivo,$pasta)
            {
                  $arquivo_tmp = $arquivo['tmp_name'];

                  $unique = uniqid('arquivo',true);

                  $nomeArquivo = $unique.'.jpg';

                  $destino = 'app/template/img/'.$pasta.$nomeArquivo;

                  move_uploaded_file($arquivo_tmp,$destino); 

                  return $nomeArquivo;
            }
      }

      // classes para inserção dos softwares,artigos e passos no banco de dados

	class insercaoDados extends inserirArquivos
      {
		public static function cadastrarSoftware($dadosInsercao,$arquivo)
            {
			$conexao = conexao::pegandoConexao();

                  $nomeArquivoBd = insercaoDados::mandarArquivo($arquivo,'softwares/');

                  // Utilizando prepared statement para prevenir SQL injection
                  $stmt = $conexao->prepare("INSERT INTO softwares (nome, imagem, estado, descricao) VALUES (:nome, :imagem, :estado, :descricao)");
                  $stmt->bindValue(':nome',$dadosInsercao['nome']);
                  $stmt->bindValue(':imagem',$nomeArquivoBd);
                  $stmt->bindValue(':estado',1);
                  $stmt->bindValue(':descricao',$dadosInsercao['descricao']);

                  $stmt->execute();

                  //$id = $conexao->lastInsertId();
		}

		public static function cadastrarArtigo($idSoftware,$dadosInsercao)
            {
			$conexao = conexao::pegandoConexao();

                  // Utilizando prepared statement para prevenir SQL injection
                  $stmt = $conexao->prepare("INSERT INTO artigo (nome, softwarePertecente,estado) VALUES (:nome, :software,:estado)");
                  $stmt->bindParam(':nome', );
                  $stmt->bindParam(':estado', );

                  $stmt->execute();

                  $id = $conexao->lastInsertId();
		}

		public static function cadastrarPassos($idArtigo,$dadosInsercao)
            {
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