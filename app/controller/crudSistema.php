<?php 

// classe controller das inserções dos daodos

class crudSistema{
    private $objectoCadastro = 'Cadastro';

    public function InsercaoDatabase($parametros){
        try {

            entregaIdSoftware::send(1);

            if (!method_exists($this->objectoCadastro, $parametros['tipoCadastro'])) {
                throw new Exception("Erro no envio dos dados para o cadastro", 1);
            }

            $resposta = call_user_func(array(new $this->objectoCadastro, $parametros['tipoCadastro']),array('valor1' => $parametros['valor1'],'valor2' => $parametros['valor2']));

            echo $resposta;
            
        } catch (Exception $e) {
            return "ERRO: ".$e->getMessage();
        }
    }
}

// classe para inserção dos artigos e softwares

class Cadastro{
    public function cadastrarSoftware($parametros) {
        try {
            $conexao = conexao::pegandoConexao();

            // Utilizando prepared statement para prevenir SQL injection
            $stmt = $conexao->prepare("INSERT INTO softwares (nome, estado) VALUES (:nome, :estado)");
            $stmt->bindParam(':nome', $parametros['valor1']);
            $stmt->bindParam(':estado', $parametros['valor2']);

            $stmt->execute();

            $id = $conexao->lastInsertId();

            return 'Inserção feita com sucesso';
            //o ultimo id
        } catch (PDOException $e) {
            return "Erro ao cadastrar software: " . $e->getMessage();
        }
    } 
 
    public function cadastrarArtigo($parametros) {
        try {
            $conexao = conexao::pegandoConexao();
            $idSosftware = entregaIdSoftware::get();

            // Utilizando prepared statement para prevenir SQL injection
            $stmt = $conexao->prepare("INSERT INTO artigo (nome, softwarePertecente,estado) VALUES (:nome, :software,:estado)");
            $stmt->bindParam(':nome', $parametros['valor1']);
            $stmt->bindParam(':estado', $parametros['valor2']);
            $stmt->bindParam(':software', $idSosftware);

            $stmt->execute();

            $id = $conexao->lastInsertId();

            return 'Inserção feita com sucesso';
            //o ultimo id
        } catch (PDOException $e) {
            return "Erro ao cadastrar artigo: " . $e->getMessage();
        }
    } 
 
    public function cadastrarPassos($parametros) { 
        try {
            $conexao = conexao::pegandoConexao();

            // Utilizando prepared statement para prevenir SQL injection
            $stmt = $conexao->prepare("INSERT INTO passos (idArtigo, texto) VALUES (:idArtigo, :texto)");
            $stmt->bindParam(':nome', $parametros['valor1']);
            $stmt->bindParam(':estado', $parametros['valor2']);

            $stmt->execute();

            $id = $conexao->lastInsertId();

            return 'Inserção feita com sucesso';
            //o ultimo id
        } catch (PDOException $e) {
            return "Erro ao cadastrar passos: " . $e->getMessage();
        }
    }
}


/*
// chamada do metodo
$cadastroArtigo = new CadastroArtigo();
$titulo = "";
$passos = "";

$resultado = $cadastroArtigo->cadastrarArtigo($titulo, $passos);
*/


?>