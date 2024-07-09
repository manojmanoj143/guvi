<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "login";
// Create a connection
try {
    $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

    if ($conn) {
        echo 'Database connected successfully';
    } else {
        echo 'SQL not connected';
        die("Error: " . mysqli_connect_error());
    }
} catch (Exception $e) {
    echo "Caught exception: " . $e->getMessage();
}
?>
