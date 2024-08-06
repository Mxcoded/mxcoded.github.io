<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $tel = $_POST['tel'];
    $room = $_POST['room'];
    $recommend = $_POST['recommend'];
    $leadName = $_POST['leadName'];
    $companyName = $_POST['companyName'];
    $contact = $_POST['contact'];
    $comments = $_POST['comments'];

    // Collect service area experience ratings
    $ratings = [
        'reservation' => $_POST['reservation'],
        'atmosphere' => $_POST['atmosphere'],
        'housekeeping' => $_POST['housekeeping'],
        'food' => $_POST['food'],
        'recreations' => $_POST['recreations'],
        'internet' => $_POST['internet'],
        'location' => $_POST['location'],
        'meeting' => $_POST['meeting'],
    ];

    $email = new PHPMailer(true);

    try {
        // Server settings
        $email->isSMTP();
        $email->Host = 'smtp.brickspoint.com';
        $email->SMTPAuth = true;
        $email->Username = 'no-reply@brickspoint.com';
        $email->Password = 'your_password';
        $email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $email->Port = 465;

        // Recipients
        $email->setFrom('no-reply@brickspoint.com', 'Feedback Form');
        $email->addAddress('gm@brickspoint.com');
        $email->addAddress('it@brickspoint.com'); // Add more recipients as needed

        // Content
        $email->isHTML(true);
        $email->Subject = 'New Feedback Submission';
        $email->Body = "<p>Name: $name</p>
                        <p>Tel: $tel</p>
                        <p>Room no: $room</p>
                        <p>Would recommend: $recommend</p>
                        <p>Lead Name: $leadName</p>
                        <p>Company Name: $companyName</p>
                        <p>Contact: $contact</p>
                        <p>Comments: $comments</p>";

        foreach ($ratings as $key => $value) {
            $email->Body .= '<p>'.ucfirst($key).": $value</p>";
        }

        $email->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$email->ErrorInfo}";
    }
}
