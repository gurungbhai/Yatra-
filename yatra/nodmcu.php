<?php
include 'dbhelper.php';
$db= new Database();
$data=$db->fetchByrfid(26);
print_r($data);
?>