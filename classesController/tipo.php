<?php

require_once '../interface/tipoid.php';


class tipo implements tipoid{

    private $idTipo;
    private $nomeTipo;
    
    public function getIdTipo() {
        return $this->idTipo;
    }

    public function getNomeTipo() {
        return $this->nomeTipo;
    }

    public function setIdTipo($idTipo) {
        $this->idTipo = $idTipo;
    }

    public function setNomeTipo($nomeTipo) {
        $this->nomeTipo = $nomeTipo;
    }

    public function cadastraTipo(){
        $verificaUltimoRegistro = "SELECT MAX(idTipo) as idTipo FROM tipo";
        $resultadoVerificacao = mysql_query($verificaUltimoRegistro) or die ("Não foi realizada a consulta pelo id do Tipo. Verifique sob o erro: ".mysql_error());
        
        if ($resultadoVerificacao){
            $linhaVerificacao = mysql_fetch_array($resultadoVerificacao);
            $this->idTipo = $linhaVerificacao['idTipo'] + 1;
        } 
        
        $sql = "INSERT INTO tipo (idTipo, nomeTipo) VALUES (".$this->idTipo.", '".$this->nomeTipo."')";
        $resultado = mysql_query($sql) or die ("Não foi possível inserir os dados. Verifique sob o erro: ".mysql_error());
        if ($resultado){
            echo "Tipo inserido com sucesso!";
        }else{
            echo "Não foi possível inserir o tipo. ".ERROSISTEMA;
        }
        mysql_close($resultadoVerificacao);
        mysql_close($resultado);
        
    }
    public function atualizaTipo() {
        
        $sql = "UPDATE tipo SET nomeTipo = '".$this->nomeTipo."' WHERE idTipo = ".$this->idTipo;
        $resultado = mysql_query($sql) or die ("Não foi possível atualizar o tipo. Verifique sob o erro: ".mysql_error());
        if ($resultado){
            echo "Atualização efetuada com sucesso!";
        }else{
            echo "Não foi possível efetuar a atualização. ".ERROSISTEMA;
        }
        mysql_close($resultado);
    }
    public function consultaTipo() {
        $sql = "SELECT * FROM tipo";
        $resultado = mysql_query($sql) or die ("Não foi possível consultar os tipos. Verifique sob o erro: ".mysql_error());
        if ($resultado >= 1){
            //Informar tabela.
        }else{
            echo "Nâo contém conteúdo para a consulta.";
        }
        mysql_close($resultado);
    }
    public function excluiTipo() {
        $sql = "DELETE FROM tipo WHERE idTipo = ".$this->idTipo;
        $resultado = mysql_query($sql) or die ("Não foi possível executar a exclusão. Verfique sob o erro: ".mysql_error());
        if ($resultado){
            echo "Exclusão efetuada com sucesso!";
        }else{
            echo "Não foi efetuada a exclusão. ".ERROSISTEMA;
        }
        mysql_close($resultado);
    }
}
