<?php

$status = $_GET['status'] ?? '';
$message = urldecode($_GET['message'] ?? '');

// Step 1: Capture the form data
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$comments = $_POST['comments'] ?? '';

$name = htmlspecialchars(strip_tags($name));
$email = htmlspecialchars(strip_tags($email));
$comments = htmlspecialchars(strip_tags($comments));

// Step 2: Validate the form data
if (empty($name) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: contact_form.php?status=error&message=" . urlencode("Please provide a valid name and email."));
    exit;
}

// Step 3: Prepare the email
$to = "defaf91697@lofiey.com"; // Change this to your desired recipient email
$subject = "New Contact Us Message";
$message = "You have received a new message:\n\n" .
           "Name: $name\n" .
           "Email: $email\n" .
           "Comments: $comments";
$headers = "From: $email";

// Step 4: Send the email
if (mail($to, $subject, $message, $headers)) {
    header("Location: contact_form.php?status=success&message=" . urlencode("Thank you! Your message has been sent."));
} else {
    header("Location: contact_form.php?status=error&message=" . urlencode("Sorry, there was a problem sending your message. Please try again later."));
}
exit;
?>
