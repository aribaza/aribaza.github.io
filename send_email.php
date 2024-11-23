<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Email recipient (your email)
    $to = "aribazaga@gmail.com"; // Replace with your email
    $from = $email; // The email from the user
    $headers = "From: $from";

    // Subject of the email
    $email_subject = "New contact form submission: $subject";

    // Email body
    $email_body = "You have received a new message from your contact form:\n\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Subject: $subject\n";
    $email_body .= "Message:\n$message\n";

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "<script>alert('Thank you for your message!'); window.location.href='contact.html';</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again later.'); window.location.href='contact.html';</script>";
    }
} else {
    echo "<script>alert('Invalid request'); window.location.href='contact.html';</script>";
}
?>
