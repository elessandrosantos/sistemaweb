<?php

session_start();

$_SESSION['pastaapp'] = "";
$route = filter_input(INPUT_SERVER, 'REQUEST_URI') ;

$pos = strpos($route, '/', 1);
if($pos > 0){
   $cpasta = substr( $route , 0 , $pos );
}else{
    $cpasta = "";    
}   
$_SESSION['pastaapp'] = $_SERVER['DOCUMENT_ROOT'].$cpasta;

//$_SESSION['pastaapp'] = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT').$cpasta;

?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>ERP Cloud</title>


        <link rel="stylesheet" type="text/css" href="_css/menu.css"/>    
        <!--<link rel="stylesheet" type="text/css" href="_css\pedido.css"/>-->
        <script src="_js/jquery-351.js" type="text/javascript"></script>

        <script src="_js/menu.js" type="text/javascript"></script>
        <script src="_js/dragdrop.js" type="text/javascript"></script>
        <script src="_js/funcoes.js" type="text/javascript"></script>

        <!-- Bootstrap CSS CDN v-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/sketchy/bootstrap.min.css"> -->
        <!-- Our Custom CSS -->
        <!--<link rel="stylesheet" href="style.css">-->

        <!-- Font Awesome JS 
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>    
        -->

    </head>
    <!--<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> -->
        <body>

            <div class="wrapper" id="menu">
                <!-- Sidebar  -->
                <nav id="sidebar">
                    <div class="sidebar-header">
                        <a href="index.php"> <h3> Sistema </h3></a>
                    </div>
                    <div id="itemmenu">
                        <ul class="list-unstyled components">
                            <p>ERP - Menu </p>
                            <li class="active">
                                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Cadastros</a>
                                <ul class="collapse list-unstyled" id="homeSubmenu">
                                    <?php include("menucadastro.php"); ?>
                                    <!--
                                    <li>
                                        <a href="menu.php?p=dlglistcli" target="_parent"> Clientes</a>
                                    </li>
                                    <li>
                                        <a href="menu.php?p=dlglistprod" target="_parent">Produtos</a>
                                    </li>
                                    <li>
                                        <a href="menu.php?p=dlglistserv" target="_parent">Serviços</a>
                                    </li>
                                    -->
                                </ul>
                            </li>                
                            <li>
                                <div class="dropdown-divider"></div>                            
                            </li>

                            <li>
                                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Operação</a>
                                <ul class="collapse list-unstyled" id="pageSubmenu">
                                    <li>
                                        <?php include("menuoperacaocompra.php"); ?>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>                            
                                    </li>
                                    <li>
                                        <?php include("menuoperacaovenda.php"); ?>
                                    </li>       
                                    <li>
                                        <div class="dropdown-divider"></div>                            
                                    </li>
                                    <li>
                                        <a href="#">Estoque</a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>                            
                                    </li>

                                    <li>
                                        <?php include("menufinanceiropagar.php"); ?>


                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>                            
                                    </li>

                                    <li>
                                        <a href="#">Contabil</a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>                            
                                    </li>

                                    <li>
                                        <a href="#">Fiscal</a>
                                    </li>                        


                                </ul>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>                            
                            </li>

                            <li>
                                <a href="#">Configurações</a>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>                            
                            </li>

                            <li>
                                <a href="#">Sobre</a>
                            </li>

                        </ul>
                    </div>

                    <!--
                                <ul class="list-unstyled CTAs">
                                    <li>
                                        <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
                                    </li>
                                    <li>
                                        <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
                                    </li>
                                </ul>
                    -->
                </nav>

                <!-- Page Content  -->
                <div id="content">

                    <nav class="navbar navbar-expand-lg navbar-light bg-light" >
                        <div class="container-fluid">
 <!--id="menu_favoritos" ondrop="drop_handler(event);" ondragover="dragover_handler(event);"-->
                            <button type="button" id="sidebarCollapse" class="btn btn-info">
                                <i class="fas fa-align-left"></i>
                                <span>Recolher</span>
                            </button>
                            <div class="btn btn-default" ondrop="drop_handler(event);" ondragover="dragover_handler(event);">
                                <input id="menu_trash" type=image src="images/trash.jpg" width="45" height="30" hidden> <!--hidden="FALSE"> -->
                            </div>    
                            
                            
 <!--
                            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fas fa-align-justify"></i>
                            </button> 
-->
                            <?php echo include("buscamenuatalho.php"); ?>


                            <!--
                                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                                    <ul class="nav navbar-nav ml-auto">
                                                        <li class="nav-item active">
                                                            <a class="nav-link" href="#">Page</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="#">Page</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="#">Page</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="#">Page</a>
                                                        </li>
                                                    </ul>
                                                </div>
                            -->
                        </div>
                    </nav>

                    <?php
                    $vlrpag = @$_GET['p'];
                    $vlrparam = @$_GET['id'];
                    if (!empty($vlrpag)) {
                        require 'opcaomenu.php';
                        $telaopen = opcaomenu($vlrpag, $vlrparam);
                        require_once $telaopen;
                    }

                    // require_once'lista_dbm_cias.php';}; //{ require_once'dbm_cias.php';}; 
                    // if ($vlrpag == "dlgcli")  { require_once'dbm_cias.php';}; 
                    // if ($vlrpag == "dlglistprod"){ require_once'cadprodutos.php';}; 
                    // if ($vlrpag == "dlglistserv"){ require_once'cadservicos.php';}; 
                    ?>

                    <!--
                    <h2>Collapsible Sidebar Using Bootstrap 4</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        
                    <div class="line"></div>
        
                    <h2>Lorem Ipsum Dolor</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        
                    <div class="line"></div>
        
                    <h2>Lorem Ipsum Dolor</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        
                    <div class="line"></div>
        
                    <h3>Lorem Ipsum Dolor</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    -->
                </div>
            </div> 

            <!-- jQuery CDN - Slim version (=without AJAX) 
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <!-- Popper.JS -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
            <!-- Bootstrap JS -->
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

            <script type="text/javascript">
                $(document).ready(function () {
                    $('#sidebarCollapse').on('click', function () {
                        $('#sidebar').toggleClass('active');
                    });
                });
            </script>
        </body>    
</html>
