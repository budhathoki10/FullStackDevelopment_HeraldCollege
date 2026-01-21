<?php
session_set_cookie_params([
    'lifetime' => 86400,  #expire after 1 day             
    'path'     => '/',     #cookie valid for entire domain and if we set /dashboard the cookie will be set only for dashboard      
    'secure'   => true,     #cookie will not send if the request is in plane http      
    'httponly' => true,    #java script cannot read the cookie via document.cookie          
    'samesite' => 'Lax'   #cookie will not send in another site           
]);

session_start();
?>

