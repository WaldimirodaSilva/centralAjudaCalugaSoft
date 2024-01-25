<?php 

// classe para inserção dos artigos e softwares

class CadastroArtigo{
    public function cadastrarArtigo($nome, $estado) {
        try {
            $conexao = conexao::pegandoConexao();

            // Utilizando prepared statement para prevenir SQL injection
            $stmt = $conexao->prepare("INSERT INTO artigo (nome, estado) VALUES (:nome, :estado)");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':estado', $estado);

            $stmt->execute();

            $id = $conexao->lastInsertId();
            //o ultimo id
        } catch (PDOException $e) {
            return "Erro ao cadastrar artigo: " . $e->getMessage();
        }
    }
}

class CadastroPassos{
    public function cadastrarPassos($idArtigo, $texto) {
        try {
            $conexao = conexao::pegandoConexao();

            // Utilizando prepared statement para prevenir SQL injection
            $stmt = $conexao->prepare("INSERT INTO passo (idArtigo, texto) VALUES (:idArtigo, :texto)");
            $stmt->bindParam(':idArtigo', $idArtigo);
            $stmt->bindParam(':texto', $texto);

            $stmt->execute();

            $id = $conexao->lastInsertId();
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