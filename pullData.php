<?php
// db parameter
$host = "localhost";
$user = "root";
$pass = "";
$db = "2001";

// api (schools)
$url="https://data.gov.sg/api/action/datastore_search?resource_id=ede26d32-01af-4228-b1ed-f05c45a1d8ee&limit=361";
$json = file_get_contents($url);
$object = json_decode($json);

$columnNames = array();
foreach(array_keys((array)$object->result->records[0]) as $columns) {
  array_push($columnNames, $columns);
}

for ($i=0; $i<361; $i++) {
  $array=array_values((array)$object->result->records[$i]);
  $array = array_map( 'addslashes', $array );

  // db connection
  $link = mysqli_connect($host, $user, $pass, $db);
  $query = "INSERT INTO `Schools` (
    `$columnNames[0]`,
    `$columnNames[1]` ,
    `$columnNames[2]`,
    `$columnNames[3]`,
    `$columnNames[4]`,
    `$columnNames[5]`,
    `$columnNames[6]`,
    `$columnNames[7]`,
    `$columnNames[8]`,
    `$columnNames[9]`,
    `$columnNames[10]`,
    `$columnNames[11]`,
    `$columnNames[12]`,
    `$columnNames[13]` ,
    `$columnNames[14]`,
    `$columnNames[15]` ,
    `$columnNames[16]`,
    `$columnNames[17]` ,
    `$columnNames[18]` ,
    `$columnNames[19]` ,
    `$columnNames[20]` ,
    `$columnNames[21]` ,
    `$columnNames[22]` ,
    `$columnNames[23]` ,
    `$columnNames[24]` ,
    `$columnNames[25]` ,
    `$columnNames[26]` ,
    `$columnNames[27]` ,
    `$columnNames[28]` ,
    `$columnNames[29]` ,
    `$columnNames[30]` ,
    `$columnNames[31]` ,
    `$columnNames[32]` ,
    `$columnNames[33]` ,
    `$columnNames[34]` ,
    `$columnNames[35]` )
    VALUES (
      '$array[0]',
      '$array[1]',
      '$array[2]',
      '$array[3]',
      '$array[4]',
      '$array[5]',
      '$array[6]',
      '$array[7]',
      '$array[8]',
      '$array[9]',
      '$array[10]',
      '$array[11]',
      '$array[12]',
      '$array[13]',
      '$array[14]',
      '$array[15]',
      '$array[16]',
      '$array[17]',
      '$array[18]',
      '$array[19]',
      '$array[20]',
      '$array[21]',
      '$array[22]',
      '$array[23]',
      '$array[24]',
      '$array[25]',
      '$array[26]',
      '$array[27]',
      '$array[28]',
      '$array[29]',
      '$array[30]',
      '$array[31]',
      '$array[32]',
      '$array[33]',
      '$array[34]',
      '$array[35]'
    ); ";
  mysqli_query($link, $query) or die("Error in ".$i." ".mysqli_error($link));
  mysqli_close($link);
}

// api (subjects)
$url1="https://data.gov.sg/api/action/datastore_search?resource_id=3bb9e6b0-6865-4a55-87ba-cc380bc4df39&limit=8389";
$json1 = file_get_contents($url1);
$object1 = json_decode($json1);

for ($i=0; $i<8389; $i++) {
  $array1=array_values((array)$object1->result->records[$i]);
  $array1 = array_map( 'addslashes', $array1 );

  // db connection
  $link = mysqli_connect($host, $user, $pass, $db);
  $query = "INSERT INTO `subjects` (
    `subject_desc`,
    `school_name` )
    VALUES (
      '$array1[1]',
      '$array1[2]');";
  mysqli_query($link, $query) or die("Error in ".$i." ".mysqli_error($link));
  mysqli_close($link);
}

// api (cca)
$url2="https://data.gov.sg/api/action/datastore_search?resource_id=dd7a056a-49fa-4854-bd9a-c4e1a88f1181&limit=3361";
$json2 = file_get_contents($url2);
$object2 = json_decode($json2);

for ($i=0; $i<3361; $i++) {
  $array2=array_values((array)$object2->result->records[$i]);
  $array2 = array_map( 'addslashes', $array2 );

  // db connection
  $link = mysqli_connect($host, $user, $pass, $db);
  $query = "INSERT INTO `cca` (
    `school_section`,
    `school_name`,
    `cca_grouping_desc`,
    `cca_customized_name`,
    `cca_generic_name`)
    VALUES (
      '$array2[0]',
      '$array2[1]',
      '$array2[2]',
      '$array2[3]',
      '$array2[4]');";
  mysqli_query($link, $query) or die("Error in ".$i." ".mysqli_error($link));
  mysqli_close($link);
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Chicken Dinner Project</title>
</head>
<body>
<?php
echo "Data pulled.";
?>
</body>
</html>
