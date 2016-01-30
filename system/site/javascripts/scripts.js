jQuery(function($) {
	$("#signup_username").blur(function() { // triggred click
        
        /************** start: email exist function and etc. **************/
        $("#result").html("Loading");
		
		username=jQuery.trim($("#signup_username").val());

        var datastring = 'process=signup_username_exist&username='+ username; // get data in the form manual
        //var datastring = $('form#mainform').serialize(); // or use serialize
        $.ajax({
                    type: "POST", // type
                    url: "ajax", // request file the 'check_email.php'
                    data: datastring, // post the data
                    success: function(responseText) { // get the response
                        if(responseText == 1) { // if the response is 1
                            $("#result").html("<i class='glyphicon glyphicon-ban-circle'></i>");
							document.getElementById("username_check_status").className = "form-group has-error has-feedback";
							this.setCustomValidity("Username are already exist.");   
							return false;
                        } else if(responseText == 0) {
							$("#result").html("<i class='glyphicon glyphicon-ok'></i>");
							document.getElementById("username_check_status").className = "form-group has-success has-feedback";
							$("#username_check_status").setCustomValidity("Username is OK.");   
                        }else{
							$("#result").html(responseText);
						}
                    } // end success
        }); // ajax end
        /************** end: email exist function and etc. **************/
		
    }); // click end
	
	$("#signup_password_confirm").blur(function() { // triggred click
        
		password=jQuery.trim($("#signup_password").val());
		password_confirm=jQuery.trim($("#signup_password_confirm").val());
		
		if(password == password_confirm) { // if the response is 1
			$("#result").html("<i class='glyphicon glyphicon-ok'></i>");
			document.getElementById("password_check").className = "form-group has-success has-feedback";
			document.getElementById("password_confirm").className = "form-group has-success has-feedback";
		}else{
			alert("Password not match");
			document.getElementById("password_check").className = "form-group has-error has-feedback";
			document.getElementById("password_confirm").className = "form-group has-error has-feedback";
			$("#result").html(responseText);
		}
    }); // click end
}); // jquery end