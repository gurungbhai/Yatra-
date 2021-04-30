<?php
session_start();
//echo $_SESSION['id'];
$_POST['foo'] = $_SESSION['id'];
echo $_POST['foo'];
//echo $_SESSION['email'];
 //$f=$_SESSION['finalstep'];
 //echo $i;
 //echo $f;
 ?>