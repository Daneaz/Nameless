<?php
// db parameter
$host = "localhost";
$user = "root";
$pass = "";
$db = "2001";

// api (schools)
$url="https://data.gov.sg/api/action/datastore_search?resource_id=ede26d32-01af-4228-b1ed-f05c45a1d8ee&limit=1";
$json = file_get_contents($url);
$object = json_decode($json);
$array=(array)$object->result->records[0];

$columnNames = array();
foreach(array_keys($array) as $columns) {
  array_push($columnNames, $columns);
}

// db connection
$link = mysqli_connect($host, $user, $pass, $db);
mysqli_query($link, 'DROP TABLE IF EXISTS `2001`.`schools`') or die(mysql_error());
$query = "CREATE TABLE `2001`.`schools` (
  `schoolId` INT NOT NULL AUTO_INCREMENT ,
  `$columnNames[0]` VARCHAR(100),
  `$columnNames[1]` VARCHAR(100),
  `$columnNames[2]` VARCHAR(100),
  `$columnNames[3]` VARCHAR(100),
  `$columnNames[4]` VARCHAR(100),
  `$columnNames[5]` VARCHAR(100),
  `$columnNames[6]` VARCHAR(100),
  `$columnNames[7]` VARCHAR(100),
  `$columnNames[8]` VARCHAR(100),
  `$columnNames[9]` VARCHAR(100),
  `$columnNames[10]` VARCHAR(100),
  `$columnNames[11]` VARCHAR(100),
  `$columnNames[12]` VARCHAR(100),
  `$columnNames[13]` VARCHAR(1000),
  `$columnNames[14]` VARCHAR(100),
  `$columnNames[15]` VARCHAR(100),
  `$columnNames[16]` VARCHAR(100),
  `$columnNames[17]` VARCHAR(100),
  `$columnNames[18]` VARCHAR(100),
  `$columnNames[19]` VARCHAR(3000),
  `$columnNames[20]` VARCHAR(100),
  `$columnNames[21]` VARCHAR(100),
  `$columnNames[22]` VARCHAR(100),
  `$columnNames[23]` VARCHAR(100),
  `$columnNames[24]` VARCHAR(100),
  `$columnNames[25]` VARCHAR(100),
  `$columnNames[26]` VARCHAR(100),
  `$columnNames[27]` VARCHAR(100),
  `$columnNames[28]` VARCHAR(100),
  `$columnNames[29]` VARCHAR(100),
  `$columnNames[30]` VARCHAR(100),
  `$columnNames[31]` VARCHAR(100),
  `$columnNames[32]` VARCHAR(100),
  `$columnNames[33]` VARCHAR(100),
  `$columnNames[34]` VARCHAR(100),
  `$columnNames[35]` VARCHAR(100),
 PRIMARY KEY (`schoolId`)) ENGINE = InnoDB;";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
mysqli_close($link);

// api (subjects)
$url1="https://data.gov.sg/api/action/datastore_search?resource_id=3bb9e6b0-6865-4a55-87ba-cc380bc4df39&limit=1";
$json1 = file_get_contents($url1);
$object1 = json_decode($json1);
$array1=(array)$object1->result->records[0];

// db connection
$link = mysqli_connect($host, $user, $pass, $db);
mysqli_query($link, 'DROP TABLE IF EXISTS `2001`.`subjects`') or die(mysql_error());
$query = "CREATE TABLE `2001`.`subjects` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `subject_desc` VARCHAR(100),
  `school_name` VARCHAR(100),
   PRIMARY KEY (`id`)) ENGINE = InnoDB;";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
mysqli_close($link);

// api (cca)
$url2="https://data.gov.sg/api/action/datastore_search?resource_id=dd7a056a-49fa-4854-bd9a-c4e1a88f1181&limit=1";
$json2 = file_get_contents($url2);
$object2 = json_decode($json2);
$array2=(array)$object2->result->records[0];

// db connection
$link = mysqli_connect($host, $user, $pass, $db);
mysqli_query($link, 'DROP TABLE IF EXISTS `2001`.`cca`') or die(mysql_error());
$query = "CREATE TABLE `2001`.`cca` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `school_section` VARCHAR(100),
  `school_name` VARCHAR(100),
  `cca_grouping_desc` VARCHAR(100),
  `cca_customized_name` VARCHAR(100),
  `cca_generic_name` VARCHAR(100),
   PRIMARY KEY (`id`)) ENGINE = InnoDB;";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
mysqli_close($link);

if ($result){
  echo "Database initialized.";
} else {
  echo "Error";
}
?>
