<?php
  session_start();

  $con = mysqli_connect('localhost','root','root');
  if($con){
    echo "connection established";

  }
  else{
    echo "connection not established";
  }
  mysqli_select_db($con, 'trip_planner');
  $email = $_POST['Email'];
  $password = $_POST['Password'];

  $q = "select * from register where email = '$email' && password = '$password'";

  $result = mysqli_query($con, $q);
  $num = mysqli_num_rows($result);
  if($num == 1)
  {
    header('location:http://localhost/site/index.html');
  }
  else{

    header('location:http://localhost/site/index_signup.html');
    //echo "error" . mysqli_error($con);
  }

 ?>
