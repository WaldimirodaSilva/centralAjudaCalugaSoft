<?php 

// controller que encaminha os dados de inserção

class crudSistema{
    public function cadastrarSoftware() {
       try {
            
            // chamando a classe e o metodo que fazem a inserção dos softwares
            insercaoDados::cadastrarSoftware($_POST,$_FILES['arquivo']);

            header('Location: http://localhost/www/centralAjudaCalugaSoft/');
 
       } catch (PDOException $e) {
            echo "Erro ao cadastrar software: " . $e->getMessage();
       }
    } 
 
    public function cadastrarArtigo($parametro) {
        try {

            if ($_POST == null || !isset($_POST) || $_FILES == null || !isset($_FILES) || $parametro == null || !isset($parametro)) {
                // chamando a classe e o metodo que fazem a inserção dos artigos
                insercaoDados::cadastrarArtigo($parametro[0],$_POST,$_FILES['arquivo']);

                echo "inserção feita com sucesso";

                //header('Location: http://localhost/www/centralAjudaCalugaSoft/?pagina=artigo&id='.$parametros);   
            }else{
                throw new Exception("os parametros nescessarios não existem", 1);
                
            }
            
        } catch (PDOException $e) {
            echo "Erro ao cadastrar artigo: " . $e->getMessage();
        }
    } 
 
    public function cadastrarPassos($parametro) { 
        try {
            
            if ($_POST == null || !isset($_POST) || $parametro == null || !isset($parametro)) {
                // chamando a classe e o metodo que fazem a inserção dos passos
                insercaoDados::cadastrarPassos($parametro[0],$_POST);

                echo "inserção feita com sucesso";   
            }else{
                throw new Exception("os parametros nescessarios não existem", 1);
                
            }
            
        } catch (PDOException $e) {
            echo "Erro ao cadastrar passos: " . $e->getMessage();
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