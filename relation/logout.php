<?php  
 //logout.php
  session_start();
  function load($class){
    include('../backend/'. $class .".php");
  }
  load('IOhander');
  

$io = new IOhandler;
 session_start();
 $id = $_SESSION['userid'];
 $destroy = $io->endSession($id);
 if($destroy){
 	header("location: ./../login.php");
 }else{
 	header("location: ./../dashboard.php");
 } 
 ?>  