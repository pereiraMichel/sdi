<?php

require_once '../interface/statusid.php';

class status implements statusid{
    
    private $idStatus;
    private $nomeStatus;
    
    public function getIdStatus() {
        return $this->idStatus;
    }

    public function getNomeStatus() {
        return $this->nomeStatus;
    }

    public function setIdStatus($idStatus) {
        $this->idStatus = $idStatus;
    }

    public function setNomeStatus($nomeStatus) {
        $this->nomeStatus = $nomeStatus;
    }

    public function cadastraStatus() {
        $verificaUltimoRegistro = "SELECT MAX(idStatus) as idStatus FROM status";
        $resultadoVerificacao = mysql_query($verificaUltimoRegistro) or die ("N�o foi realizada a consulta pelo id do Status. Verifique sob o erro: ".mysql_error());
        
        if ($resultadoVerificacao){
            $linhaVerificacao = mysql_fetch_array($resultadoVerificacao);
            $this->idTipo = $linhaVerificacao['idStatus'] + 1;
        }
        
        $sql = "INSERT INTO status (idStatus, nomeStatus) VALUES (".$this->idStatus.", '".$this->nomeStatus."')";
        $resultado = mysql_query($sql) or die ("N�o foi poss�vel inserir o tipo. Verifique sob o erro: ".mysql_error());
        if ($resultado){
            echo "Tipo incluso com sucesso!";
        }else{
            echo "N�o foi poss�vel efetuar a inclus�o do tipo. ".ERROSISTEMA;
        }
        mysql_close($resultadoVerificacao);
        mysql_close($resultado);
        
    }
    public function atualizaStatus() {
        $sql = "UPDATE status SET nomeStatus = '".$this->nomeStatus."' WHERE idStatus = ".$this->idStatus;
        $resultado = mysql_query($sql) or die ("N�o foi poss�vel alterar o tipo. Verifique sob o erro: ".mysql_error());
        if ($resultado){
            echo "Altera��o efetuada com sucesso!";
        }else{
            echo "N�o foi poss�vel alterar o tipo. ".ERROSISTEMA;
        }
        mysql_close($resultado);
    }
    public function consultaStatus() {
        $sql = "SELECT * FROM status";
        $resultado = mysql_query($sql) or die ("N�o foi poss�vel efetuar a consulta. Verifique sob o erro: ".mysql_error());
        if ($resultado >= 1){
            //Insere tabela.
        }else{
            echo "N�o cont�m Status.";
        }
        mysql_close($resultado);
    }
    public function excluiStatus() {
        $sql = "DELETE FROM status WHERE idStatus = ".$this->idStatus;
        $resultado = mysql_query($sql) or die ("N�o foi poss�vel excluir o status. Verifique sob o erro: ".mysql_error());
        if ($resultado){
            echo "Exclus�o efetuada com sucesso!";
        }else{
            echo "N�o foi poss�vel efetuar a exclus�o. ".ERROSISTEMA;
        }
        mysql_close($resultado);
    }
    
}
