<?php
  session_start();
  header('location:http://localhost/site/packages/thankyou.html');
  $con = mysqli_connect('localhost','root','root');
  if($con){
    echo "connection established";
  }
  else{
    echo "connection not established";
  }
  mysqli_select_db($con, 'trip_planner');
  $name = $_POST['Name'];
  $country = $_POST['Country'];
  $email = $_POST['Email'];
  $contact = $_POST['Contact'];
  $comfort = $_POST['Comfort'];
  $adults = $_POST['Adults'];
  $rooms = $_POST['Rooms'];
  $children = $_POST['Children'];
  $message = $_POST['Message'];

  $q = "select * from booking where name = '$name' && country = '$country' && email = '$email' && contact = '$contact' && comfort = '$comfort' && adults = '$adults' && rooms = '$rooms' && children = '$children' && message = '$message'";


  $result = mysqli_query($con, $q);
  $num = mysqli_num_rows($result);
  if($num == 1)
  {
    echo "duplicate";
  }
  else{
    $qy = "insert into booking(name, country, email, contact, comfort, adults, rooms, children, message) values ('$name', '$country', '$email', '$contact', '$comfort', '$adults', '$rooms', '$children', '$message')";
    mysqli_query($con, $qy);
    //echo"error" . mysqli_error($con);
  }

 ?>
