<?php 

// controller que encaminha os dados de inserção

class crudSistema{
    public function cadastrarSoftware() {
       try {
            
            // chamando a classe e o metodo que fazem a inserção dos softwares
            insercaoDados::cadastrarSoftware($_POST,$_FILES['arquivo']);
            // Verifica se está sendo executado no servidor WAMP
                if (strpos($_SERVER['SERVER_SOFTWARE'], 'WAMP') !== false) {
            // Redireciona para o endereço no WAMP
                    header('Location: http://localhost/www/centralAjudaCalugaSoft/');
                    exit;
                } else {
            // Redireciona para o endereço padrão XAMP  
                    header('Location: http://localhost/centralAjudaCalugaSoft/');
                    exit;
                }
 
       } catch (PDOException $e) {
            echo "Erro ao cadastrar software: " . $e->getMessage();
       }
    } 
 
    public function cadastrarArtigo($parametro) {
        try {

            if ($_POST != null || !isset($_POST) || $_FILES != null || !isset($_FILES) || $parametro != null || !isset($parametro)) {
                // chamando a classe e o metodo que fazem a inserção dos artigos
                insercaoDados::cadastrarArtigo($parametro[0],$_POST,$_FILES['arquivo']); 

                header('Location: http://localhost/www/centralAjudaCalugaSoft/?pagina=artigo&id='.$parametro);   
            }else{
                throw new Exception("os parametros nescessarios não existem", 1);
                
            }
            
        } catch (PDOException $e) {
            echo "Erro ao cadastrar artigo: " . $e->getMessage();
        }

    } 
 
    public function cadastrarPassos($parametro) { 
        try {
            
            if ($_POST != null || !isset($_POST) || $parametro != null || !isset($parametro)) {
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