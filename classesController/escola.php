<?php

/* 
 * Módulo Controller
 */

require_once '../interface/escolaid.php';

class escola implements escolaid{
    
    private $idEscola;
    private $nomeEscola;
    private $dataCadastro;
    private $dataAlteracao;
    
    public function setIdEscola($idEscola){
        $this->idEscola = $idEscola;
    }
    public function setNomeEscola($nomeEscola){
        $this->nomeEscola = $nomeEscola;
    }
    public function setDataCadastro($dataCadastro){
        $this->dataCadastro = $dataCadastro;
    }
    public function setDataAlteracao($dataAlteracao){
        $this->dataAlteracao = $dataAlteracao;
    }    
    
    public function cadastraEscola(){
        
    }
    public function atualizaEscola(){
        
    }
    public function excluiEscola(){
        
    }
    public function consultaEscola(){
        
    }
    
}