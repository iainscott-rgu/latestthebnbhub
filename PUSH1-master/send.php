<?php

$title = $_POST['title'];
$firstname = $_POST['firstname'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$roomname = $_POST['roomname'];
$bb_email = $_POST['bb_email'];
$bookingid = $_POST['bookingid'];
$bbname = $_POST['bbname'];
$bookingstartdate = $_POST['bookingstardate'];
$bookingenddate = $_POST['bookingenddate'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$cost = $_POST['cost'];
$address = $_POST['address'];
$address2 = $_POST['address2'];
$city = $_POST['city'];
$postcode = $_POST['postcode'];

require 'PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = "smtp.live.com";
$mail->Port = 25;
$mail->SMTPAuth = true;
$mail->Username = "thebnbhub@outlook.com";
$mail->Password = "Pedro123";
$mail->setFrom('thebnbhub@outlook.com');
$mail->addAddress($email);
$mail->addCC($bb_email);
$mail->Subject = 'Booking Confirmation';
//$mail->msgHTML(file_get_contents('contents.html'), dirname(testpro));
$mail->Body = 'Booking Reference: '.$bookingid."\n"
    .'B&B Name: '.$bbname."\n"
    .'Room Name :'.$roomname."\n"
    .'Booking Dates: '.$bookingstartdate.' - '.$bookingenddate."\n"
    .'Check-in: '.$checkin."\n"
    .'Check-out: '.$checkout."\n"
    .'Cost (excl VAT): '.$cost."\n"
    .'Customer Name: '.$title.' '.$firstname.' '.$surname."\n"
    .'Customer Email: '.$email."\n"
    .'Customer Telephone: '.$telephone."\n"
    .'Customer Address: '.$address.', '.$address2.', '.$city.', '.$postcode."\n";
//$mail->addAttachment('');

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Welcome to the Booking Confirmation Page!!!<p>";
    echo "A confirmation email has been sent!<p>";
    echo "Here are your Booking details...<p>";
    echo "&nbsp;<p>";
    echo "&nbsp;<p>";
    echo "Booking Reference: ".$bookingid."<p>";
    echo "B&B Name: ".$bbname."<p>";
    echo "Room Name :".$roomname."<p>";
    echo "Booking Dates: ".$bookingstartdate." - ".$bookingenddate."<p>";
    echo "Check-in: ".$checkin."<p>";
    echo "Check-out: ".$checkout."<p>";
    echo "Cost (excl VAT): ".$cost."<p>";
    echo "Customer Name: ".$title." ".$firstname." ".$surname."<p>";
    echo "Customer Email: ".$email."<p>";
    echo "Customer Telephone: ".$telephone."<p>";
    echo "Customer Address: ".$address.", ".$address2."<p>";
    echo "City: ".$city."<p>";
    echo "Postcode: ".$postcode."<p>";
    echo "&nbsp;<p>";
    echo "&nbsp;<p>";
    echo "<a href='SearchBB.php'>Return to the Search Page</a>";
}

?>


