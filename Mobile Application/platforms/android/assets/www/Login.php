<html lang="en-US"><head>

  <meta charset="UTF-8">

  <title>Login</title>
	<script>
	function loadChirp(){
		
		var username = document.getElementById("Username").value;
		var password = document.getElementById("Password").value;

			console.log("getting json"),
         $.getJSON("http://www.crunkbox.co.uk/api/logincheck.php?username="+username+"&password="+password, 
				   console.log("got json"),
              function(json) {
			  console.log(json[ 0 ].userloggedin);
			if(json[ 0 ].userloggedin=="false"){
				alert("Login Failed");
			}
			if(json[ 0 ].userloggedin=="true"){
				alert("Login Success");
			}
	  }); 
      }
</script>
	<link rel="stylesheet" href="css/style.css" media="screen" type="text/css">
	<div id="login">
        <form action="javascript:void(0);" method="get">
			<br>
			<h1>
				Log-in
			</h1>
            <p></span><input  type="text" id="Username" value="Username" ></p> 
            <p></span><input  type="password" id="Password" value="Password" ></p>
            <p><input type="submit" value="Sign In" onclick="loadChirp()"></p>
		</form>
        <p><a href="index.php">Sign up now</a></span></p>
      </div>
</body></html>