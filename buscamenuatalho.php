<?php

include $_SERVER['DOCUMENT_ROOT']."/_conexao/conexao.php"; 

$cRetMenu = "";

$user = 'edsantos';

$con = conectar();

$ltemmenu = FALSE;

$sql = $con->prepare('SELECT           '.
                     '   regid,        '.  
                     '   cod_menu,     '.
                     '   descr,        '.
                     '   user,         '. 
                     '   str_img_menu, '.
                     '   sn_visivel,   '.
                     '   link          '.
                     'FROM             '.
                     '    menu_user    '.
                     'WHERE            '.
                     '   user  = :usr  ');


try {
    
   $sql->bindParam(":usr", $user, PDO::PARAM_STR);
   $sql->execute();  
   $amenu = $sql->fetchall(PDO::FETCH_ASSOC); 
                 
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
} finally {
    
   
    
}
//id="menu_favoritos" ondrop="drop_handler(event);" ondragover="dragover_handler(event);"
$cRetMenu .= '<div class="collapse navbar-collapse" id="menu_favoritos" ondrop="drop_handler(event);" ondragover="dragover_handler(event);">'
            . '<ul class="nav navbar-nav ml-auto">';            

foreach ($amenu as $row) {
    $cRetMenu .=  '<li class="nav-item active" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);">'
                  .' <a id='. $row['regid'] .' class="btn btn-primary btn-sm" href="' . $row['link'] .'">'.$row['descr'] .'</a> '
                  .'</li>';
   $ltemmenu = TRUE; 
    
}
    
if(!$ltemmenu){

    $cRetMenu .=  '<li class="nav-item active">'
                  .'<a> <h7> <- Area para favoritos! </h7></a> '
                  .'</li>';


    
}



$cRetMenu  .= '</ul>'
           .'</div>';


Return $cRetMenu

?> 



