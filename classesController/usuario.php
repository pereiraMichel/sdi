<?php

require_once '../interface/usuarioid.php';

class usuario implements usuarioid{

    private $idUsuario;
    private $nome;
    private $senha;
    private $dataCadastro;
    private $dataAlteracao;
    private $codTipo;
    private $codNivel;
    private $codStatus;
    
    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    public function setDataAlteracao($dataAlteracao) {
        $this->dataAlteracao = $dataAlteracao;
    }

    public function setCodTipo($codTipo) {
        $this->codTipo = $codTipo;
    }

    public function setCodNivel($codNivel) {
        $this->codNivel = $codNivel;
    }

    public function setCodStatus($codStatus) {
        $this->codStatus = $codStatus;
    }

    public function cadastraUsuario() {
        $verificaUltimoRegistro = "SELECT MAX(idUsuario) as idUsuario FROM usuario";
        $resultadoVerificacao = mysql_query($verificaUltimoRegistro) or die ("Não foi realizada a consulta pelo id do usuário. Verifique sob o erro: ".mysql_error());
        
        if ($resultadoVerificacao){
            $linhaVerificacao = mysql_fetch_array($resultadoVerificacao);
            $this->idUsuario = $linhaVerificacao['idUsuario'] + 1;
        }
        
        $sql = "INSERT INTO usuario (idUsuario, nome, senha, dataCadastro, dataAlteracao, codTipo, codNivel, codStatus) VALUES (".$this->idUsuario.", '".$this->nome."', '".$this->senha."', '".$this->dataCadastro."', '".$this->dataAlteracao."', ".$this->codTipo.", ".$this->codNivel.", ".$this->codStatus.")";
        $resultado = mysql_query($sql) or die ("Problemas ao inserir. Verificar sob o erro: ".mysql_error());
        
        if ($resultado){
            echo "Usuário inserido com sucesso!";
        }else{
            echo "Usuário não inserido. ".ERROSISTEMA;
        }
        
        mysql_close($resultadoVerificacao);
        mysql_close($resultado);
        
    }
    public function alteraUsuario() {
        $sql = "UPDATE usuario SET nome = '".$this->nome."', senha='".$this->senha."', dataAlteracao = '".$this->dataAlteracao."', codTipo = ".$this->codTipo.", codNivel = ".$this->codNivel.", codStatus = ".$this->codTipo." WHERE idUsuario = ".$this->idUsuario;
        
        $resultado = mysql_query($sql) or die("Não foi possível realizar a alteração. Verifique sob o erro: ".mysql_error());
        if ($resultado){
            echo "Alteração efetuada com sucesso!";
        }else{
            echo "Problemas na alteração. ".ERROSISTEMA;
        }
        mysql_close($resultado);
        
    }
    public function consultaUsuario() {
        $sql = "SELECT * FROM usuario";
        $resultado = mysql_query($sql) or die ("Problemas na consulta. Verifique sob o erro: ".mysql_error());
        
        if ($resultado >= 1){
            //Chamar a tabela.
        }else{
            echo "Não contém registros de usuário.";
        }
        mysql_close($resultado);
    }
    public function excluiUsuario() {
        $sql = "DELETE FROM usuario WHERE idUsuario = ".$this->idUsuario;
        $resultado = mysql_query($sql) or die ("Não foi possível excluir o usuário. Verifique sob o erro: ".mysql_error());
        if ($resultado){
            echo "Usuário excluído com sucesso!";
        }else{
            echo "Usuário não foi excluído. ".ERROSISTEMA;
        }
        mysql_close($resultado);
        
    }
}
