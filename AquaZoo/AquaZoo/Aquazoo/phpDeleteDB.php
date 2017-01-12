<?php
$col_name_animal=array("0","AID","Name","Sex","Age","Height","Weight","Location","SID");
$col_name_description=array("1","SID","ImageSrc","CommonName","ScientificName","AvgLifeSpan","AvgWeight","AvgHeight","StatusOfConservation","Habitat","Type","Classification","Information");
$col_name_trainer=array("2","TID","Fname","Minit","Lname","StartTime","EndTime","Salary","AID");
$col_name_sponsor=array("3","SPID","Fname","Minit","Lname","Amount","Address","StartPeriod","EndPeriod","EmailID","AID");
$col_name_m_history=array("4","RecordNo","Disease","Date","Diet","TID","AID");

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
    $counter = 9;
    $table_name="animal";
    $col_name=$col_name_animal;
  }
  else if($ARG[0] == 1){
    $ARG[1] = $_REQUEST["SID"];
    $counter = 12;
    $table_name="description";
    $col_name=$col_name_description;

  }
  else if($ARG[0] == 2){
    $ARG[1] = $_REQUEST["TID"];
    $counter = 9;
    $table_name="trainer";
    $col_name=$col_name_trainer;
  }
  else if($ARG[0] == 3){
    $ARG[1] = $_REQUEST["SPID"];
    $ARG[10] = $_REQUEST["AID"];
    $counter = 11;
    $table_name="sponsor";
    $col_name=$col_name_sponsor;
  }
  else if($ARG[0] == 4){
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

  if($ARG[0] == 0){
    $condition = "DELETE from $table_name where AID='$ARG[1]'";
  }
  else   if($ARG[0] == 1){
    $condition = "DELETE from $table_name where SID='$ARG[1]'";
  }
  else   if($ARG[0] == 2){
    $condition = "DELETE from $table_name where TID='$ARG[1]'";
  }
  else if($ARG[0] == 3){
    $condition = "DELETE from $table_name where SPID='$ARG[1]' AND AID='$ARG[10]'";
  }
  else {
    $condition = "DELETE from $table_name where TID='$ARG[5]' AND AID='$ARG[6]'";
  }
  print $condition;

    $result = $conn->query($condition);

?>
