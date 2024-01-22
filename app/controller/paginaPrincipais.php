<?php

	// Esta classe trabalha entregando que dados sera móstrada ao usúario
	class paginaPrincipais{
		public function home(){
			echo file_get_contents('app/veiw/home.html');
		}

		public function erroPedido(){
			echo "erro pagina não existente";
		}
	}

?>