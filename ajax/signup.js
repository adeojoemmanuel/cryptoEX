$(document).ready(function(){
	$("#add_err").css('display', 'none', 'important');
	 $("#signup").click(function(){	
		  var data = $("#registrationForm").serialize();
		  $.ajax({
		   type: "POST",
		   url: "relation/register.php",
			data: data,
		   	success: function(response){    
				if(response=="success"){
					$("#signupbtn").html('<img src="ajaxLoader.gif"/> &nbsp; Processing ...');
			    	$("#message").fadeIn(1000, function(){      
			    		$("#message").html('<div class="alert alert-success"> &nbsp;' + 'registration was successful' + ' !</div>');
			        });
			    }else{    
			    	$("#message").fadeIn(1000, function(){      
			    		$("#message").html('<div class="alert alert-danger"> &nbsp; '+response+' !</div>');
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