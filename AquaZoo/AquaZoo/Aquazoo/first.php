<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>DBA Login</title>
	<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: red;
}

li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
    color: #D2691E;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}
li:hover ul {display: block; position: absolute;}
 li:hover li {float: none;}
 ul li a {display: block;background: #000;padding: 5px 10px 5px 10px;text-decoration: none;
           white-space: nowrap;}

.dropdown-content a:hover {background-color: #f1f1f1}

.show {display:block;}


iframe {
    display: block;       /* iframes are inline by default */
    background: white;
    border: none;         /* Reset default border */
    height: 100vh;        /* Viewport-relative units */
    width: 100vw;
}
</style>
</head>
<body>




<h3 align="center" class="page_heading"> Welcome to the Data Entry Page </h3>


	<ul>
		<li class="dropdown"><a href="SInsert.html" class="dropbtn" target="iframe_1"> Sponsor</a>

		<li class="dropdown"><a href="TrainerInsert.html" class="dropbtn" target="iframe_1"> Trainer</a>

		<li class="dropdown"><a href="AInsert.html" class="dropbtn" target="iframe_1"> Animal</a>

		<li class="dropdown"><a href="DInsert.html" class="dropbtn" target="iframe_1"> Description</a>

		<li class="dropdown"><a href="MInsert.html" class="dropbtn" target="iframe_1"> Medical History</a>
        <li class="dropdown"><a href="Logout.php" class="dropbtn"> Logout</a>



	</ul>


<iframe src="about:blank" name="iframe_1"></iframe>


</body>
</html>
