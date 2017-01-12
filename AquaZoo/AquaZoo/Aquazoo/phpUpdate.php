<?php
$col_name_animal=array("0","AID","Name","Sex","Age","Height","Weight","Location","SID");
$col_name_description=array("1","SID","ImageSrc","CommonName","ScientificName","AvgLifeSpan","AvgWeight","AvgHeight","StatusOfConservation","Habitat","Type","Classification","Information");
$col_name_trainer=array("2","TID","Fname","Minit","Lname","StartTime","EndTime","Salary","AID");
$col_name_sponsor=array("3","SPID","Fname","Minit","Lname","Amount","Address","StartPeriod","EndPeriod","EmailID","AID");
$col_name_m_history=array("4","RecordNo","Disease","Date","DIET","TID","AID");

  function checkEmpty($toCheck){
    if(!strcasecmp($toCheck,"EMPTY"))
    {
        return 0;
    }
    else
    {
        return 1;
    }
  }
  $ARG[0] = $_REQUEST["Tablename"];
  if($ARG[0] == 0){
    $ARG[1] = $_REQUEST["AID"];
    $ARG[2] = $_REQUEST["Name"];
    $ARG[3] = $_REQUEST["Sex"];
    $ARG[4] = $_REQUEST["Age"];
    $ARG[5] = $_REQUEST["Height"];
    $ARG[6] = $_REQUEST["Weight"];
    $ARG[7] = $_REQUEST["Location"];
    $ARG[8] = $_REQUEST["SID"];
    $counter = 9;
    $table_name="animal";
    $col_name=$col_name_animal;
  }
  else if($ARG[0] == 1){
    $ARG[1] = $_REQUEST["SID"];
    $ARG[2] = $_REQUEST["ImageSrc"];
    $ARG[3] = $_REQUEST["CommonName"];
    $ARG[4] = $_REQUEST["ScientificName"];
    $ARG[5] = $_REQUEST["AvgLifeSpan"];
    $ARG[6] = $_REQUEST["AvgWeight"];
    $ARG[7] = $_REQUEST["AvgHeight"];
    $ARG[8] = $_REQUEST["StatusOfConservation"];
    $ARG[9] = $_REQUEST["Habitat"];
    $ARG[10] = $_REQUEST["Type"];
    $ARG[11] = $_REQUEST["Classification"];
    $ARG[12] = $_REQUEST["Information"];
    $counter = 13;
    $table_name="description";
    $col_name=$col_name_description;

  }
  else if($ARG[0] == 2){
    $ARG[1] = $_REQUEST["TID"];
    $ARG[2] = $_REQUEST["Fname"];
    $ARG[3] = $_REQUEST["Minit"];
    $ARG[4] = $_REQUEST["Lname"];
    $ARG[5] = $_REQUEST["StartTime"];
    $ARG[6] = $_REQUEST["EndTime"];
    $ARG[7] = $_REQUEST["Salary"];
    $ARG[8] = $_REQUEST["AID"];
    $counter = 9;
    $table_name="trainer";
    $col_name=$col_name_trainer;
  }
  else if($ARG[0] == 3){
    $ARG[1] = $_REQUEST["SPID"];
    $ARG[2] = $_REQUEST["Fname"];
    $ARG[3] = $_REQUEST["Minit"];
    $ARG[4] = $_REQUEST["Lname"];
    $ARG[5] = $_REQUEST["Amount"];
    $ARG[6] = $_REQUEST["Address"];
    $ARG[7] = $_REQUEST["StartPeriod"];
    $ARG[8] = $_REQUEST["EndPeriod"];
    $ARG[9] = $_REQUEST["EmailID"];
    $ARG[10] = $_REQUEST["AID"];
    $counter = 11;
    $table_name="sponsor";
    $col_name=$col_name_sponsor;
  }
  else if($ARG[0] == 4){
    $ARG[1] = $_REQUEST["RecordNo"];
    $ARG[2] = $_REQUEST["Disease"];
    $ARG[3] = $_REQUEST["Date"];
    $ARG[4] = $_REQUEST["DIET"];
    $ARG[5] = $_REQUEST["TID"];
    $ARG[6] = $_REQUEST["AID"];
    $counter = 7;
    $table_name="medicalhistory";
    $col_name=$col_name_m_history;
  }


  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "aquaZoo";
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
        print "<p>Connection failed: " . $conn->connect_error."</p> ";
  }
  for($x = 1; $x < $counter; $x++) {
      $ret_value = checkEmpty($ARG[$x]);
      if($ret_value == 0){
          break;
      }
  }
  $condition="SELECT * FROM $table_name where ";
  if($ret_value == 0)
  {
    for($x = 1; $x < $counter; $x++) {
      $ret_value = checkEmpty($ARG[$x]);
      if($ret_value == 0){
          continue;
      }
      $condition = $condition.$col_name[$x]."='".$ARG[$x]."' AND ";
    }
    $condition = $condition."5=5";

    $result = $conn->query($condition);
    print "<br><p>Option: Querying:  Here is the sql query: $condition; </p> <br>";

    print "<table class=\"table\">";
    print "<tr class=\"danger\">";
    $dont = 0;
    if($ARG[0]==1)
       $dont = 1;
    for($x = 1; $x < $counter - $dont; $x++){
      print "<td>".$col_name[$x]."</td>";
    }
    print "</tr>";



    if ($result->num_rows > 0) {
     // output data of each row

     while($row = $result->fetch_assoc()) {
       print "<tr class=\"info\">";
       $dont = 0;
       if($ARG[0]==1)
          $dont = 1;
       for($x = 1; $x < $counter - $dont; $x++){
         print "<td>".$row[$col_name[$x]]."</td>";

       }
       if($ARG[0] == 1){
         print "<td><img src=".$row[$col_name[2]]." width=\"100px\" height=\"100px\"/></td>";
       }
       if($ARG[0] != 4 && $ARG[0] != 3){
         print "<td><button class=\"btn btn-primary\" type=\"button\""." onclick="."doAJAXstuffUpdate("."this.name".")"." name=".$row[$col_name[1]].">Update</button></td>";
         print "<td><button class=\"btn btn-danger\" type=\"button\""." onclick="."doAJAXstuffDelete("."this.name".")"." name=".$row[$col_name[1]].">Delete</button></td>";
       }
       else if($ARG[0] != 4){
         print "<td><button class=\"btn btn-primary\" type=\"button\""." onclick="."doAJAXstuffUpdate("."this.name".")"." name=".$row[$col_name[1]]."|".$row[$col_name[10]].">Update</button></td>";
         print "<td><button class=\"btn btn-danger\" type=\"button\""." onclick="."doAJAXstuffDelete("."this.name".")"." name=".$row[$col_name[1]]."|".$row[$col_name[10]].">Delete</button></td>";
       }
       else {
         print "<td><button class=\"btn btn-primary\" type=\"button\""." onclick="."doAJAXstuffUpdate("."this.name".")"." name=".$row[$col_name[5]]."|".$row[$col_name[6]].">Update</button></td>";
         print "<td><button class=\"btn btn-danger\" type=\"button\""." onclick="."doAJAXstuffDelete("."this.name".")"." name=".$row[$col_name[5]]."|".$row[$col_name[6]].">Delete</button></td>";

       }
       print "</tr>";

     }
     print "</table>";

   }
 }
  else
  {
      if($ARG[0] == 0){
        $condition = "select * from $table_name where AID='$ARG[1]'";
      }
      else   if($ARG[0] == 1){
        $condition = "select * from $table_name where SID='$ARG[1]'";
      }
      else   if($ARG[0] == 2){
        $condition = "select * from $table_name where TID='$ARG[1]'";
      }
      else if($ARG[0] == 3){
        $condition = "select * from $table_name where SPID='$ARG[1]' AND AID='$ARG[10]'";
      }
      else {
        $condition = "select * from $table_name where TID='$ARG[5]' AND AID='$ARG[6]'";
      }

    $result = $conn->query($condition);
    $total = $result->num_rows;
    if ($total > 0) {
      $condition = "Update $table_name set ";
      for($x = 1; $x < $counter; $x++) {
        if($x != $counter-1)
          $condition = $condition.$col_name[$x]."='".$ARG[$x]."',";
        else{
          if($ARG[0] == 4){
            $condition = $condition.$col_name[$x]."='".$ARG[$x]."' where TID='$ARG[5]' AND AID='$ARG[6]'";
          }
          else if($ARG[0] == 3){
            $condition = $condition.$col_name[$x]."='".$ARG[$x]."' where SPID='$ARG[1]' AND AID='$ARG[10]'";
          }
          else
            $condition = $condition.$col_name[$x]."='".$ARG[$x]."' where $col_name[1]='$ARG[1]'";
        }
        }
        print "<br>".$condition;

      if ($conn->query($condition) === TRUE) {
          print "<br><br>Record updated successfully<br><br>";
      } else {
        echo "Error updating record: " . $conn->error;
      }
    }
    else {
    $condition = "insert into $table_name values(";
    for($x = 1; $x < $counter; $x++) {
      if($x != $counter-1)
        $condition = $condition."'".$ARG[$x]."',";
      else
        $condition = $condition."'".$ARG[$x]."'";
    }
    $condition = $condition.")";
    print "<br>".$condition;
  if ($conn->query($condition) === TRUE) {
      print "<br>New record created successfully";
    } else {
      print "Error: " . $sql . "<br>" . $conn->error;
    }

    }
  $conn->close();
}
?>
