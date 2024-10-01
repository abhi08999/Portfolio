<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $comment = htmlspecialchars($_POST['comment']);

    $to = "your_email@example.com"; // Replace with your email address
    $headers = "From: $email" . "\r\n" . 
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    $email_subject = "New Message from: $name - $subject";
    $email_body = "Name: $name\nEmail: $email\n\nMessage:\n$comment";

    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Thank you for your message. We will get back to you soon!";
    } else {
        echo "Email sending failed. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
