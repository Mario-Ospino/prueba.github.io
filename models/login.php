<?php
require_once('services.php');


function loginApp(){
    define('URLLOGIN','https://develop.datacrm.la/datacrm/pruebatecnica/webservice.php');
    $accesskey = md5Encode();
    $data_post = http_build_query(
        array(
            'operation' => 'login',
            'username' => 'prueba',
            'accessKey' => $accesskey
        )
    );
    $options = array('http'=>
        array(
          'method'=>"POST",
          'header'=>"Content-Type: application/x-www-form-urlencoded ",
          'content' => $data_post
        )
      );
      $context = stream_context_create($options);
      $response = file_get_contents(URLLOGIN,false, $context);


      $sessionName = substr($response,41,-62); 
      //echo "respuesta login - $response";
      return $sessionName;
}