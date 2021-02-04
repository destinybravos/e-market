<?php


sendEmail('destinybravos@gmail.com','destinybravos@gmail.com', 'Test Run', 'Tester', '<p>Hello this is just a test!</p>');


function sendEmail(
    String $sender, 
    String $recipient, 
    String $title, 
    String $subject, 
    String $body,
    String $CarbonCopy = null,
    String $BlindCarbonCopy = null
    ){

    $html = '
    <html>
        <head>
            <title>'. $title .'</title>
        </head>
        <body>
            <div>
                '. $body .'
            </div>
        </body>
    </html>
    ';

    // Always set content-type when sending HTML email
    // Set Header
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: <'. $sender .'>" . "\r\n";
    $headers .= $CarbonCopy != null ? "Cc: '. $CarbonCopy .'" . "\r\n" : '';
    $headers .= $BlindCarbonCopy != null ? "Bcc: '. $BlindCarbonCopy .'" . "\r\n" : '';

    return mail($to, $subject, $html, $headers);
}
?> 