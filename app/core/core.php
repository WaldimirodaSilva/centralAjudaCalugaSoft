<?php

	class core
	{
		// atributo que recebe o controller a ser pedido;
		private $controller;
		private $acao;

		// metodo que define o controller que sera trabalhado
		public function pedindoController($paginas)
		{
			if (method_exists('paginaPrincipais', $paginas)) 
			{
				return 'paginaPrincipais';
			}elseif (method_exists('crudSistema', $paginas)) 
			{
				return 'crudSistema';
			}elseif (method_exists('paginaViaUrl', $paginas)) 
			{
				return 'paginaViaUrl';
			}else
			{
				$this->acao = 'erroPedido';
				return 'paginaPrincipais';
			}
		}

		// metodo para exibição dos dados da página pedida
		public function start($urlGet)
		{

			if (!class_exists($this->controller)) {
				$this->controller = 'paginaPrincipais';
				$this->acao = 'erroPedido';
			}

			if (!isset($urlGet['pagina'])) {
				$this->acao = 'home';
				$this->controller = $this->pedindoController('home');
			}else{
				$this->acao = $urlGet['pagina'];
				$this->controller = $this->pedindoController($urlGet['pagina']);
			} 

			if (isset($urlGet['id']) && $urlGet['id'] != null) {
				$id = $urlGet['id'];
			}else{
				$id = null;
			}

			if (isset($urlGet['idSegundo']) && $urlGet['idSegundo'] != null) {
				$idSegundo = $urlGet['idSegundo'];
			}else{
				$idSegundo = null;
			}

			call_user_func(array(new $this->controller,$this->acao), array($id,$idSegundo));
		}

		// metodo que define que página sera exibida ao usúario
		public function estrutura_pedida($estrutura)
		{
			switch ($estrutura) 
			{
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