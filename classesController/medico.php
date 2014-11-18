<?php

/* 
 * Módulo Controller
 */

require_once '../interface/medicoid.php';

class medico implements medicoid{
    
    private $idMedico;
    private $nomeMedico;
    private $dataCadastro;
    private $dataAlteracao;
    
    public function setIdMedico($idMedico){
        $this->idMedico = $idMedico;
    }
    public function setNomeMedico($nomeMedico){
        $this->nomeMedico = $nomeMedico;
    }
    public function setDataCadastro($dataCadastro){
        $this->dataCadastro = $dataCadastro;
    }
    public function setDataAlteracao($dataAlteracao){
        $this->dataAlteracao = $dataAlteracao;
    }
    
    public function cadastraMedico(){
        
    }
    public function atualizaMedico(){
        
    }
    public function excluiMedico(){
        
    }
    public function consultaMedico(){
        
    }
}