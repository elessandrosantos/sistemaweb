<?php


include "php_config.php";

function getConfig( $configName )
{
    
    if((substr($_SERVER['DOCUMENT_ROOT'],0,1)=="C") || (substr($_SERVER['DOCUMENT_ROOT'],0,1)=="D")){
       $cPath      = substr($_SERVER['DOCUMENT_ROOT'],0, (strlen($_SERVER['DOCUMENT_ROOT'])-11)); 

    }
    else{
       $cPath      = substr($_SERVER['DOCUMENT_ROOT'],0, (strlen($_SERVER['DOCUMENT_ROOT'])-3));   
    }
    $configFile =  $cPath.'config.ini';
    $config = parse_ini_file( $configFile, true );

    list( $section, $param ) = explode( '.', $configName );

    if ( array_key_exists( $section, $config ) )
    {
       
        if ( array_key_exists( $param, $config[ $section ] ) )
        {
       
            return $config[ $section ][ $param ];
        }
    }      
    return null;
}
