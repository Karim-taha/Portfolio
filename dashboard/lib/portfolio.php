<?php 

function Add_new_pro($img, $desc, $user_id){
    global $conn;
    $conn = mysqli_connect("localhost", "root", "", "portfolio");
if(!$conn){
die("CONNECTION FAILED");
}


        $query = "INSERT INTO porfolio(img, description, user_id) VALUES ('$img', '$desc', '$user_id')";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("QUERY FAILED" . mysqli_error($conn));
            }
    
}

function Get_portfolios(){
    global $conn;
    $conn = mysqli_connect("localhost", "root", "", "portfolio");
    if(!$conn){
        die("CONNECTION FAILED");
        }

    $sql = "SELECT * FROM userportfolio";
    $query = mysqli_query($conn, $sql);
    $projects = [];
    while($row = mysqli_fetch_assoc($query)){
        $projects[]= $row;
    }
    return $projects;
}

function Delete_Portfolio($proid){
    global $conn;
    $conn = mysqli_connect("localhost", "root", "", "portfolio");
    if(!$conn){
        die("CONNECTION FAILED");
        }

        $sql = "DELETE FROM porfolio WHERE id = $proid";
        $query = mysqli_query($conn, $sql);
}

function Get_portfolios_By_Id($proid){
    global $conn;
    $conn = mysqli_connect("localhost", "root", "", "portfolio");
    if(!$conn){
        die("CONNECTION FAILED");
        }

    $sql = "SELECT * FROM userportfolio WHERE id = $proid";
    $query = mysqli_query($conn, $sql);
   $row = mysqli_fetch_assoc($query);
     
    return $row;
}


function Update_pro($img, $desc, $user_id){
    global $conn;
    $conn = mysqli_connect("localhost", "root", "", "portfolio");
if(!$conn){
die("CONNECTION FAILED");
}


$sql = "UPDATE porfolio SET description = '$desc' ";
if(!empty($img)){

    $sql .= ", img = '$img' ";
}
$sql .= "WHERE id = $user_id";

// echo $sql;die;

        $result = mysqli_query($conn, $sql);
        if(!$result){
            die("QUERY FAILED" . mysqli_error($conn));
            }
    
}

function contact(){

    if(isset($_POST['submit'])){

        // DB Connection : 
        global $conn;
            $con = mysqli_connect('localhost', 'root', '', 'portfolio');
            if (!$con) {
                die("DATABASE CONNECTION FAILED");
            }

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
                
        // Send data to DB : 
        
        if(!empty($name) && !empty($name) && !empty($phone) && !empty($message)){
            $sql = "INSERT INTO contact(name, email, phone, message) VALUES ('$name', 
            '$email', '$phone', '$message')";
            
            $query = mysqli_query($conn, $sql);
            if(!$query){
                die("SEND DATA Failed" . mysqli_error($conn));
            }
            
        }else{
            
        }
    }
}

