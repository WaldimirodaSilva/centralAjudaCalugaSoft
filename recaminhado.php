<?php

    //inicio de sessão
    session_start();
	// implementação da conexao ao banco de dados

	require_once 'lib/database/conexao.php';

	// implamentação do core

	require_once 'app/core/core.php';

	// implementação das models

	require_once 'app/model/insercaoDados.php';
	require_once 'app/model/dadosDatabase.php';
	require_once 'app/model/edicaoArtigo.php';

     // implementação do Helper para tratamento de regras que extras de negócio..
	 require_once 'app/helper/helper.php';

	// implementação dos controllers 
	require_once 'app/controller/paginaPrincipais.php';
	require_once 'app/controller/crudSistema.php';
	require_once 'app/controller/paginaViaUrl.php';

	//implementação do componentes composer

	require_once 'vendor/autoload.php';

	// trabalhando na entrega da página ao usúario

	ob_start();

		$core = new core();
		$core->start($_GET);
		$template = $core->estrutura_pedida('principal');

		$saida = ob_get_contents();

	ob_end_clean();

	// exibindo a veiw da página ao usúario

	$template_pronto = str_replace('{{area_dinamica}}', $saida, $template);

	echo $template_pronto;

?>