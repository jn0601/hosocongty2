<?php 

$connect = mysqli_connect('localhost', 'root', '', 'hosocongty');
if ($connect) {
  mysqli_query($connect, "SET NAMES 'UTF8'");
  // echo "connected successfully";
  // exit();
  session_start();
} else {
  echo 'connected unsuccessfully';
}

?>