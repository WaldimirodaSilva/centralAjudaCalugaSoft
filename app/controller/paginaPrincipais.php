<?php
	// Esta classe trabalha entregando que dados sera móstrada ao usúario
	class paginaPrincipais
	{
		public function home()
	{
			try{
				// pegando os dados no banco de dados
				$colecSoftware = dadosDatabase::softwares();

				// carregando a página com o twig
				$loader = new \Twig\Loader\FilesystemLoader('app/veiw');
				$twig = new \Twig\Environment($loader);
				$template = $twig->load('home.php');
				// colocando os dados do banco de dados na página
				$parametros = array();
				$parametros['softwares'] = $colecSoftware;

				// renderizando a página para o usúario
				$conteudo = $template->render($parametros);

				if (isset($_SESSION['softwareInserido'])) {
					helper::mensagem('softwareInserido');
				}elseif (isset($_SESSION['softwareErro'])) {
					helper::mensagem('softwareErro');
				}

				echo $conteudo;

			}catch(PDOException $e){
				echo "Erro na visualização: " . $e->getMessage();
			}
		}

		// os metodos abaixo seguem o mesmo conceito do primeiro

		public function artigo($params)
		{
			try
			{ 
				$colecArtigo = dadosDatabase::artigos($params[0]);

				$loader = new \Twig\Loader\FilesystemLoader('app/veiw');
				$twig = new \Twig\Environment($loader);
				$template = $twig->load('artigo.html');

				$parametros = array();
				$parametros['id'] = $params[0];
				$parametros['artigos'] = $colecArtigo;
				$parametros['vetor'] = array(10,45,33);

				// pegando id de cada artigo para chamar os seus passos
				if ($colecArtigo != null) {
					foreach ($colecArtigo as $artigo) {
						// pegando os passos do banco de dados desse artigo
						$passosArtigo = dadosDatabase::passos($artigo->id);
					
						$parametros['artigo'.$artigo->id] = $passosArtigo; 
					}
				}

				$conteudo = $template->render($parametros);

				if (isset($_SESSION['artigoInserido'])) {
					helper::mensagem('artigoInserido');
				}elseif (isset($_SESSION['artigoErro'])) {
					helper::mensagem('artigoErro');
				}

				if (isset($_SESSION['passoInserido'])) {
					helper::mensagem('passoInserido');
				}elseif (isset($_SESSION['passoErro'])) {
					helper::mensagem('passoErro');
				}

				echo $conteudo;
			}catch(PDOException $e){
				echo "Erro na visualização: ".$e->getMessage();
			}
		} 
 
		public function editarArtigo()
		{
			echo file_get_contents('app/veiw/editarArtigo.html');
		}

		public function erroPedido()
		{ 
			echo "erro pagina não existente";
		}

		public function perguntasFrequentes()
		{
			echo file_get_contents('app/veiw/perguntasFrequentes.html');	
		}
	}

?>