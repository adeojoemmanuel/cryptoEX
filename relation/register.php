<?php
  function load($class){
    include('../backend/'. $class .".php");
  }
  load('IOhander');
  
  $class = new IOhandler;
  $firstname = trim($_POST['firstname']);
  $lastname = trim($_POST['lastname']);
  $email = trim($_POST['email']);
  $username = trim($_POST['firstname']) . '.' . trim($_POST['lastname']);
  $password = trim($_POST['password']);
  $repassword = trim($_POST['repassword']);

  function random_char($char){
      // where char stands for the string u want to randomize
      $char_length = 15;
      $cl = strlen($char);
      $randomize = '';
      for($i = 0; $i < $char_length; $i++ ){
        $randomize .= $char[rand(0, $cl - 1)]; 
      }
      return $randomize;
    }

    function send_welcome($to, $username, $code){
        $sender = "Cryptoex <noreply@cryptoex.com>";

        $subject = "Welcome to Crypto-Ex account activation";
            
            // To send HTML mail, the Content-type header must be set
            //headers
        $headers = 'From: '.$sender.'' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            
        $msg = "";
        $msg .= '<html><body>';
        $msg .= "<div style='background:white; box-shadow: 1px 5px 18px 0px rgba(0,0,0,0.1); padding: 2%; width: 40vw; margin-left: 20%;text-align: center;display: absolute; margin-top: 10%;'>\n";

        $msg .= "<h5>Hi ". $username ."!</h5>\n\n";
        // $msg .= $to; 
        $msg .= "You account was successfully created!\n";
        $msg .= "But just one more thing...\n";
        $msg .= "You need to activate your account by verifying your email.\n";
        $msg .= "Please click the link below to verify your email: \n";
        $msg .= "<div style='background:cornflowerblue;padding:1.5%; color: white; max-width: 60%;text-align: center;margin:1em; margin-left: 20%;border-radius: 2px;'>";

        $msg .= "<a href='http://localhost/cryptoEX/AccountActivation?action=activate&code=" . $code ."&email=" .$to. "' style='color: white;'>Click here to verify your email</a>";
        $msg .= '</div></div>';
        $msg .= '</body></html>'; 
        $send_mail = mail($to, $subject, $msg, $headers);


        $send_mail = true;

        if($send_mail){
          return true;
        }else {
          return false;
      }
    }

  

  $verisymail = $class->usernameCheck($email);
  $random = sha1(md5(random_char('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')));
  $isactive = '0';
  $disabled = '0';
  $realpassword = password_hash($password, PASSWORD_BCRYPT);

  $values = array($username, $realpassword, $email, $random, $isactive, $disabled);
  $fields = array('username', 'password', 'email', 'activationKey', 'isactive', 'disabled');

  $register = $class->insert('users', $fields, $values);
  if($verisymail == "notexist"){
    if($register == 'true'){
      send_welcome($email, $username, $random);
   	  echo "success";
    }else{
    	echo "notsuccess";
    }
  }else{
    echo "email already exist, please try another mail";
  }
?>