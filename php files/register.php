<?php
  session_start();
  header('location:http://localhost/site/index_login.html');
  $con = mysqli_connect('localhost','root','root');
  if($con){
    echo "connection established";
  }
  else{
    echo "connection not established";
  }

  mysqli_select_db($con, 'trip_planner');
  $name = $_POST['Name'];
  $contact = $_POST['Contact'];
  $email = $_POST['Email'];
  $password = $_POST['Password'];

  $q = "select * from register where name = '$name' && contact = '$contact' && email = '$email' && password = '$password'";

  $result = mysqli_query($con, $q);
  $num = mysqli_num_rows($result);
  if($num == 1)
  {
    echo "duplicate";
  }
  else{
    $qy = "insert into register(name, contact, email, password) values('$name', '$contact', '$email', '$password')";
    mysqli_query($con, $qy);
    echo "error" . mysqli_error($con);

  }

 ?>
