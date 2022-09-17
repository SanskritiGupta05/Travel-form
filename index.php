<?php
$insert = false;
//isset function makes sure if user has send post request with 'name' then only it will run
if(isset($_POST['name'])){
    //set connection variables
$server = "localhost";
$username = "root";
$password = "";

// create db connection
$con = mysqli_connect($server, $username, $password);

if(!$con){
    die("connection to this database failed due to". mysqli_connect_error());
}
//"Success connecting to the db";

// Collect post variables
$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];
$sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
//echo $sql;

// Execute query
if($con->query($sql)== true){
   // echo "Successfully inserted";

   // Flag for successful insertion
   $insert = 'true';
}
else{
    echo "ERROR: $sql <br> $con->error";
}

// Close db connection
$con->close();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
     <div class="container">
        <h1>Welcome to the trip form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip.</p>

        <?php 
        if($insert == true){
            echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining for the trip.</p>";
        }
        ?>
        
        <!-- Using POST method here-->
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button> 
        </form>
    </div>
    <!---->
     <script src="index.js"></script>
</body>
</html> 