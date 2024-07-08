<?php
$host = "localhost";
$dbuser = "root";
$dbpassword = "1234";
$dbname = "internship";
$port =3306;

$btn = $_POST['btnrole'];
try {
    $conn = new mysqli($host, $dbuser, $dbpassword,$dbname, $port);
} catch (Exception $th) {
    echo $th->getMessage();
}

if($conn==false){
    echo "Error: ". mysqli_connect_error();
    die("Connect Error (". mysqli_connect_error() .")". mysqli_connect_error());
}
if(isset($btn)){
    $rolename = $_POST["role"];
    if($rolename!=""){
        $sql="INSERT INTO role(rolename) VALUES (:rolename);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("rolename", $rolename);
        $stmt->execute();

        $stmt=null;
        echo "RECORD ADDED";
        $conn->close();    
    }
}



?>
