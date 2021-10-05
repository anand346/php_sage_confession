<?php
  include "config.php";
  if(isset($_POST['confession'])){
    if($_POST['confession'] == ""){
      echo "plz enter your confession";
    }else{
      $confession = mysqli_real_escape_string($conn,htmlentities($_POST['confession']));
      $client_ip = $_SESSION['client_ip'];
    $sql = "INSERT INTO confessions(confession,ip) VALUES('{$confession}','{$client_ip}')";
    if(mysqli_query($conn,$sql)){
      header("location:{$hostname}/index.php");
    }else{
      echo "post doesn't save successfully";
    }
    }

  }else{
    echo "plz enter your confession";
  }
?>