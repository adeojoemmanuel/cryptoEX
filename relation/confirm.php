<?php
function load($class){
    include($class .".php");
  }
  load('IOhander');
  
  $class = new IOhandler;
  $confirm = $_GET['confirmType'];
  $date = date("Y-m-d h:i:sa");

  switch ($cont){
  
    case 'seller':
      $SellerID = trim($_POST['sellerID']);
      $values = array($SellerID);
      $where = array('sellerconfirm');

      $sell = $class->update('offers',$values=array(),$where=array());
      if($sell == 'true'){
     	echo "success";
      }else{
      	echo "notsuccess";
      }
    case 'buyer':
      $buyerID = trim($_POST['buyerID'])
      $values = array($buyerID);
      $where = array('buyerconfirm');

      $sell = $class->update('offers',$values=array(),$where=array());
      if($sell == 'true'){
      echo "success";
      }else{
        echo "notsuccess";
      }

?>