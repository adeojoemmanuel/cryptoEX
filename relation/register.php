<?php
function load($class){
    include($class .".php");
  }
  load('IOhander');
  
  $class = new IOhandler;
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  $email = trim($_POST['email']);
  $realpassword = password_hash($password, PASSWORD_BCRYPT);

  $values = array($username, $realpassword, $email);
  $fields = array('username', 'password', 'email');

  $register = $class->insert('users', $fields, $values);
  if($register == 'true'){
 	echo "success";
  }else{
  	echo "notsuccess";
  }
?>