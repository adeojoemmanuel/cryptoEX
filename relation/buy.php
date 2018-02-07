<?php
function load($class){
    include($class .".php");
  }
  load('IOhander');
  
  $class = new IOhandler;
  $buyerID = sessionId();
  $SellerID = trim($_POST['SellerID']);
  $sellerconfirm = '0';
  $buyerconfirm = '0';
  $amount = trim($_POST['amount']);
  $date = date("Y-m-d h:i:sa");
  $buyerconfirmDate = '0';
  $sellerconfirmDate = '0';
  $sold = '0';
  
  $values = array($buyerID, $SellerID, $sellerconfirm, $buyerconfirm, $amount, $date, $buyerconfirmDate, $sellerconfirmDate, $sold);
  $fields = array('buyerID', 'SellerID', 'sellerconfirm', 'buyerconfirm', 'amount', 'date', 'buyerconfirmDate', 'sellerconfirmDate', 'sold');

  $sell = $class->insert('users', $fields, $values);
  if($sell == 'true'){
 	echo "success";
  }else{
  	echo "notsuccess";
  }
?>