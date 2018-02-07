<?php 
  function load($class){
    include($class .".php");
  }
  load('IOhander');
  
  $class = new IOhandler;
  $username = trim($_POST['username'])
  $password = trim($_POST['password'])

  $login = $class->login($username, $password, 'users', 'username', 'id');
  if($login == 'ok'){
 	echo "success";
  }else{
  	echo "notsuccess";
  }
?>
