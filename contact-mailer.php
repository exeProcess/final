<?php
// Ensure the script processes only POST requests 
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(["error" => "Invalid request method"]);
    exit;
}

// Extract and validate required fields
$requiredFields = ['name', 'email', 'subject', 'message'];
foreach ($requiredFields as $field) {
    if (empty($_POST[$field])) {
        http_response_code(400); // Bad Request
        echo json_encode(["error" => "Missing field: $field"]);
        exit;
    }
}

// Sanitize input $_POST
$name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$subject = htmlspecialchars($_POST['subject'], ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');
$to = 'americanresidence435@gmail.com'; // Recipient email address

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400); // Bad Request
    echo json_encode(["error" => "Invalid email address"]);
    exit;
}

// Prepare email headers
$headers = "From: $name <$email>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// Prepare email content
$emailBody = "<h3>New Contact Message</h3>
    <p><strong>Name:</strong> $name</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Subject:</strong> $subject</p>
    <p><strong>Message:</strong> $message</p>";

// Send the email
if (mail($to, $subject, $emailBody, $headers)) {
    echo "success";
} else {
    http_response_code(500); // Internal Server Error
    echo json_encode(["error" => "Message could not be sent."]);
}

exit;
