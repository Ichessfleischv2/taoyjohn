<?php
// ⚠️ Replace this with your actual Discord webhook URL
$webhook = "https://discord.com/api/webhooks/1429666785904300206/GCT8UyWRTD9_VUojndVXgJpVPdCvIUxYiaWtHnFz-gVdbw6PR6zQBrrsy4M_ZMzqevKT";

// Get form data
$name = $_POST['name'];
$age = $_POST['age'];
$address = $_POST['address'];
$email = $_POST['email'];
$course = $_POST['course'];
$year = $_POST['year'];

// Prepare message for Discord
$data = [
    "content" => "**New Registration Form Submission**",
    "embeds" => [[
        "title" => "Registration Details",
        "color" => 3447003,
        "fields" => [
            ["name" => "Full Name", "value" => $name],
            ["name" => "Age", "value" => $age],
            ["name" => "Address", "value" => $address],
            ["name" => "Email", "value" => $email],
            ["name" => "Course", "value" => $course],
            ["name" => "Year Level", "value" => $year]
        ]
    ]]
];

// Send to Discord
$options = [
    "http" => [
        "header"  => "Content-type: application/json",
        "method"  => "POST",
        "content" => json_encode($data),
    ],
];

$context  = stream_context_create($options);
$result = file_get_contents($webhook, false, $context);

if ($result) {
    echo "<script>alert('Registration sent successfully!'); window.location.href='index.html';</script>";
} else {
    echo "<script>alert('Something went wrong!'); window.location.href='index.html';</script>";
}
?>
