<?php

include_once("db_connect.php");

if (isset($_POST["import"])) {
 
$file_upld = $_FILES["file"]["tmp_name"];
    
if ($_FILES["file"]["size"] > 0) {
      
$file_csv = fopen($file_upld, "r");

while (($column = fgetcsv($file_csv, 100000, ",")) !== FALSE) {

$sql = "INSERT into stuffs (id, code,title,level1,level2,level3,price, price_sp,fields_properties,mutual_purchases,unit_of_measure,unit_of_measure,image_path,show_on_main,description)
  values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "''" . $column[4] . "','" . $column[5] . "','" . $column[6] . "','" . $column[7] . "','" . $column[8] . "','" . $column[9] . "','" . $column[10] . "','" . $column[11] . "','" . $column[12] . "','" . $column[13] . "','" . $column[14] . "')";

$result = $db_conn->query($sql);
$db_conn->close();
        
if (!empty($result)) {
    $type = "success";
    $message = "Data is imported into the database ok!";
        } else {
     $type = "error";
     $message = "Problem with loading CSV file";
        }
      }
    }
  }

header('Location: index.php');
sleep(3);
exit;
?>