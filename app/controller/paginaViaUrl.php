<?php

	// esta classe vai trabalhar com as páginas vistas por usuarios de fora
	class paginaViaUrl
	{
		public function centraldeajuda($params)
		{
			try
			{
				// pegando os dados no banco de dados
				$colecArtigo = dadosDatabase::artigos($params[0]);

				// carregando a página com o twig
				$loader = new \Twig\Loader\FilesystemLoader('app/veiw');
				$twig = new \Twig\Environment($loader);
				$template = $twig->load('artigosViaUrl.html');
				// colocando os dados do banco de dados na página
				$parametros = array();

				$parametros = array();
				$parametros['id'] = $params[0];
				$parametros['artigos'] = $colecArtigo;

				// pegando id de cada artigo para chamar os seus passos
				$vetor = array();
				if ($colecArtigo != null) {
					foreach ($colecArtigo as $artigo) {
						// pegando os passos do banco de dados desse artigo
						$passosArtigo = dadosDatabase::passos($artigo->id);
					
						$vetor[] = $passosArtigo;
					}
					$parametros['passosArtigos'] = $vetor;
				}

				// renderizando a página para o usúario
				$conteudo = $template->render($parametros);

				echo $conteudo;
			}catch(PDOException $e)
			{
				echo "Erro na visualização: ". $e->getMessage();
			}
		}
	}

?>