<?php
require __DIR__ . '/../vendor/autoload.php'; // Adjust the path as necessary

header('Content-Type: application/json');

$response = array();

try {
    // Retrieve the JSON data from the request
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    // Connect to MongoDB
    $client = new MongoDB\Client("mongodb://localhost:27017");

    // Select the database and collection
    $collection = $client->guvi->profile;

    // Insert the data into the collection
    $result = $collection->insertOne($data);

    // Check if the insert was successful
    if ($result->getInsertedCount() == 1) {
        $response['message'] = 'Profile updated successfully';
    } else {
        $response['message'] = 'Failed to update profile';
    }

    echo json_encode($response);
} catch (Exception $e) {
    // Handle any errors that may have occurred
    http_response_code(500); // Internal Server Error
    $response['message'] = 'An error occurred while updating the profile';
    echo json_encode($response);
}
?>