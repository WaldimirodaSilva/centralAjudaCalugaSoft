<?php

	// Esta classe trabalha entregando que dados sera móstrada ao usúario
	class paginaPrincipais{
		public function home(){
			try{

				$colecSoftware = dadosDatabase::softwares();

				$loader = new \Twig\Loader\FilesystemLoader('app/veiw');
				$twig = new \Twig\Environment($loader);
				$template = $twig->load('home.html');

				$parametros = array();
				$parametros['softwares'] = $colecSoftware;

				$conteudo = $template->render($parametros);

				echo $conteudo;

			}catch(PDOException $e){
				echo "Erro na visualização: " . $e->getMessage();
			}
		}

		public function artigo(){
			try{
				$idSoftware = pegaId::getId($_GET['id']);

				$loader = new \Twig\Loader\FilesystemLoader('app/veiw');
				$twig = new \Twig\Environment($loader);
				$template = $twig->load('artigo.html');

				$parametros = array();

				$conteudo = $template->render($parametros);

				echo $conteudo;
			}catch(PDOException $e){
				echo "Erro na visualização: ".$e->getMessage();
			}
		} 
 
		public function editarArtigo(){
			echo file_get_contents('app/veiw/editarArtigo.html');
		}

		public function erroPedido(){ 
			echo "erro pagina não existente";
		}

		public function perguntasFrequentes(){
			echo file_get_contents('app/veiw/perguntasFrequentes.html');	
		}
	}

?>