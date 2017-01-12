<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: first.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Login Page</title>

<meta charset="UTF-8">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>

<style type="text/css">
  	.bodyContent {
  		/*background-color:beige;*/
  		margin: 0 auto;
  		background-image: url("http://vignette3.wikia.nocookie.net/animal-jam-clans-1/images/5/50/Wiki-background/revision/latest?cb=20160129044353");
  		background-repeat: no-repeat;
  		background-size: 100% 720px;
  	}

  	.container{
  		width: 400px;
  		height: 300px;
  		text-align: center;
  		/*padding: 10px 20px;*/
  		border-radius: 4px;
  		background-color: rgba(52,73,94,0.7);
  		margin: 0 auto;
  		margin-top: 150px;
  		/*border:2px solid #ccc;
  		display: inline-block; */
  	}

  	.container img{
  		width: 120px;
  		height: 120px;
  		margin-top: -60px;
  		margin-bottom: 30px;
  	}

  	input[type=text], input[type=password]{
  		height: 45px;
  		width: 200px;
  		font-size: 14px;
  		margin-bottom: 20px;
  		background-color: #fff;
  		padding-left: 40px;
  		border: none;
  		border-radius: 4px;

  	}

  	/*.form-input::before{
  		content: url(https://thumb7.shutterstock.com/display_pic_with_logo/1895126/429103831/stock-vector-user-icon-vector-429103831.jpg);
  		position: absolute;
  		font-family: "FontAwesome";
  		font-size: 30px;
  		padding-left: 30px;
  		font-size: 35px;
  	}

  	.form-input:last-child(2)::before{
  		content: ("https://thumb7.shutterstock.com/display_pic_with_logo/1895126/429103831/stock-vector-user-icon-vector-429103831.jpg");
  	}*/

  	button{
  		background-color: #2ECC71;
  		color: #fff;
  		padding: 15px 30px;
  		border-bottom:4px solid #27ae60;
  		margin-bottom: 20px;
  		border-radius: 4px;
  		border: none;
  		cursor: pointer;
  		/*width: 100%;*/
  	}

  	a{
  		color: white;
  	}

  </style>
</head>



<body oncontextmenu="return false" class="bodyContent">
<a href="Homepage.html">
      <img src="Logo.jpg" class="img-rounded" alt="Aqua  Zoo" width="400px" height="192px"/>
    </a>

<div class="container">
	
	<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/67/Crystal_Clear_app_Login_Manager.svg/2000px-Crystal_Clear_app_Login_Manager.svg.png">
	<form action="" method="post">
	<div class="form-input">
		<input type="text" name="username" placeholder="Enter Username" required>
	</div>
	<div class="form-input">
		<input type="password" name="password" placeholder="Enter password" required>
	</div>
	<input name="submit" type="submit" value=" Login ">
		<br><a href="#"> Forget password? </a>
	</form>
</div>


</body>

</html>
