<?php
// Simulating fetching profile information from the server
// Replace this with actual database query to fetch user data

// Example user data (replace with actual database query)
$userData = array(
    'name' => '',
    'email' => '',
    // Add more fields as needed
);

// Simulate a delay to mimic server response time (remove this in actual implementation)
sleep(1);

// Output JSON response
header('Content-Type: application/json');
echo json_encode($userData);
?>
