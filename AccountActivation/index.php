<!DOCTYPE html>
<html>
<head>
	<title>Crypto Ex - Account verification</title>
	<link rel="stylesheet" href="css/app.css">
	<link rel="stylesheet" href="css/temp.css">
	<link rel="stylesheet" href="css/animate.css">
</head>
<body>
    <style>
		body{
			overflow: hidden;
		}
		#parent{
			margin-top: 10%;
			height: 70vh;
		}
		.child{
			padding: 2%;
		}
	</style>
<?php
	function load($class){
	    require_once('../backend/'. $class .".php");
	}
	
	load('IOhander');
	  
	$io = new IOhandler;

	$mbox = $_GET['email'];
	$ref = $_GET['code'];

	function activate($io, $mbox, $ref){
		// http://ophrex.com/AccountActivation/?action=activate&code=654ed447983bae6e954051fa6260c0ae5f8d844b&email=adeojo.emmanuel@iodevtech.com%27
		$isActivated = $io->getOne("SELECT * FROM users WHERE email = '$mbox' and activationKey = '$ref'");
		// $isActivated = $IO->getBy_id($mbox, $ref, '_users');

		if($isActivated){
			if($isActivated['isactive'] == 0){
				$activate = "UPDATE users SET isactive = 1 WHERE email = '$mbox' and activationKey = '$ref'";
				if($io->run_query($activate)){
					return "success";
				} else {
					return "error";
				}

			} elseif($isActivated['active'] == 1){
					return "already_verified";
			} else {
				return "error";
			}
			
		} else {
			return "error users dont exist go back and register";
		}

	}
		

	if(isset($_GET['action']) && isset($_GET['email']) && isset($_GET['code'])){
		
		$cont = $_GET['action'];
		$ref = $_GET['code'];
		$email = $_GET['email'];
		
		switch ($cont){	
		case 'activate':
				if(!empty($_GET['code'] && !empty($_GET['email']))){
					$final = activate($io, $mbox, $ref);
					$final;

					if ($final == "success") {
						$feed = "Success";
						$fbody = "Your account was successfully verified. Please proceed to the login page";
						$ftype = "text-success";

					} elseif ($final == "error") {
						$feed = "Error";
						$fbody = "An error occurred and we couldn't verify your email. Please retry clicking the link sent to your email or contact our support agent at info@tbcconverter.net";
						$ftype = 'text-danger';
					} elseif($final == 'already_verified'){
						$feed = "Error";
						$fbody = "Oops! It seems that email has already been verified. Please proceed to login";
						$ftype = 'text-danger';
					} else {
						$feed = "Error";
						$fbody = $final;
						$ftype = 'text-danger';
					}
					include './mult.php';
				} else {
					include('./err.html');	
				}
				break;
			
			default:
				include('./err.html');
				break;
		}
	} else {
		echo "error";

	} 

?>
</body>
</html>