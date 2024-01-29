<?php 

// classe para inserção dos artigos e softwares 

class Cadastro{
    public function cadastrarSoftware() {
       try {
            
            insercaoDado::cadastrarSoftware();

            echo "inserção feita com sucesso";
 
       } catch (PDOException $e) {
            return "Erro ao cadastrar software: " . $e->getMessage();
       }
    } 
 
    public function cadastrarArtigo($parametros) {
        try {
            
            insercaoDado::cadastrarArtigo();

            echo "inserção feita com sucesso";
            
        } catch (PDOException $e) {
            return "Erro ao cadastrar artigo: " . $e->getMessage();
        }
    } 
 
    public function cadastrarPassos($parametros) { 
        try {
            
            insercaoDado::cadastrarPassos();

            echo "inserção feita com sucesso";
            
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