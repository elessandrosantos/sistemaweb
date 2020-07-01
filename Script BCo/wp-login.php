<?php



logMsgWSServ( "iniciando wp_login não sei pq" ,'wplogin','recebido' );

function logMsgWSServ($msg, $fileparam, $level = 'info', $carq = 'Arquivo a ser exibido')
{
    // variável que vai armazenar o nível do log (INFO, WARNING ou ERROR)
    
      // data atual
    $date = date( 'Y-m-d H:i:s' );
    
   $datearq = date( 'dH' );
    
    $levelStr = '';
    if (empty($fileparam)){
       $file = 'logws.log';
    }else{
       $file = $fileparam.$datearq.".log"  ;
    }
        
 
    // verifica o nível do log
    switch ( $level )
    {
        case 'info':
            // nível de informação
            $levelStr = 'INFO';
            break;
 
        case 'warning':
            // nível de aviso
            $levelStr = 'WARNING';
            break;
 
        case 'error':
            // nível de erro
            $levelStr = 'ERROR';
            break;
    }
 
  
 
    // formata a mensagem do log
    // 1o: data atual
    // 2o: nível da mensagem (INFO, WARNING ou ERROR)
    // 3o: a mensagem propriamente dita
    // 4o: uma quebra de linha
    $msgnew = sprintf( "[%s] [%s]: %s%s%s", $date, $levelStr, $msg, $carq, PHP_EOL );
        
    // escreve o log no arquivo
    // é necessário usar FILE_APPEND para que a mensagem seja escrita no final do arquivo, preservando o conteúdo antigo do arquivo
    file_put_contents( $file, $msgnew, FILE_APPEND );
}