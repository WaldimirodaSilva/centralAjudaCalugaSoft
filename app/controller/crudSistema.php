<?php 

// controller que encaminha os dados de inserção

class crudSistema{
    public function cadastrarSoftware() {
       try {
            
            // chamando a classe e o metodo que fazem a inserção dos softwares
            insercaoDados::cadastrarSoftware($_POST,$_FILES['arquivo']);

            header('Location: http://localhost/www/centralAjudaCalugaSoft/');
 
       } catch (PDOException $e) {
            return "Erro ao cadastrar software: " . $e->getMessage();
       }
    } 
 
    public function cadastrarArtigo($parametros) {
        try {
            
            // chamando a classe e o metodo que fazem a inserção dos artigos
            insercaoDados::cadastrarArtigo();

            echo "inserção feita com sucesso";
            
        } catch (PDOException $e) {
            return "Erro ao cadastrar artigo: " . $e->getMessage();
        }
    } 
 
    public function cadastrarPassos($parametros) { 
        try {
            
            // chamando a classe e o metodo que fazem a inserção dos passos
            insercaoDados::cadastrarPassos();

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