<?php

$servername = 'localhost';
$username = 'your_db_username';
$password = 'your_db_password';
$dbname = 'feedback_db';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $tel = $_POST['tel'];
    $room = $_POST['room'];
    $recommend = $_POST['recommend'];
    $leadName = $_POST['leadName'];
    $companyName = $_POST['companyName'];
    $contact = $_POST['contact'];
    $comments = $_POST['comments'];
    $reservation = $_POST['reservation'];
    $atmosphere = $_POST['atmosphere'];
    $housekeeping = $_POST['housekeeping'];
    $food = $_POST['food'];
    $recreations = $_POST['recreations'];
    $internet = $_POST['internet'];
    $location = $_POST['location'];
    $meeting = $_POST['meeting'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        exit('Connection failed: '.$conn->connect_error);
    }

    $sql = "INSERT INTO feedback (name, tel, room, recommend, leadName, companyName, contact, comments, reservation, atmosphere, housekeeping, food, recreations, internet, location, meeting)
    VALUES ('$name', '$tel', '$room', '$recommend', '$leadName', '$companyName', '$contact', '$comments', '$reservation', '$atmosphere', '$housekeeping', '$food', '$recreations', '$internet', '$location', '$meeting')";

    if ($conn->query($sql) === true) {
        echo 'New record created successfully';
    } else {
        echo 'Error: '.$sql.'<br>'.$conn->error;
    }

    $conn->close();
}
