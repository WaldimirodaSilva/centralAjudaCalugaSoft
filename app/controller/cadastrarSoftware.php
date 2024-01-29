<?php

$cadastro = new Cadastro();

// Retrieve the form data
$parametros = $_POST;

// Call the cadastrarSoftware method and get the result
$result = $cadastro->cadastrarSoftware($parametros);

// Return the result as JSON
echo json_encode($result);
?>