<?php

include $_SERVER['DOCUMENT_ROOT']."/_conexao/conexao.php"; 

$cRetMenu = "";

$user = 'edsantos';

$con = conectar();

$sql = $con->prepare('SELECT            '.
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
    
   // $stmt = $con::close();
    
}

$cRetMenu .= '<div class="collapse navbar-collapse" id="navbarSupportedContent">'
            . '<ul class="nav navbar-nav ml-auto">';
            //.'<li class="nav-item active">';

foreach ($amenu as $row) {
    $cRetMenu .=  '<li class="nav-item active">'
                  .' <a class="btn btn-primary btn-sm" href="' . $row['link'] .'">'.$row['descr'] .'</a> '
                  .'</li>';
    //$cRetMenu .= '<a class="btn btn-primary btn-sm" draggable="true" href="' . $row['link'] .'" target="_parent">'. $row['descr'] .'</a> </br>';
}


$cRetMenu.= '</ul>'
           .'</div>';



//<li> <a draggable="true" href="index.php?p=dlgpesqservicos" target="_parent">Servicos</a> </li>
// <li> 
//<a draggable="true" href="index.php?p=dlgpesqprodutos" target="_parent">Produtos</a>
//</li>
// <li> 
//<a draggable="true" href="index.php?p=dlgpesqclientes" target="_parent">Clientes</a>
//</li>

Return $cRetMenu

?> 



