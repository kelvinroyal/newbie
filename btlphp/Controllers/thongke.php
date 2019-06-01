<?php
$fp='Views/dem.txt';

$fo= fopen($fp, 'r');
$count= fread($fo, filesize($fp));
$count++;
$fc= fclose($fo);
$fo= fopen($fp, 'w');
$fw= fwrite($fo, $count);
$fc= fclose($fo);
?>