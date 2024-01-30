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

                  if (empty($dadosInsercao['nome']) || empty($idSoftware) || empty($arquivo))
                  {
                        $nomeArquivoBd = insercaoDados::mandarArquivo($arquivo,'midias/','video');

                        var_dump($dadosInsercao);

                        // Utilizando prepared statement para prevenir SQL injection
                        $stmt = $conexao->prepare("INSERT INTO artigo (nome, video, softwarePertecente,estado) VALUES (:nome, :video, :software,:estado)");
                        $stmt->bindValue(':nome',$dadosInsercao['titulo']);
                        $stmt->bindValue(':video',$nomeArquivoBd);
                        $stmt->bindValue(':software',$software);
                        $stmt->bindValue(':estado',1);

                        $id = $conexao->lastInsertId();

                        $stmt->execute(); 

                        $stmt_2->execute();


                  }else{
                        throw new Exception("parametros para a inserção estão vazios", 1);
                        
                  }

                  //$id = $conexao->lastInsertId();
		}

		public static function cadastrarPassos($idArtigo,$dadosInsercao)
            {
			$conexao = conexao::pegandoConexao();

                  if (!empty($idArtigo) || !empty($dadosInsercao['passo'])) {
                        // Utilizando prepared statement para prevenir SQL injection
                        $stmt = $conexao->prepare("INSERT INTO passos (idArtigo, texto) VALUES (:idArtigo, :texto)");
                        $stmt->bindValue(':id', $idArtigo);
                        $stmt->bindValue(':texto', $dadosInsercao['passo']);

                        $stmt->execute();

                        //$id = $conexao->lastInsertId();     
                  }else{
                        throw new Exception("parametros para a inserção estão vazios", 1);
                        
                  }
		}
	}

?>