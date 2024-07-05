<?php
$supervisorname=filter_input(INPUT_POST,"supervisor-name");
$email=filter_input(INPUT_POST,"email");
$telephone=filter_input(INPUT_POST,"telephone");
$password=filter_input(INPUT_POST,"password");
$confirm=filter_input(INPUT_POST,"confirm");

if($confirm==$password){
    $host ="localhost";
    $dbuser = "root";
    $dbpassword = "1234";
    $dbname = "research_repository_database";
    
    $conn = new mysqli($host, $dbuser, $dbpassword, $dbname);
    if(mysqli_connect_error) {

        die("Connect Error (". mysqli_connect_errorno() .")". mysqli_connect_error());
    }
    else {
        $sql="INSERT INTO supervisor (name,email,telephone,password) VALUES
        ('$username','$email','$telephone','$password')";
        if($conn->query($sql)) {
            echo "record inserted";
        }
        else {

            echo "Error:". $sql ."<br>". $conn->error;}
            $conn->close();
    }
}
else
{
    echo "Confirm password should be matching with the password";
    die();
}
?>