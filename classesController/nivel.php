<?php

require_once '../interface/nivelid.php';

class nivel implements nivelid{
    
    private $idNivel;
    private $nomeNivel;
    
    public function getIdNivel() {
        return $this->idNivel;
    }

    public function getNomeNivel() {
        return $this->nomeNivel;
    }

    public function setIdNivel($idNivel) {
        $this->idNivel = $idNivel;
    }

    public function setNomeNivel($nomeNivel) {
        $this->nomeNivel = $nomeNivel;
    }

    public function cadastraNivel() {
        
    }
    public function atualizaNivel() {
        
    }
    public function consultaNivel() {
        
    }
    public function excluiNivel() {
        
    }
    
}
