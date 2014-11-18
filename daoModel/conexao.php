<?php

/*
 * Módulo Model - Conexão Banco de Dados
 */

/**
 * @author Michel Pereira
 */
class conexao {
    private $host;
    private $usuario;
    private $senha;
    private $database;
    private $sql;

    function __construct() {
        $this->host = "localhost";
        $this->usuario = "root";
        $this->senha = "m1ch3l";
        $this->database = "bdsdi";
//        $this->usuario = "root";
//        $this->senha = "senha";
//        $this->database = "bdSistema";
    }
    
    function set($propriedade, $valor){
        $this->$propriedade = $valor;
    }
    
    function conectar(){
        $conexao = mysql_connect($this->host, $this->usuario, $this->senha) or die ($this->mensagemErro(mysql_error()));
        return $conexao;
    }
    function selectDB(){
        $banco = mysql_select_db($this->database) or die ($this->mensagemErro(mysql_error()));
        if ($banco){
            return true;
        }else{
            return false;
        }
    }
    function desconectar($valor){
        return mysql_close($valor);
    }
    function executaQuery(){
        $query = mysql_query($this->sql) or die ($this->mensagemErroQuery(mysql_error()));
        return $query;
    }
    function mensagemErro($erro){
        echo "Não foi possível conectar ao banco de dados. Consulte sob o erro: ".$erro;
    }
    function mensagemErroQuery($erro){
        echo "Não foi possível efetuar a transação. Consulta sob o erro: ".$erro;
    }
}
