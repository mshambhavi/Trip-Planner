<?php
  session_start();
  header('location:http://localhost/site/index-4.html');
  $con = mysqli_connect('localhost','root','root');
  if($con){
    echo "connection established";
  }
  else{
    echo "connection not established";
  }
  mysqli_select_db($con, 'trip_planner');
  $name = $_POST['Name'];
  $email = $_POST['Email'];
  $country = $_POST['Country'];
  $message = $_POST['Message'];

  $q = "select * from contact where name = '$name' && email = '$email' && country = '$country' && message = '$message'";


  $result = mysqli_query($con, $q);
  $num = mysqli_num_rows($result);
  if($num == 1)
  {
    echo "duplicate";
  }
  else{
    $qy = "insert into contact(name, email, country, message) values('$name', '$email', '$country', '$message')";
    mysqli_query($con, $qy);
  //  echo"error" . mysqli_error($con);
  }

 ?>
