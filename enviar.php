<?php

$name = $_POST["firstName"] . ' ' . $_POST["lastName"];
$email = $_POST["email"];
$message = 'Job Title: ' . $_POST["jobTitle"]. "<br />";
$message .= 'Phone: ' . $_POST["phone"]. "<br />";
$message .= 'Country: ' . $_POST["country"]. "<br />";
$message .= 'Company: ' . $_POST["company"]. "<br />";
$message .= 'Employees: ' . $_POST["employees"]. "<br />";
$message .= 'Product: ' . $_POST["product"]. "<br />";
$message .= 'Comment: ' . $_POST["comment"];

$to = 'aj.alabarce@gmail.com'; //marianotribuj@gmail.com
$subject = '[Wallplot] Contacto';
$body = "<html>
	    <body>
	      <div>From: <b>" . $name . "</b></div>
	      <div>E-Mail: <b>" . $email. "</b></div>
	      <div>Message: <b>" . $message . "</b></div>
	    </body>
	    </html>";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
$headers .= 'From: Wallplot Web Contact<info@wallplot.com>' . "\r\n";
$headers .= 'Reply-To: info@wallplot.com' . "\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion();

// Guardar datos en un archivo de texto
mail($to, $subject, $body, $headers) or die('Error sending Mail'); //This method sends the mail.

header('Location: http://wallplot.com');

?>