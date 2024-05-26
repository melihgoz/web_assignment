<?php
class ContactController {
    public function form() {
        require 'views/contact.php';
    }

    public function process() {
        // Include database and other necessary files
        require 'includes/server.php';
        $conn = getDB();


        // Initialize an array to store errors
        $_SESSION['errors'] = [];

        // Validate form inputs
        if (empty($_POST['name'])) {
            $_SESSION['errors'][] = "Name is required.";
        }

        if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['errors'][] = "Valid email is required.";
        }

        if (empty($_POST['message'])) {
            $_SESSION['errors'][] = "Message is required.";
        }

        // If there are errors, redirect back to the form
        if (!empty($_SESSION['errors'])) {
            header("Location: /contact.php");
            exit();
        }

        // Process the contact form (e.g., save to database, send email, etc.)
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Example: Save to database (replace with actual database code)
        $stmt = $conn->prepare("INSERT INTO contact_admin (name, email, message) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $message]);

        // Redirect to a thank you page or display a success message
        header("Location: views/contact.php?success=1");
    }
}
?>
