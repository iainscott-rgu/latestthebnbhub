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

    <section class="container" id="banner">
    <div class="floatleft">
        <img src = "assets/bnblogocroporange.png" id="img">
    </div>
    <div class="floatright">

    </div>
    </section>

    <section class="container" id="navigation2">
    <div>
        <nav role="main">
            <ul>
                <li><a href="help.php#helpsection">Help</a></li>
                <li><a href="help.php#contactsection">Contact</a></li>
                <li><a href="B&Bregistration.php">Register</a></li>
                <li><a href="OwnerSignIn.php">Member Area</a></li>
                <li><a href="SearchBB.php">Search</a></li>
            </ul>
        </nav>
    </div>
</section>

<section class="spacer" id="spacer">
</section>

<section class="container" id="featured">
    <div class="centre">
        <p>Welcome to the Booking Confirmation Page!!!</p>
    </div>
</section>

<div class="table5">
<table border="1" cellpadding="5">
<tr>
<td colspan="3"><p>A confirmation email has been sent!</p></td>
</tr>
<tr>
<td colspan="3"><p>Here are your Booking details...</p></td>
</tr>

<tr>
<td>Booking Reference: $bookingid</td>
</tr>
<tr>
<td>B&B Name: $bbname</td>
<td>Room Name: $roomname</td>
</tr>
<tr>
<td>Booking Dates: $bookingstartdate - $bookingenddate</td>
</tr>
<tr>
<td>Check-in: $checkin</td>
<td>Check-out: $checkout</td>
<tr>
<td>Cost (incl. VAT): $cost</td>
<tr>
<td>Customer Name: $title $firstname $surname</td>
</tr>
<tr>
<td>Customer Email: $email</td>
<td>Customer Telephone: $telephone</td>
</tr>
<td>Customer Address: $address, $address2</td>
<td>City: $city</td>
<td>Postcode: $postcode</td>
</tr>
<tr>
<td colspan="3">
<a href='SearchBB.php'>Return to the Search Page</a>
</td>
</tr>
</table>

</div>

    echo "Welcome to the Booking Confirmation Page!!!<p>";
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




<section class="spacer" id="spacer">

</section>

<section class="container" id="foot">
    <div id="footernav">
        <nav role="sub">
            <ul>
                <li><a href="SearchBB.php">Search</a></li>
                <li><a href="OwnerSignIn.php">Member Area</a></li>
                <li><a href="B&Bregistration.html">Register</a></li>
                <li><a href="help.php#contactsection">Contact</a></li>
                <li><a href="help.php#helpsection">Help</a></li>
            </ul>
        </nav>
    </div>
    <p>&nbsp;</p>
    <div id="copyright">
    <hr width="100%" size="1">
    <p>Copyright. Team D Solutions.</p>
    </div>

</section>

NEWHTML;
    print($newhtml);
}

?>


