$(document).ready(function(){
	$("#add_err").css('display', 'none', 'important');
	 $("#login").click(function(){	
		  email=$("#email").val();
		  password=$("#password").val();
		  $.ajax({
		  	type: "POST",
		  	url: "relation/login.php",
			data: "email="+email+"&password="+password,
		   	success: function(response){    
				if(response=="success"){
			    	$("#login").html('<img src="ajaxLoader.gif"/> &nbsp; Signing In ...');
			    	setTimeout(' window.location.href = "dashboard.php"; ',1000);
			    }else{    
			    	$("#error").fadeIn(1000, function(){      
			    		$("#error").html('<div class="alert alert-danger"> &nbsp; ' + response + ' !</div>');
			        });
			    }
		    },
		    beforeSend:function(){
				$("#add_err").css('display', 'inline', 'important');
				$("#add_err").html("<img src='images/ajax-loader.gif' /> Loading...")
		    }
		  });
		return false;
	});
});