<?php

  $ARG[0] = $_REQUEST["SID"];

  $pos = strpos($ARG[0], 'P');



  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "aquaZoo";
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
        print "<p>Connection failed: " . $conn->connect_error."</p> ";
  }
if ($pos === 1) {
  $condition="SELECT * FROM description where SID='$ARG[0]'";
}
else {
  $condition="SELECT * FROM sponsor where SPID='$ARG[0]'";
}

    $result = $conn->query($condition);
   
    if ($result->num_rows > 0) {
     // output data of each row
     print "<div><ul style=\"background-color: white\">";

     while($row = $result->fetch_assoc()) {
       if ($pos === 1) {
       print "<img class=\"img-rounded\" src=".$row["ImageSrc"]." alt=".$row["ImageSrc"]." name=".$row["SID"]." onclick="."doAJAXstuffABA("."this.name".")"." width=\"200px\" height=\"200px\"/>";
       print "<br><table class=\"table\">";
       print "<tr class=\"success\"><th>CommonName</th><th>ScientificName</th><th>AvgLifeSpan</th><th>AvgWeight</th><th>AvgHeight</th><th>StatusOfConservation</th><th>Habitat</th><th>Type</th><th>Classification</th></tr>";
       print "<tr class=\"info\">";
       print "<td>".$row["CommonName"]."</td><td>".$row["ScientificName"]."</td><td>".$row["AvgLifeSpan"]."</td><td>".$row["AvgWeight"]."</td><td>".$row["AvgHeight"]."</td><td>".$row["StatusOfConservation"]."</td><td>".$row["Habitat"]."</td><td>".$row["Type"]."</td><td>".$row["Classification"]."</td>";
       print "</tr>";
       print "</table>";
       print "<br><p class=\"well\">".$row["Information"]."</p>";
        }
        else {
          print "<img class=\"img-circle\" src=".$row["Fname"].".jpg"." alt=".$row["Fname"]." name=".$row["SPID"]." onclick="."doAJAXstuffABA("."this.name".")"." width=\"200px\" height=\"200px\"/>";
          print "<br><table class=\"table\">";
          print "<tr class=\"success\"><th>Fname</th><th>Minit</th><th>Lname</th><th>Amount</th><th>Address</th><th>StartPeriod</th><th>EndPeriod</th><th>AID</th></tr>";
          print "<tr class=\"info\">";
          print "<td>".$row["Fname"]."</td><td>".$row["Minit"]."</td><td>".$row["Lname"]."</td><td>".$row["Amount"]."</td><td>".$row["Address"]."</td><td>".$row["StartPeriod"]."</td><td>".$row["EndPeriod"]."</td><td>".$row["AID"]."</td>";
          print "</tr>";
          print "</table>";
        }
     }
     print "</ul></div>";
   }

?>
