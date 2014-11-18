<?php

/* 
 * Módulo Controller
 */

require_once '../interface/paisid.php';

class pais implements paisid{
    
    private $idPais;
    private $nomeMae;
    private $nomePai;
    private $dataCadastro;
    private $dataAlteracao;
    
    public function setIdPais($idPais){
        $this->idPais = $idPais;
    }
    public function setNomeMae($nomeMae){
        $this->nomeMae = $nomeMae;
    }
    public function setNomePai($nomePai){
        $this->nomePai = $nomePai;
    }
    public function setDataCadastro($dataCadastro){
        $this->dataCadastro = $dataCadastro;
    }
    public function setDataAlteracao($dataAlteracao){
        $this->dataAlteracao = $dataAlteracao;
    }    
    public function cadastraPais(){
        $verificaUltimoRegistro = "SELECT MAX(idPais) as idPais FROM pais";
        $resultadoVerificacao = mysql_query($verificaUltimoRegistro) or die ("Não foi realizada a consulta pelo id dos Pais. Verifique sob o erro: ".mysql_error());
        
        if ($resultadoVerificacao){
            $linhaVerificacao = mysql_fetch_array($resultadoVerificacao);
            $this->idPais = $linhaVerificacao['idPais'] + 1;
        }
        $sql = "INSERT INTO pais (idPais, nomeMae, nomePai, dataCadastro, dataAlteracao) 
                VALUES (".$this->idPais.", '".$this->nomeMae."', '".$this->nomePai."', '".$this->dataCadastro."', '".$this->dataAlteracao."')";
        $resultado = mysql_query($sql) or die ("Problemas ao inserir os pais. Verifique sob o erro: ".mysql_error());
        
        if ($resultado){
            echo "Pais inserido com sucesso!";
        }else{
            echo "Houve algum problema ao inserir. ".ERROSISTEMA;
        }
        mysql_close($resultadoVerificacao);
        mysql_close($resultado);
    }
    public function atualizaPais(){
        $sql = "UPDATE pais SET nomeMae = '".$this->nomeMae."', nomePai = '".$this->nomePai."', dataAlteracao = '".$this->dataAlteracao."' WHERE idPais = ".$this->idPais;
        $resultado = mysql_query($sql) or die ("Problemas na atualização. Verifique sob o erro: ".mysql_error());
        
        if ($resultado){
            echo "Dados atualizados com sucesso!";
        }else{
            echo "Houve algum problema ao atualizar. ".ERROSISTEMA;
        }
        mysql_close($resultado);
        
    }
    public function excluiPais(){
        $sql = "DELETE FROM pais WHERE idPais = ".$this->idPais;
        $resultado = mysql_query($sql) or die ("Não foi possível excluir. Verifique sob o erro: ".mysql_error());
        
        if ($resultado){
            echo "Excluído com sucesso!";
        }else{
            echo "Houve algum problema ao excluir. ".ERROSISTEMA;
        }
        mysql_close($resultado);
        
    }
    public function consultaPais(){
        $sql = "SELECT * FROM pais";
        $resultado = mysql_query($sql) or die ("Não foi possível consultar os pais. Verifique sob o erro: ".mysql_error());
        if ($resultado >= 1){
            //informe a tabela.
        }else{
            echo "Não há informações sobre os pais.";
        }
        mysql_close($resultado);
    }
}