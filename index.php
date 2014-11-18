<!DOCTYPE html>
<!--
Módulo VIEW MASTER (PÁGINA PRINCIPAL)
-->
<?php
require_once 'constantes/constantes.php';
require_once 'view/telaView.php';

$tela = new telaView();
?>

<html>
    <head>
        <meta charset="ISO-8859-1">
        <title><?php echo TITULOSITE; ?></title>
        <link rel="stylesheet" href="css/estilo.min.css" type="text/css" />
        <link rel="stylesheet" href="css/estilo.responsive.css" type="text/css" />
        <link rel="stylesheet" href="css/estilo.css" type="text/css" />
        <link rel="stylesheet" href="css/estiloPersonal.css" type="text/css" />
        
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <img src="img/logoSDI.png" width="50" height="50" title="SDI - Sistema de Desempenho Infanto Juvenil" />
            </div>
        </div>        
        <?php
        echo "<div align='center'><img src='".LOGO."' width='400' height='200' align='center' /></div>";
        $tela->telaLogin();
        $tela->autor();
        ?>
    </body>
</html>
