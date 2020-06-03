<?php 
/**
 * Cria o hash da senha, usando MD5 e SHA-1
 */
function make_hash($str)
{
    return sha1(md5($str));
}

/**
 * Verifica se o usuário está logado
 */
 
function isLoggedIn()
{
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)
    {
        return false;
    }
 
    return true;
}


function getmarca($conn, $cmarca, $categ, $luser){
   
    if(empty($cmarca)){
       $cmarca = 'a Definir';
    }
    
    
   $csql = $conn->prepare("SELECT                  ".
                          "   cod_marca,           ".
                          "   descr_marca          ".
                          "FROM                    ".
                          "   tbl_marcas           ".
                          "WHERE                   ".           
                          "   descr_marca like :marca ".
                          "   and cod_categ = :cat ");
   
   $csql->bindValue(":marca", '%'.$cmarca.'%', PDO::PARAM_STR);
   $csql->bindParam(":cat", $categ, PDO::PARAM_STR);
   $csql->execute();
   $areg = $csql->fetchAll(); 
   
   if(count($areg)==0){
       if(!$luser){
       
         $csql = $conn->prepare('SELECT nrecno FROM tbl_numerador where nm_tabela = "tbl_marcas"');
         $csql->execute();
         $areg = $csql->fetchAll();
      
         foreach ($areg as $row) {      
            $nreg = $row['nrecno'];
         }   
      
         $csql = $conn->prepare('UPDATE tbl_numerador set nrecno = '. ($nreg+1). ' where nm_tabela = "tbl_marcas"');
         $csql->execute();
         
         $csql = $conn->prepare("INSERT into tbl_marcas (`cod_marca`, `descr_marca`, `cod_categ`) values('$nreg','$cmarca','$categ')");
         $csql->execute();
       }   
   }    
   else{
      foreach ($areg as $row) {       
         $nreg = $row['cod_marca']; 
      }   
   }
  
    Return $nreg;    
}


function ajchar($str, $lupper){

    // matriz de entrada
    $what = array( 'ä','ã','à','á','â','ê','ë','è','é','ï','ì','í','ö','õ','ò','ó','ô','ü','ù','ú','û','À','Á','É','Í','Ó','Ú','ñ','Ñ','ç','Ç','(',')',',',';',':','|','!','"','#','$','%','&','/','=','?','~','^','>','<','ª','º' );

    // matriz de saída
    $by   = array( 'a','a','a','a','a','e','e','e','e','i','i','i','o','o','o','o','o','u','u','u','u','A','A','E','I','O','U','n','n','c','C','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_' );

    // devolver a string
    
   // $string = str_replace($what, $by, $str);
   $string =  $str;
    If(lupper){
       $string = ucfirst($string);
    }
    
    return $string;
}


?>