<?php
//session_start();

function opcaomenu($cmenu, $cparam) {
    
    if ($cmenu == "dlgpesqservicos") {
        $ctela = 'pesqservicos.php';
    }
    if ($cmenu == "dlgservicos") {
        $_SESSION['param'] = $cparam;
        $ctela = 'servicos.php';
    }
    if ($cmenu == "dlgpesqprodutos") {
        $ctela = 'pesqprodutos.php';
    }
    if ($cmenu == "dlgprodutos") {
        $ctela = 'produtos.php';
    }
    if ($cmenu == "dlgpesqclientes") {
        $ctela = 'pesqclientes.php';
    }
    if ($cmenu == "dlgclientes") {
        $ctela = 'clientes.php';
    }

    if ($cmenu == "dlgpesqpedvendaservico"){
        $ctela = 'pesqpedvendaservico.php';
    }
    
    if ($cmenu == "dlgpesqpedvendaproduto"){
        $ctela = 'pesqpedvendaproduto.php';
    }
    
    if ($cmenu == "dlgpedvendaservicos") {
        
        $_SESSION['npedido'] =  $cparam;        
        $ctela = 'pedidovendaservicos.php';
    }

    if ($cmenu == "dlgpedvendaprodutos") {
        $_SESSION['npedido'] =  $cparam;
        $ctela = 'pedidovendaprodutos.php';
    }
    
    if ($cmenu == "dlgaltcliente") {    
        $_SESSION['param'] = $cparam;
        $ctela = 'atualizaclientes.php';
    }
    
    if ($cmenu == "dlgitenspedserv") {    
        $_SESSION['param'] = $cparam;
        $ctela = 'itenspedservico.php';
    }
    
    if (empty($ctela)){
       $ctela = 'empty.php';
    }
    
    return $ctela;
}