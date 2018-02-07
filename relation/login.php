<?php 
  session_start();
  function load($class){
    include('../backend/'. $class .".php");
  }
  load('IOhander');
  
  $IO = new IOhandler;

  $email = trim($_POST['email']);
  $password = trim($_POST['password']);


  $fields = array('email', 'password');

  $error = false; 
  foreach($fields AS $fieldname) { 
    if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
      echo 'Field '.$fieldname.' missing!<br />';
      $error = true; //Yup there are errors
    }
  }


  $isExist = $IO->logincheck($email);
  if ($isExist) {
    $user = $IO->getOne("SELECT * FROM users WHERE email = '$email'");
    $passgot = $user['password'];

    $verify = password_verify($password, $passgot);
    if(!$error) {
       if ($verify) {
           $_SESSION['userid'] = $user['id'];
           $_SESSION['user'] = $user;
           echo "ok";
          } else {
              echo "incorrect password";
               //header("Location: ../signin.php");
          }
      }else{echo "please filling in all inputs";}
  }else{
    echo "user doest exist please go and register";
  }
?>
