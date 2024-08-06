<?php

$servername = 'localhost';
$username = 'your_db_username';
$password = 'your_db_password';
$dbname = 'feedback_db';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    exit('Connection failed: '.$conn->connect_error);
}

$sql = 'SELECT * FROM feedback';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table table-bordered'>";
    echo '<thead><tr><th>Name</th><th>Tel</th><th>Room</th><th>Recommend</th><th>Lead Name</th><th>Company Name</th><th>Contact</th><th>Comments</th><th>Reservation</th><th>Atmosphere</th><th>Housekeeping</th><th>Food</th><th>Recreations</th><th>Internet</th><th>Location</th><th>Meeting</th><th>Date</th></tr></thead>';
    echo '<tbody>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr><td>'.$row['name'].'</td><td>'.$row['tel'].'</td><td>'.$row['room'].'</td><td>'.$row['recommend'].'</td><td>'.$row['leadName'].'</td><td>'.$row['companyName'].'</td><td>'.$row['contact'].'</td><td>'.$row['comments'].'</td><td>'.$row['reservation'].'</td><td>'.$row['atmosphere'].'</td><td>'.$row['housekeeping'].'</td><td>'.$row['food'].'</td><td>'.$row['recreations'].'</td><td>'.$row['internet'].'</td><td>'.$row['location'].'</td><td>'.$row['meeting'].'</td><td>'.$row['created_at'].'</td></tr>';
    }

    echo '</tbody></table>';
} else {
    echo '0 results';
}

$conn->close();
