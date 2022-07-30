<?php
  require_once 'connection.php';
  print_r($_POST);
  #Array ( [id] => k [username] => n [contact] => 90 [email] => k@gmial.com [role] => student [password] => mklopi;' )
  $id = $_POST['id'];
  $username = $_POST['username'];
  $contact = $_POST['contact'];
  $email = $_POST['email'];
  $role = $_POST['role'];
  $password = $_POST['password'];
  $password = md5($password);
  #establlish mysqli connection
  #create sql query
  $insert_query = "INSERT INTO `users` (`id`, `name`, `contact`, `email`, `role`, `password`) VALUES ('$id', '$username', '$contact', '$email', '$role', '$password')";
  #execute query
  $result = $conn->query($insert_query) or die($conn->error);
  print_r($result);
?>