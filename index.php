<?php

	// implamentação das classes

	require_once 'app/core/core.php';
	require_once 'app/controller/paginaPrincipais.php';

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