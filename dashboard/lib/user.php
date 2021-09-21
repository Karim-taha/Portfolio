<?php 

// Connect to database : 
$conn = mysqli_connect("localhost", "root", "", "portfolio");
if(!$conn){
die("CONNECTION FAILED");
}

function Add_new_user(){
global $conn;
global $error;
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Hash password : 
// $hash_format = "$2y$10$";
// $salt = "iusesomecrazystrings22";
// $hash_salt = $hash_format . $salt;
// $password = crypt($password, $hash_salt);
$error = [];
if(empty($name)){
    $error[] = "Enter your name" . "<br>";
}
if(empty($email)){
    $error[] = "Enter your email" . "<br>";
}
if(empty($password)){
    $error[] = "Enter your password";
}

if(!empty($name) && !empty($email) && !empty($password)){
    $query = "INSERT INTO users(name, email, password) VALUES ('$name', '$email', '$password')";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("QUERY FAILED" . mysqli_error($conn));
        }
}

} 

function login(){
    global $conn;
    $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  $query = "SELECT * FROM users WHERE email = '$email' && password = '$password'";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);

    return $row;
}