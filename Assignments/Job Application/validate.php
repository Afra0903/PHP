<?php

$errors = [];

// Fetching form values 

$fullname = trim($_POST['fullname']);
$email = trim($_POST['email']);
$contact = trim($_POST['contact']);
$dob = $_POST['dob'];
$position = $_POST['position'];
$coverletter = trim($_POST['coverletter']);
$linkedin = trim($_POST['linkedin']);
$experience = $_POST['experience'];
$skills = $_POST['skills'] ?? [];

// Empty field validation 

if ($fullname == "") $errors[] = "Full Name is required.";
if ($email == "") $errors[] = "Email Address is required.";
if ($contact == "") $errors[] = "Contact Number is required.";
if ($dob == "") $errors[] = "Date of Birth is required.";
if ($position == "") $errors[] = "Position must be selected.";
if ($coverletter == "") $errors[] = "Cover Letter is required.";
if ($linkedin == "") $errors[] = "LinkedIn profile is required.";
if ($experience === "") $errors[] = "Work experience is required.";
if (empty($skills)) $errors[] = "Please select at least one skill.";

// Email validation 

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format.";
}

// Contact number validation

if (!preg_match("/^[0-9]{10}$/", $contact)) {
    $errors[] = "Contact number must be 10 digits.";
}

// Resume validation 

if (isset($_FILES['resume']) && $_FILES['resume']['error'] == 0) {
    $fileExt = strtolower(pathinfo($_FILES['resume']['name'], PATHINFO_EXTENSION));
    if ($fileExt != "pdf") {
        $errors[] = "Resume must be a PDF file.";
    }
} else {
    $errors[] = "Resume upload is required.";
}

// Display results

if (!empty($errors)) {
    echo "<h3>Form Submission Errors</h3>";
    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>";
} else {
    echo "<h2>Application Submitted Successfully!</h2>";
    echo "<p>Thank you, Your application has been received.</p>";
}

?>
