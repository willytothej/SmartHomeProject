<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js?<?php echo time();?>"></script>	 

<script>jQuery.ajax({
	//Send request
    type: "GET",
	contentType: "application/json",
         url: "http://www.fluidityhome.me/api/User/Create.php",
		data:{"Password": "qwerty11","RegType": "1","ConfirmCode": "443322","LastName": "qwerty11","UserName": "qwerty11","FirstName": "qwerty11","EmailAddress": "qwerty11" },
    //If successfully sent then book created else book has not been         
	success: function (data, status, jqXHR) {
alert("meow");
         },
         error: function (jqXHR, status) {
			 alert(status);
         }
}
				);

</script>