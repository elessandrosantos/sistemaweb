<?php
session_start();

function opcaomenu($cmenu, $cparam) {
    
    if ($cmenu == "dlgpesqservicos") {
        $ctela = 'pesqservicos.php';
    }
    if ($cmenu == "dlgservicos") {
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

    if ($cmenu == "dlgpedvendaservicos") {
        $ctela = 'pedidovendaservicos.php';
    }

    if ($cmenu == "dlgpedvendaprodutos") {
        $ctela = 'pedidovendaprodutos.php';
    }
    
    if ($cmenu == "dlgaltcliente") {    
        $_SESSION['param'] = $cparam;
        $ctela = 'atualizaclientes.php';
    }
    return $ctela;
}

?>