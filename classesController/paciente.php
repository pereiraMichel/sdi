<?php

/* 
 * Módulo Controller
 */

require_once '../interface/pacienteid.php';

class paciente implements pacienteid{
    
private $idPaciente;
private $nomePaciente;
private $dataNascimento;
private $peso;
private $altura;
private $dataCadastro;
private $dataAlteracao;
private $comportamento;
private $escola;
private $usuario;
private $pais;

public function setIdPaciente($idPaciente){
    $this->idPaciente = $idPaciente;
}
public function setNomePaciente($nomePaciente){
    $this->nomePaciente = $nomePaciente;
}
public function setDataNascimento($dataNascimento){
    $this->dataNascimento = $dataNascimento;
}
public function setPeso($peso){
    $this->peso = $peso;
}
public function setAltura($altura){
    $this->altura = $altura;
}
public function setDataCadastro($dataCadastro){
    $this->dataCadastro = $dataCadastro;
}
public function setDataAlteracao($dataAlteracao){
    $this->dataAlteracao = $dataAlteracao;
}
public function setComportamento($comportamento) {
    $this->comportamento = $comportamento;
}

public function setEscola($escola) {
    $this->escola = $escola;
}

public function setUsuario($usuario) {
    $this->usuario = $usuario;
}

public function setPais($pais) {
    $this->pais = $pais;
}

public function cadastraPaciente(){
        $verificaUltimoRegistro = "SELECT MAX(idPaciente) as idPaciente FROM paciente";
        $resultadoVerificacao = mysql_query($verificaUltimoRegistro) or die ("Não foi realizada a consulta pelo id dos Pais. Verifique sob o erro: ".mysql_error());
        
        if ($resultadoVerificacao){
            $linhaVerificacao = mysql_fetch_array($resultadoVerificacao);
            $this->idPaciente = $linhaVerificacao['idPaciente'] + 1;
        }
        $sql = "INSERT INTO paciente (idPaciente, nome, dataNascimento, peso, tamanho, dataCadastro, dataAlteracao, idComportamento, idEscola, idUsuario, idPais) VALUES (".$this->idPaciente.", '".$this->nomePaciente."', '".$this->dataNascimento."', ".$this->peso.", ".$this->altura.", '".$this->dataCadastro."', '$this->dataCadastro', ".$this->comportamento.", ".$this->escola.", ".$this->usuario.", ".$this->pais.")";
        $resultado = mysql_query($sql) or die ("Houve um problema ao inserir o paciente. Verifique sob o erro: ".mysql_error());
        
        if($resultado){
            echo "Paciente inserido com sucesso!";
        }else{
            echo "Houve um problema ao inserir. ".ERROSISTEMA;
        }
        mysql_close($resultadoVerificacao);
        mysql_close($resultado);
}
public function atualizaPaciente(){
        $sql = "UPDATE paciente SET nome = '".$this->nomePaciente."', dataNascimento = '".$this->dataNascimento."', peso = ".$this->peso.", tamanho = ".$this->altura.", dataAlteracao = '".$this->dataAlteracao."', idComportamento = ".$this->comportamento.", idEscola = ".$this->escola.", idUsuario = ".$this->usuario.", idPais = ".$this->pais." WHERE idPaciente = ".$this->idPaciente;
        $resultado = mysql_query($sql) or die ("Problemas na atualização. Verifique sob o erro: ".mysql_error());
        
        if ($resultado){
            echo "Paciente atualizado com sucesso!";
        }else{
            echo "Houve algum problema ao atualizar. ".ERROSISTEMA;
        }
        mysql_close($resultado);
    
}
public function excluiPaciente(){
        $sql = "DELETE FROM paciente WHERE idPaciente = ".$this->idPaciente;
        $resultado = mysql_query($sql) or die ("Não foi possível excluir. Verifique sob o erro: ".mysql_error());
        
        if ($resultado){
            echo "Excluído com sucesso!";
        }else{
            echo "Houve algum problema ao excluir. ".ERROSISTEMA;
        }
        mysql_close($resultado);    
}
public function consultaPaciente(){
        $sql = "SELECT * FROM paciente";
        $resultado = mysql_query($sql) or die ("Não foi possível consultar os pacientes. Verifique sob o erro: ".mysql_error());
        if ($resultado >= 1){
            //informe a tabela.
        }else{
            echo "Não há informações sobre pacientes.";
            mysql_close($resultado);    
        }
}
        
}
