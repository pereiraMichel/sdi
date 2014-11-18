<?php

/* 
 * Módulo Controller
 */

require_once '../interface/historicoid.php';

class historico implements historicoid{
    
    private $idHistorico;
    private $historico;
    private $dataHistorico;
    private $dataAlteracao;
    
    public function setIdHistorico($idHistorico){
        $this->idHistorico = $idHistorico;
    }
    public function setHistorico($historico){
        $this->historico = $historico;
    }
    public function setDataHistorico($dataHistorico){
        $this->dataHistorico = $dataHistorico;
    }
    public function setDataAlteracao($dataAlteracao){
        $this->dataAlteracao = $dataAlteracao;
    }
    
    public function cadastraHistorico(){
        
    }
    public function atualizaHistorico(){
        
    }
    public function excluiHistorico() {
        
    }
    public function consultaHistorico(){
        
    }
    
}