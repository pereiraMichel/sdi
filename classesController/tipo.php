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
        $resultadoVerificacao = mysql_query($verificaUltimoRegistro) or die ("N�o foi realizada a consulta pelo id do Tipo. Verifique sob o erro: ".mysql_error());
        
        if ($resultadoVerificacao){
            $linhaVerificacao = mysql_fetch_array($resultadoVerificacao);
            $this->idTipo = $linhaVerificacao['idTipo'] + 1;
        } 
        
        $sql = "INSERT INTO tipo (idTipo, nomeTipo) VALUES (".$this->idTipo.", '".$this->nomeTipo."')";
        $resultado = mysql_query($sql) or die ("N�o foi poss�vel inserir os dados. Verifique sob o erro: ".mysql_error());
        if ($resultado){
            echo "Tipo inserido com sucesso!";
        }else{
            echo "N�o foi poss�vel inserir o tipo. ".ERROSISTEMA;
        }
        mysql_close($resultadoVerificacao);
        mysql_close($resultado);
        
    }
    public function atualizaTipo() {
        
        $sql = "UPDATE tipo SET nomeTipo = '".$this->nomeTipo."' WHERE idTipo = ".$this->idTipo;
        $resultado = mysql_query($sql) or die ("N�o foi poss�vel atualizar o tipo. Verifique sob o erro: ".mysql_error());
        if ($resultado){
            echo "Atualiza��o efetuada com sucesso!";
        }else{
            echo "N�o foi poss�vel efetuar a atualiza��o. ".ERROSISTEMA;
        }
        mysql_close($resultado);
    }
    public function consultaTipo() {
        $sql = "SELECT * FROM tipo";
        $resultado = mysql_query($sql) or die ("N�o foi poss�vel consultar os tipos. Verifique sob o erro: ".mysql_error());
        if ($resultado >= 1){
            //Informar tabela.
        }else{
            echo "N�o cont�m conte�do para a consulta.";
        }
        mysql_close($resultado);
    }
    public function excluiTipo() {
        $sql = "DELETE FROM tipo WHERE idTipo = ".$this->idTipo;
        $resultado = mysql_query($sql) or die ("N�o foi poss�vel executar a exclus�o. Verfique sob o erro: ".mysql_error());
        if ($resultado){
            echo "Exclus�o efetuada com sucesso!";
        }else{
            echo "N�o foi efetuada a exclus�o. ".ERROSISTEMA;
        }
        mysql_close($resultado);
    }
}
