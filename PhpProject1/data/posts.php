<?php
//$data=$result;
//$myarray = array("data1"=>"value1","data2"=>"value2");
//
$temp = $_POST['key'];
//echo $temp;
$input = preg_quote($temp, '~'); // don't forget to quote input string!
$data = array('orange', 'blue', 'green', 'red', 'pink', 'brown', 'black');

$result = preg_grep('~' . $input . '~', $data);

//print_r($result);
echo implode(" ",$result);
  ?>