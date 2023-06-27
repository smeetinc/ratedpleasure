<?php 
require 'phpmailer/PHPMailerAutoload.php'; // Phpmail package already on server

if(isset($_GET['submit'])) {
    $contact_name = $_GET['contact_name'];
    $contact_email = $_GET['contact_email'];
    $contact_subject = $_GET['contact_subject'];
    $contact_msg = $_GET['contact_msg'];


    $errorEmpty = false;
    $errorEmail = false;

    if(empty($contact_name) || empty($contact_email) || empty($contact_subject) || empty($contact_msg)){
        echo "<span class='formError'>Fill in all fields!</span>";
        $errorEmpty = true;
    }
    elseif (!filter_var($contact_email, FILTER_VALIDATE_EMAIL)){
        echo "<span class='formError'>Enter a valid Email!</span>";
        $errorEmail = true;
    }
    else{
        $mail = new PHPMailer();

$mail->IsSMTP(); // telling the class to use SMTP
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->Host = "localhost"; // sets the SMTP server
$mail->Port = 25; // set the SMTP port for the GMAIL server
$mail->Username = "bayodeoluseyi@gmail.com"; // SMTP account username
$mail->Password = "l6P4x*17qUi"; // SMTP account password

$mail->SetFrom($contact_email.",".$contact_name);
$mail->AddReplyTo($contact_email.",".$contact_name);
$mail->Subject = $contact_subject;
$mail->MsgHTML($contact_email ."<br>". $contact_name ."<br>". $contact_msg);
$mail->AddAddress("bayodeoluseyi@gmail.com");
//$mail->AddAttachment(""); // attachment

if(!$mail->Send()) {
echo "<span class='formError'>Message was not sent, try again later, or send a message to help@ratedpleasure.com</span>" . $mail->ErrorInfo;
} else {
echo "<span class='formSuccess'>Thanks for contacting us. We'll be in touch</span>";
// header("Location: http://www.example.com/");
}

}
}
else{
    echo "You can't view this page";
}
?>
<script>
    $("#contact_name, #contact_email, #contact_msg").removeClass("input-error");


    var errorEmpty ="<?php echo $errorEmpty; ?>";
    var errorEmail ="<?php echo $errorEmail; ?>";

    if (errorEmpty == true) {
        $("#contact_name, #contact_email, #contact_msg").addClass("input-error");
    }
    if (errorEmail == true) {
        $("#contact_email").addClass("input-error");
    }
    if (errorEmpty == false && errorEmail == false) {
        $("#contact_name, #contact_email, #contact_msg").val("");
    }


</script>