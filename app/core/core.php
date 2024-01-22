<?php

	class core{
		// atributo que recebe o controller a ser pedido;
		private $controller;

		// metodo que define o controller que sera trabalhado
		public function pedindoController($paginas){
			$this->controller = $paginas;
		}

		// metodo para exibição dos dados da página pedida
		public function start($urlGet){

			if (!class_exists($this->controller)) {
				$this->controller = 'paginaPrincipais';
			}

			if (!isset($urlGet['pagina'])) {
				$acao = 'home';
			}else{
				$acao = $urlGet['pagina'];
			}

			if (!method_exists($this->controller, $acao)) {
				$acao = 'erroPedido';
			}

			call_user_func(array(new $this->controller,$acao), array());
		}

		// metodo que define que página sera exibida ao usúario
		public function estrutura_pedida($estrutura){
			switch ($estrutura) {
				case 'principal':
					return file_get_contents('app/template/estrutura.html');
					break;
				
				default:
					return 'sem uma estrutura defenida';
					break;
			}
		}
	}

?>