<?php
$servername = "localhost";
$database = "agradata";
$username = "root";
$password = "";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

if (isset($_POST["submit"])) {
    $state = isset($_POST['State']) ? $_POST['State'] : '';
    $district = isset($_POST['District']) ? $_POST['District'] : '';
    $language = isset($_POST['Language']) ? $_POST['Language'] : '';

    $targetDir = "data/";
    $targetFile = $targetDir . basename($_FILES["pdfFile"]["name"]);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if ($fileType != "pdf" || $_FILES["pdfFile"]["size"] > 20000000) {
        echo "File is not a PDF or exceeds size limit.";
    } else {
        if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $targetFile)) {
            $fileName = $_FILES["pdfFile"]["name"];
            $folderPath = $targetDir;

            $sql = "INSERT INTO `mastertable` (`State`, `District`, `Language`, `fileName`, `folderPath`) 
                    VALUES ('$state', '$district', '$language', '$fileName', '$folderPath')";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<br>Data inserted successfully!<br>";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "Error uploading file.";
        }
    }
}
?>