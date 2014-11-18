<?php

class telaView{

/*
 * Módulo View - Login e Principal
 */

    public function telaLogin(){
        echo "<div class='container'>";
        echo "   <form class='form-signin' name='formlogin' action='valida/validaUsuario.php' enctype='multipart/form-data' method='post'>";
        echo "       <h3 class='form-signin-heading'>Acesso ao Sistema</h3>";
        echo "           <input type='text' class='input-block-level' placeholder='Login' name='usuario' required/>";
        echo "           <input type='password' class='input-block-level' placeholder='Senha'name='senha' required/>";
        echo "       <a href='#' class='label label-info'>Esqueci minha senha</a><br/>";
        echo "       <p style='height: 50px'></p>";
        echo "           <input type='submit' value='Entrar' class='btn' />";
        echo "   </form>";
        echo "</div>";    

    }

    public function telaPrincipal(){
        
    }
    
    public function autor(){
        echo "<hr>";
        echo "<table border='0' width='100%' cellpadding='0' cellspacing='0' style='caption-side: bottom; text-align: center'>";
        echo "  <tr>";
        echo "      <td>";
        echo "          <label class='label label-info'>".AUTOR."<br/>";
        echo "          </label>";
        echo "      </td>";
        echo "  </tr>";
        echo "</table>";
    }
    
    
}
