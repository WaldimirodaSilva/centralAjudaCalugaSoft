<?php

      // classe para colocar os arquivos (video e imagem) no sistema

      abstract class inserirArquivos
      {
            public static function mandarArquivo($arquivo,$pasta,$tipo)
            {
                  if ($tipo == 'imagem')
                  {
                        $arquivo_tmp = $arquivo['tmp_name'];

                        $unique = uniqid('arquivo',true);

                        $nomeArquivo = $unique.'.jpg';

                        $destino = 'app/template/img/'.$pasta.$nomeArquivo;

                        move_uploaded_file($arquivo_tmp,$destino); 

                        return $nomeArquivo;   
                  }else{
                        $arquivo_tmp = $arquivo['tmp_name'];

                        $unique = uniqid('arquivo',true);

                        $nomeArquivo = $arquivo_tmp;

                        $destino = 'app/'.$pasta.$nomeArquivo;

                        move_uploaded_file($arquivo_tmp,$destino); 

                        return $nomeArquivo;
                  }
            }

            public static function verificaExiste($avaliado,$tabela){

            }
      }

      // classes para inserção dos softwares,artigos e passos no banco de dados

	class insercaoDados extends inserirArquivos
      {
		public static function cadastrarSoftware($dadosInsercao,$arquivo)
            {
			$conexao = conexao::pegandoConexao();

                  if (isset($dadosInsercao['nome']) || isset($dadosInsercao['descricao']) || isset($arquivo))
                  {
                        $nomeArquivoBd = insercaoDados::mandarArquivo($arquivo,'softwares/','imagem');

                        // Utilizando prepared statement para prevenir SQL injection
                        $stmt = $conexao->prepare("INSERT INTO softwares (nome, imagem, estado, descricao) VALUES (:nome, :imagem, :estado, :descricao)");
                        $stmt->bindValue(':nome',$dadosInsercao['nome']);
                        $stmt->bindValue(':imagem',$nomeArquivoBd);
                        $stmt->bindValue(':estado',1);
                        $stmt->bindValue(':descricao',$dadosInsercao['descricao']);

                        $stmt->execute();     
                  }else{
                        throw new Exception("parametros nescessarios não existem", 1);
                        
                  }

                  //$id = $conexao->lastInsertId();
		}

		public static function cadastrarArtigo($idSoftware,$dadosInsercao,$arquivo)
            {
			$conexao = conexao::pegandoConexao();

                  if (isset($dadosInsercao['nome']) || isset($idSoftware) || isset($arquivo))
                  {
                        $nomeArquivoBd = insercaoDados::mandarArquivo($arquivo,'midias/','video');

                        var_dump($dadosInsercao);

                        // Utilizando prepared statement para prevenir SQL injection
                        /*$stmt = $conexao->prepare("INSERT INTO artigo (nome, softwarePertecente,estado) VALUES (:nome, :software,:estado)");
                        $stmt->bindValue(':nome',$dadosInsercao['titulo']);
                        $stmt->bindValue(':software',$software);
                        $stmt->bindValue(':estado',1);

                        $id = $conexao->lastInsertId();

                        $stmt->execute();

                        $stmt_2 = $conexao->prepare("INSERT INTO artigo (idArtigo, nomeMidia) VALUES (:id, :midia)");

                        $stmt_2->bindValue(':id',$id);
                        $stmt_2->bindValue(':midia',$nomeArquivoBd);

                        $stmt_2->execute();*/


                  }else{
                        throw new Exception("parametros nescessarios não existem", 1);
                        
                  }

                  //$id = $conexao->lastInsertId();
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