<?php

/*
 * M�dulo Controller - Notas
 */

/**
 * Description of nota
 *
 * @author Michel Pereira
 */

require_once '../interface/notaid.php';

abstract class nota implements notaid{
    
    private $idNota;
    private $nota;
    
    public function setIdNota($idNota){
        $this->idNota = $idNota;
    }
    public function setNota($nota){
        $this->nota = $nota;
    }
    
    public function cadastraNota(){
        $verificaUltimoRegistro = "SELECT MAX(idNota) as idNota FROM nota";
        $resultadoVerificacao = mysql_query($verificaUltimoRegistro) or die ("N�o foi realizada a consulta de notas. Verifique sob o erro: ".mysql_error());
        
        if ($resultadoVerificacao){
            $linhaVerificacao = mysql_fetch_array($resultadoVerificacao);
            $this->idNota = $linhaVerificacao['idNota'] + 1;
        }
        $sql = "INSERT INTO nota (idNota, nota) VALUES (".$this->idNota.", '".$this->nota."')";
        $resultado = mysql_query($sql) or die ("Houve um problema ao inserir a nota. Verifique sob o erro: ".mysql_error());
        
        if ($resultado){
            echo "Nota inserida com sucesso!";
        }else{
            echo "Houve um problema. ".ERROSISTEMA;
        }
        mysql_close($resultadoVerificacao);
        mysql_close($resultado);
    }
    public function atualizaNota(){
        $sql = "UPDATE nota SET nome = '".$this->nota."' WHERE idNota = ".$this->idNota;
        $resultado = mysql_query($sql) or die ("N�o foi poss�vel efetuar a atualiza��o. Verifique sob o erro: ".mysql_error());
        
        if ($resultado){
            echo "Atualiza��o efetuada com sucesso!";
        }else{
            echo "N�o foi poss�vel efetuar a atualiza��o. ".ERROSISTEMA;
        }
        mysql_close($resultado);
    }
    public function excluiNota(){
        $sql = "DELETE FROM nota WHERE idNota = ".$this->idNota;
        $resultado = mysql_query($sql) or die ("N�o foi poss�vel excluir a nota. Verifique sob o erro: ".mysql_error());
        
        if ($resultado){
            echo "Exclus�o efetuada com sucesso!";
        }else{
            echo "Houve um problema na exclus�o. ".ERROSISTEMA;
        }
        mysql_close($resultado);
    }
    public function consultaNota(){
        $sql = "SELECT * FROM nota";
        $resultado = mysql_query($sql) or die ("N�o foi poss�vel consultar as notas. Verifique sob o erro: ".mysql_error());
        
        if ($resultado){
            //Informe a tabela
        }else{
            echo "N�o consta informa��o das notas.";
            mysql_close($resultado);
        }
    }
    
    
}
