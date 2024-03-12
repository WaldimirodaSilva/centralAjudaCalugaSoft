<?php

      // classe para colocar os arquivos (video e imagem) no sistema

      abstract class inserirArquivos
      {
            public static function mandarArquivo($arquivo,$pasta,$tipo)
            {
                  if ($tipo == 'imagem')
                  {
                        if ($arquivo['type'] == '') {
                              # code...
                        }
                        $arquivo_tmp = $arquivo['tmp_name'];

                        $unique = uniqid('arquivo',true);

                        $nomeArquivo = $unique.'.jpg';

                        $destino = 'app/template/img/'.$pasta.$nomeArquivo;

                        move_uploaded_file($arquivo_tmp,$destino); 

                        return $nomeArquivo;   
                  }else
                  {
                        $arquivo_tmp = $arquivo['tmp_name'];

                        $unique = uniqid('arquivo',true);

                        $nomeArquivo = $arquivo['name'];

                        $destino = 'app/template/'.$pasta.$nomeArquivo;

                        move_uploaded_file($arquivo_tmp,$destino); 

                        return $nomeArquivo;
                  }
            }

            public static function verificaExiste($avaliado,$tabela)
            {

            }
      }

      // classes para inserção dos softwares,artigos e passos no banco de dados

	class insercaoDados extends inserirArquivos
      {
		public static function cadastrarSoftware($dadosInsercao,$arquivo)
            {
			$conexao = conexao::pegandoConexao();

                  if (!empty($dadosInsercao['nome']) && !empty($dadosInsercao['descricao']) && !empty($arquivo))
                  {
                        $nomeArquivoBd = insercaoDados::mandarArquivo($arquivo,'softwares/','imagem');

                        // Utilizando prepared statement para prevenir SQL injection
                        $stmt = $conexao->prepare("INSERT INTO softwares (nome, imagem, estado, descricao) VALUES (:nome, :imagem, :estado, :descricao)");
                        $stmt->bindValue(':nome',$dadosInsercao['nome']);
                        $stmt->bindValue(':imagem',$nomeArquivoBd);
                        $stmt->bindValue(':estado',1);
                        $stmt->bindValue(':descricao',$dadosInsercao['descricao']);
                        $stmt->execute(); 
                        //helper::mensagem('softwareInserido','O software foi cadastrado com sucesso');    
                  }else
                  {
                        //helper::mensagem('softwareErro','Os paramentros não podem estar vazios','danger');
                  }

                  //$id = $conexao->lastInsertId();
		}

		public static function cadastrarArtigo($idSoftware,$dadosInsercao,$arquivo)
            {
			$conexao = conexao::pegandoConexao();

                  if (!empty($dadosInsercao['titulo']) && !empty($idSoftware) && !empty($arquivo))
                  {
                        $nomeArquivoBd = insercaoDados::mandarArquivo($arquivo,'midias/','video');

                        // Utilizando prepared statement para prevenir SQL injection 
                        $stmt = $conexao->prepare("INSERT INTO artigo (nome, video, softwarePertecente,estado) VALUES (:nome, :video, :software,:estado)");
                        $stmt->bindValue(':nome',$dadosInsercao['titulo']);
                        $stmt->bindValue(':video',$nomeArquivoBd);
                        $stmt->bindValue(':software',$idSoftware);
                        $stmt->bindValue(':estado',1);

                        //$id = $conexao->lastInsertId();

                        $stmt->execute();

                        helper::mensagem('artigoInserido','O artigo foi cadastrado com sucesso');
                  }else
                  {
                        helper::mensagem('artigoErro','Os paramentros não podem estar vazios','danger');
                  }

                  //$id = $conexao->lastInsertId();
		}

		public static function cadastrarPassos($idArtigo,$dadosInsercao)
            {
			$conexao = conexao::pegandoConexao();

                  if (!empty($idArtigo) && !empty($dadosInsercao['passo'])) 
                  {
                        // Utilizando prepared statement para prevenir SQL injection
                        $stmt = $conexao->prepare("INSERT INTO passos (idArtigo, texto) VALUES (:idArtigo, :texto)");
                        $stmt->bindValue(':idArtigo', $idArtigo);
                        $stmt->bindValue(':texto', $dadosInsercao['passo']);

                        $stmt->execute();

                        helper::mensagem('passoInserido','O passo foi cadastrado com sucesso');
                        //$id = $conexao->lastInsertId();     
                  }else
                  {
                        helper::mensagem('passoErro','Os paramentros não podem estar vazios','danger');
                  }
		}
	}

?>