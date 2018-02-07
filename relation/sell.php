<?php
function load($class){
    include($class .".php");
  }
  load('IOhander');
  
  $class = new IOhandler;
  $SellerID = sessionId();
  $amount = trim($_POST['amount']);
  $email = trim($_POST['email']);
  $date = date("Y-m-d h:i:sa");
  $sold = '0';
  
  $values = array($sessionId, $amount, $sold, $date);
  $fields = array('SellerID', 'amount', 'sold', 'date');

  $sell = $class->insert('users', $fields, $values);
  if($sell == 'true'){
 	echo "success";
  }else{
  	echo "notsuccess";
  }
?>