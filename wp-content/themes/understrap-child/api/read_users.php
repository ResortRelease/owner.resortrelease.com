<?php
// PHP SQL
$array = $fields = array(); $i = 0;
$handle = @fopen("TEST.csv", "r");
if ($handle) {
    while (($row = fgetcsv($handle, 4096)) !== false) {
        if (empty($fields)) {
            $fields = $row;
            continue;
        }
        foreach ($row as $k=>$value) {
          $array[$i][$fields[$k]] = $value;
          echo $value."<br>";
        }
        $i++;
    }
    if (!feof($handle)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($handle);
}
?>