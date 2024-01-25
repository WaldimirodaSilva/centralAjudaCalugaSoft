<?php

	// implementação da conexao ao banco de dados

	require_once 'lib/database/conexao.php';

	// implamentação do core

	require_once 'app/core/core.php';

	// implementação dos controllers

	require_once 'app/controller/paginaPrincipais.php';
	require_once 'app/controller/crudSistema.php';

	// trabalhando na entrega da página ao usúario

	ob_start();

		$core = new core();
		$core->pedindoController('paginaPrincipais');
		$template = $core->estrutura_pedida('principal');
		$core->start($_GET);

		$saida = ob_get_contents();

	ob_end_clean();

	// exibindo a veiw da página ao usúario

	$template_pronto = str_replace('{{area_dinamica}}', $saida, $template);

	echo $template_pronto;

?>