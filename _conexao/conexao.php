<?php

function conectar(){
   
   include_once $_SERVER['DOCUMENT_ROOT']."/init.php";
     
   if((substr($_SERVER['DOCUMENT_ROOT'],0,1)=="C") || (substr($_SERVER['DOCUMENT_ROOT'],0,1)=="D")){ 
      $cAmbiente = 'L';
      $Sql = FALSE;
    }
   else{
      $cAmbiente = 'W'; 
   
   }   
   // cAmbiente = L = Local
   // cAmbiente = W = Web
       
  if($cAmbiente == 'W'){
  
      $username = getConfig( 'dbsiserp.user' );
      $password = getConfig( 'dbsiserp.pass' );
      $hostname = getConfig( 'dbsiserp.host' );
      $dbname   = getConfig( 'dbsiserp.dbname' );          
   
      
  }
  else{
      if ($Sql){
         $driverdb = getConfig( 'dbSQLlocalsiserp.driver' );
         $username = getConfig( 'dbSQLlocalsiserp.user' );
         $password = getConfig( 'dbSQLlocalsiserp.pass' );
         $hostname = "Server=".getConfig( 'dbSQLlocalsiserp.host' );
         $dbname   = "Database=".getConfig( 'dbSQLlocalsiserp.dbname' );
         
         $stringconexao = $driverdb. ":". $hostname . ";" . $dbname.";";
         
      }else{
          
         $username = getConfig( 'dblocalsiserp.user' );
         $password = getConfig( 'dblocalsiserp.pass' );
         $hostname = getConfig( 'dblocalsiserp.host' );
         $dbname   = getConfig( 'dblocalsiserp.dbname' );

          
      }    
   
      
  } 
   
   try{
//   $conn = new PDO('mysql:host=portalcompras.mysql.uhserver.com;dbname=portalcompras', $username, $password,

   if($Sql){
      $conn = new PDO($stringconexao, $username, $password,
              array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));       
   }else{
   $conn = new PDO($hostname.$dbname, $username, $password,
           array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
   }
   } catch(PDOException $e){
   
      echo ("problema com a conexão, envie um email para o ADM pela <br/> opção contato, Agradecemos a compreenção.");
       echo $e->getMessage();
       var_dump($e);

   }

   return $conn;
} 

?>
