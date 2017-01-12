<?php

  $ARG[0] = $_REQUEST["classification"];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "aquaZoo";
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
        print "<p>Connection failed: " . $conn->connect_error."</p> ";
  }




if($ARG[0] == "sponsor"){
  $condition="SELECT * FROM sponsor";
}
else
  $condition="SELECT * FROM description where classification='$ARG[0]'";
//print $condition;

    $result = $conn->query($condition);
   

    if ($result->num_rows > 0) {
     // output data of each row
     print "<div><ul style=\"background-color: white\">";

     while($row = $result->fetch_assoc()) {
       if($ARG[0] == "sponsor"){
         print "<li><button type="."button"."><figure><img class=\"img-circle\" src=".$row["Fname"].".jpg"." alt=".$row["Fname"]." name=".$row["SPID"]." onclick="."doAJAXstuffABA("."this.name".")"." width=\"200px\" height=\"200px\"/><figcaption>".$row["Fname"]." ".$row["Minit"]." ".$row["Lname"]."</figcaption></figure></a></li>";
       }
       else
         print "<li><button type="."button"."><figure><img class=\"img-rounded\" src=".$row["ImageSrc"]." alt=".$row["ImageSrc"]." name=".$row["SID"]." onclick="."doAJAXstuffABA("."this.name".")"." width=\"200px\" height=\"200px\"/><figcaption>".$row["CommonName"]."</figcaption></figure></a></li>";
     }
     print "</ul></div>";
   }

?>
