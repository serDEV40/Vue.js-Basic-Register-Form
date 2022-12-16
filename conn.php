<?php
    try{
        $db = new PDO("mysql:host=localhost;dbname=vue;charset=utf8","root","");
    }catch(PDOExpception $error){
        echo $error->getMessage();
    }

    $email = $_POST['email'];
    $passw = $_POST['passw'];
    $insert = $db->prepare("INSERT INTO login_form (email,passw) VALUES ('$email','$passw')");
    $connct = $insert->execute([
        "email"=>$_POST['email'],
        "passw"=>$_POST['passw0']
    ]);
?>
