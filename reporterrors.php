<?php
// SEVERELY BROKEN PLEASE FIX

require_once 'php/config.php';

require_once 'php/includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

	extract($_POST);

	// $mail = new PHPMailer;

	// // $mail->isSMTP();                                      // Set mailer to use SMTP
	// // $mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
	// // $mail->SMTPAuth = true;                               // Enable SMTP authentication
	// // $mail->Username = 'user@example.com';                 // SMTP username
	// // $mail->Password = 'secret';                           // SMTP password
	// // $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

	// $mail->From = $email;
	// $mail->FromName = 'Robotics';
	// $mail->addAddress('mluo20@pascack.org');     // Add a recipient
	// $mail->addAddress('bbuckley20@pascack.org');               // Name is optional

	// $mail->WordWrap = 50;                                 // Set word wrap to 50 characters                               // Set email format to HTML

	// $mail->Subject = 'Issue: ' . $issue;
	// $mail->Body    = $description;

	// if(!$mail->send()) {
	//     echo 'Message could not be sent.';
	//     echo 'Mailer Error: ' . $mail->ErrorInfo;
	// } else {
	//     echo 'Message has been sent';
	// }

	// $to  = 'mluo20@pascack.org';
	// // $to .= 'bbuckley20@pascack.org';
	// $subject = 'Error message: ' . $issue;
	// $message = wordwrap($description, 70);
	// $headers = 'From: ' . $email;

	// if (mail ($to, $subject, $message, $headers)) { 
 //        echo '<p>Your message has been sent!</p>';
 //    } else { 
 //        echo '<p>Something went wrong, go back and try again!</p>'; 
 //    }

}
?>

<h1>Report Errors</h1>

<p>Is there a problem with the website that we need to fix but you can't contact us? Contact the the makers via this form below</p>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

	<div class="row form-row">
		<label for="email">Your email: </label>
		<input type="email" name="email" id="email" class="u-full-width" required>
		<label for="issue">Issue (Subject): </label>
		<input type="text" name="issue" id="issue" class="u-full-width" required>
		<label for="description">Please describe the issue:</label>
		<textarea name="description" id="description" class="u-full-width" required></textarea>
	</div>	
	<div class="row form-row">
		<button type="submit" class="u-pull-right">Send</button>
	</div>
	
</form>

<?php
require_once 'php/includes/footer.php'
?>