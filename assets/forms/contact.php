<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $name = filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = filter_var(trim($_POST["subject"]), FILTER_SANITIZE_STRING);
    $message = filter_var(trim($_POST["message"]), FILTER_SANITIZE_STRING);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Prepare the email
    $to = "your-email@example.com"; // Replace with your email address
    $email_subject = "New contact form submission: $subject";
    $email_body = "You have received a new message from the contact form.\n\n" .
                  "Name: $name\n" .
                  "Email: $email\n" .
                  "Subject: $subject\n" .
                  "Message:\n$message";

    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Your message has been sent. Thank you!";
    } else {
        echo "There was a problem sending your message. Please try again.";
    }
} else {
    echo "Invalid request method.";
}
?>
