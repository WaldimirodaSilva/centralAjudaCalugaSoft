<?php

    /* esse código trabalha verificando se os dados do artigo foram modificados na requisição
    se sim ele faz a troca se não ele envia a mensagem de erro, mas essa mensagem e só é mandada se todos
    os dados do formulário não serem modificados e mesmo assim o usuario fazer a requisição.
    */

    // essa classe vai permitir a actualização dos dados do artigo
    class edicaoArtigo
    {
        // essa atributo controla o numero de repetições na requesição de actualização
        private static $repeticao = 0;

        /* esse metodo verifica se os dados estão sendo modificados ou não, se sim ele faz a actualização
        se não ele faz o controle de repitação
        */
        private static function verificarExistenciaTroca($tabelaDatabase,$tipoId,$dado,$colunaDatabase,$id,$con)
        {
            $sql = "SELECT * FROM $tabelaDatabase WHERE $colunaDatabase = '$dado'";
            $sql = $con->prepare($sql);
            $sql->execute();

            echo $dado;
            if ($sql->rowCount() == 1) {
                self::$repeticao += 1;
            }else{
                $sql = $con->prepare("UPDATE $tabelaDatabase SET $colunaDatabase = '$dado' WHERE $tipoId = '$id'");
                $sql->execute();
            }
        }

        // o metodo abaixao seguem o mesmo padrão do anterior
        private static function verificarExistenciaTrocaFile($tabelaDatabase,$dado,$arquivo,$colunaDatabase,$id,$con)
        {
            if (empty($dado)) {
                self::$repeticao += 1;
            }else{
                $sql = "UPDATE $tabelaDatabase SET $colunaDatabase = '$dado' WHERE id = '$id'";
                $sql = $con->prepare($sql);
                $sql->execute();

                inserirArquivos::mandarArquivo($arquivo,'midias/','video');
            }
        }

        private static function pegarIdpasso($passoTexto,$con)
        {
            $sql = "SELECT * FROM passos WHERE texto = '$passoTexto'";
            $sql = $con->prepare($sql);
            $sql->execute();

            while ($tb= $sql->fetchObject()) {
                $id = $tb->id;
            }

            return $id;
        }

        // esse metodo recebe os dados e perminte a verificação e actualização
        public static function mudarDados($dadosArtigo,$arquivo,$passosQuantidade,$idArtigo)
        {
            $conexao = conexao::pegandoConexao();

            if (!empty($dadosArtigo['titulo']) && !empty($arquivo['video'])) {
                self::verificarExistenciaTroca('artigo','id',$dadosArtigo['titulo'],'nome',$idArtigo,$conexao);

                for ($i=0; $i < $passosQuantidade; $i++) { 
                    $idPasso = self::pegarIdpasso($dadosArtigo['verIdPasso'. $i + 1],$conexao);
                    self::verificarExistenciaTroca('passos','id',$dadosArtigo['passo'. $i + 1],'texto',$idPasso,$conexao); 
                }

                self::verificarExistenciaTrocaFile('artigo',$arquivo['video']['name'],$arquivo['video'],'video',$idArtigo,$conexao);

                if (self::$repeticao < 2 + $passosQuantidade) 
                {
                    helper::mensagem('atualizacaoFeita','Actualização dos dados feito com sucesso');
                }else
                {
                    helper::mensagem('atualizacaoErro','Para actualizar é nescessario que se faça uma ou mais alteração no artigo','danger');
                }                
            }else
            {
                echo "erro vazio";
                helper::mensagem('atualizacaoErro','Os paramentros não podem estar vazios','danger');
            }
        }
    }

?>