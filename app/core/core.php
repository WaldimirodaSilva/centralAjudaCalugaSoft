<?php

	class core{
		// atributo que recebe o controller a ser pedido;
		private $controller;
		private $acao;

		// metodo que define o controller que sera trabalhado
		public function pedindoController($paginas){
			if (method_exists('paginaPrincipais', $paginas)) {
				return 'paginaPrincipais';
			}elseif (method_exists('crudSistema', $paginas)) {
				return 'crudSistema';
			}else{
				$this->acao = 'erroPedido';
				return 'paginaPrincipais';
			}
		}

		// metodo para exibição dos dados da página pedida
		public function start($urlGet){

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

			if (isset($urlGet['tipoCadastro']) || isset($urlGet['valor1']) || isset($urlGet['2'])){
				$cadastroOn = true;
				$tipoCadastro = $urlGet['tipoCadastro'];
				$valor1 = $urlGet['valor1'];
				$valor2 = $urlGet['valor2'];
			}else{
				$cadastroOn = false;
			}

			if ($cadastroOn == true) {
				call_user_func(array(new $this->controller,$this->acao), array('tipoCadastro' => $tipoCadastro,'valor1' => $valor1,'valor2' => $valor2));
			}else{
				call_user_func(array(new $this->controller,$this->acao), array());
			}
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