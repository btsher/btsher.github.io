<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);

    // Validate email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Save email to a database or send an email (this example just echoes the email)
        
        // Example: You can save it to a database here
        // $stmt = $pdo->prepare("INSERT INTO subscribers (email) VALUES (:email)");
        // $stmt->execute(['email' => $email]);
        
        echo "Thank you for subscribing with the email: " . htmlspecialchars($email);
    } else {
        echo "Invalid email format.";
    }
} else {
    echo "Invalid request method.";
}
?>
