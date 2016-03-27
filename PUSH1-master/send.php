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

    $newhtml =
        <<<NEWHTML


<!DOCTYPE html>
<html>
<head>
    <link rel="icon"
          type="image/png"
          href="assets/b&bicon.png">
    <link type="text/css" rel="stylesheet" href="style.css"/>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Confirmation Page: theB&Bhub</title>


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


                        <div class="table5">
<a href="Customerinfo.php" id="nodec"><table border="0" cellpadding="5">
<tr>
<td><strong><img src="{$row[imageurl]}" id="img3"></strong></td>
<td>
<table border="0" cellpadding="5">
<tr>
<td colspan="2">B&B Name: <strong>{$row[bbname]}</strong></td>
</tr>
<tr>
<td colspan="2">Address: <strong>{$row[address]}</strong></td>
</tr>
<tr>
<td>Location: <strong>{$row[city]}</strong></td>
<td>Postcode: <strong>{$row[postcode]}</strong></td>
</tr>
<tr>
<td>Check-in: <strong>{$row[checkin]}</strong></td>
<td>Check-out: <strong>{$row[checkout]}</strong></td>
</tr>
<tr>
<td>Pets allowed: <strong>{$row[pets]}</strong></td>
</tr>
</h6>
</table>
</td>
</tr>
</table></a>

<button style="float:right;" class="btn" onclick="panToBB($count)">ViewMap</button>

</div>

NEWHTML;
    print($newhtml);
}

?>


