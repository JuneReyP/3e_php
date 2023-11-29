<?php 
try {
    $host = "localhost";
    $dbname = "3e_php";
    $user = "root";
    $password = "";

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // if($conn){
    //     echo 'Connected to DB';
    // }
} catch (PDOException $err) {
    echo $err->getMessage();
}

?>