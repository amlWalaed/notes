<?php
$_SESSION=[];
$session = session_get_cookie_params();
// dd($session);
setcookie('PHPSESSID','',time()-3600,$session['path'],$session['domain']);
session_destroy();
header('location: /');
exit();