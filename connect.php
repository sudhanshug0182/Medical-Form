<?php
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$weight = $_POST['weight'];
$bloodgrp = $_POST['bloodgrp'];
// $insurance = $_POST['insurance'];
// $policy_no = $_POST['policy-no'];
// $med_condition = $_POST['med-condition'];
// $other_med_condition = $_POST['other_med-condition'];
// $addiction = $_POST['addiction'];
// $other_addiction = $_POST['other_addiction'];
$concern = $_POST['concern'];

//database connection
$conn = new mysqli('localhost','root','','medicaldatabase');
if($conn -> connect_error){
    die("Connection Failed: '.$conn->connect_error");
}else{
    $stmt = $conn->prepare("insert into medicalrecords(name,age,gender,phone,email,weight,bloodgrp,concern)values(?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sisisiss",$name,$age,$gender,$phone,$email,$weight,$bloodgrp,$concern);

    $stmt->execute();
    echo "Your response is recorded. Thank You!";
    $stmt->close();
    $conn->close();
}
?>