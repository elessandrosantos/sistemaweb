<?php

//include ($_SESSION['pastaapp'].'/_include/functions.php');
            

// define valores padr�o para diretivas do php.ini
ini_set( 'error_reporting', -1 );
ini_set( 'display_errors', 0 ); // deve ser definida para zero (0) em ambiente de produ��o
 
// timezone
date_default_timezone_set( 'America/Sao_Paulo' );
 
// tempo m�ximo de execu��o de um script
set_time_limit( 60 );
 
?>