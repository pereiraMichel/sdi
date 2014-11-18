<?php

/* 
 * Módulo Controller - Disciplina
 */
require_once '../interface/disciplinaid.php';

class disciplina extends nota implements disciplinaid{
    
    private $idDisciplina;
    private $disciplina;
    
    public function setIdDisciplina($idDisciplina){
        $this->idDisciplina = $idDisciplina;
    }
    public function setDisciplina($disciplina){
        $this->disciplina = $disciplina;
    }
    
    public function cadastraDisciplina(){
        $sql = "INSERT INTO disciplina (idDisciplina, disciplina) VALUES (".$this->idDisciplina.", '".$this->disciplina."')";
        $resultado = mysql_query($sql) or die ("Não foi possível cadastrar a disciplina. Verifique sob o erro: ".mysql_error());
        
        if ($resultado){
            echo "Disciplina cadastrada com sucesso!";
        }else{
            echo "Não foi possível incluir. ".ERROSISTEMA;
        }
        mysql_close($resultado);
    }
    public function atualizaDisciplina(){
        
    }
    public function excluiDisciplina(){
        
    }
    public function consultaDisciplina(){
        
    }
    
}
