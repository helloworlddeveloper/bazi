<?php

require_once './Classes/PHPExcel.php';
include 'Classes/PHPExcel/IOFactory.php';


$conn = new PDO("mysql:host=localhost;dbname=bazi;charset=utf8","root","");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


ini_set('max_execution_time', 1000);
ini_set("memory_limit", "-1");
set_time_limit(1000);

$inputFileName = "./table/locations2.xlsx";  
$inputFileType = PHPExcel_IOFactory::identify($inputFileName);  
$objReader = PHPExcel_IOFactory::createReader($inputFileType);  
$objReader->setReadDataOnly(true);  
$objPHPExcel = $objReader->load($inputFileName);  

$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);

$highestRow = $objWorksheet->getHighestRow();
$highestColumn = $objWorksheet->getHighestColumn();

$headingsArray = $objWorksheet->rangeToArray('A1:'.$highestColumn.'1',null, true, true, true);
$headingsArray = $headingsArray[1];


$r = -1;
$namedDataArray = array();
for ($row = 2; $row <= $highestRow; ++$row) {
    $dataRow = $objWorksheet->rangeToArray('A'.$row.':'.$highestColumn.$row,null, true, true, true);
    if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')) {
        ++$r;
        foreach($headingsArray as $columnKey => $columnHeading) {
            $namedDataArray[$r][$columnHeading] = $dataRow[$row][$columnKey];
        }
    }
}





?>
<table style="width:100%;" border="0">
  <tr>
    <td>id</td>
    <td>City</td>
    <td>lat</td>
    <td>long</td>
    <td>gmt</td>
    <td>dst</td>
    <td>country</td>
    <td>admin</td>
  </tr>
<?php
foreach ($namedDataArray as $result) {
 $insert_table = "insert into locations(id,city,lat,longs,gmt,dst,country,admin) values('".$result["id"]."','".$result["city"]."',".$result["lat"].",".$result["long"].",".$result["gmt"].",".$result["dst"].",'".$result["country"]."','".$result["admin"]."')";
   
//echo $insert_table; 
 $conn->query($insert_table);

?>
	  <tr>
		<td><?php echo $result["id"];?></td>
		<td><?php echo $result["city"];?></td>
		<td><?php echo $result["lat"];?></td>
		<td><?php echo $result["long"];?></td>
		<td><?php echo $result["gmt"];?></td>
		<td><?php echo $result["dst"];?></td>
                <td><?php echo $result["country"];?></td>
                <td><?php echo $result["admin"];?></td>
	  </tr>
<?php
}
?>
</table>