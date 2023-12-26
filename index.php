<?php
// MySQL Connection
$servername = "localhost";
$database = "agradata";
$username = "root";
$password = "";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn->connect_error){
  die("Connection Failed:". $conn->connect_error);
}
$sql = "SELECT * FROM mastertable";
$result = mysqli_query($conn, $sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="dist\output.css">
    <link href="https://reliancefoundation.org/o/rfoundation-theme/images/favicon.ico" rel="icon">
</head>
<body class="">
<!-- Navbar -->
<nav class="px-44 h-18 py-2 bg-primaryColor border-b-4 flex justify-between items-center ">
    <div class="items-center">
        <img src="logo.png" alt="" class="w-40 h-14 rounded-md">
    </div>
    <div class="px-4 py-2 rounded bg-secondoryColor text-white hover:bg-btncolor hover:ease-in hover:duration-75">
        <a href="index1.php" target="_blank">Admin</a>
    </div>
</nav>


<!-- Search Bar and Button -->
<div class="container flex gap-4 px-44 py-8">   
    <div class="weather-input w-[550px] rounded">
        <input class="city-input h-[46px] w-[100%] outline-none text-lg px-0 py-3 mt-2 mb-7 border-2 border-solid focus:px-4 focus:border-2 focus:border-btncolor rounded-lg" type="text" placeholder="  Enter a City Name">
        <button class="search-btn w-full py-3 px-0 cursor-pointer outline-none border-none rounded bg-secondoryColor text-white text-base hover:bg-btncolor hover:ease-in hover:duration-75" type="button">Search</button>
    </div>
    <div class="weather-data w-full">
        <div class="current-weather text-white bg-secondoryColor rounded-md flex justify-between py-5 pr-16 pl-5 drop-shadow-2xl hover:bg-btncolor ease-in duration-100">
            <div class="details">
                <h2 class="text-2xl font-bold">Location  Date </h2>
                <h6>Temperature:  °C</h6>
                <h6>Wind:  M/S</h6>
                <h6>Humidity: %</h6>
            </div>
        </div>
    </div>
</div>


<!-- 5 Days Forecast Cards-->
<div class="px-44"> 
    <div>
        <div class="days-forecast">
            <h2 class="mb-5 text-2xl font-bold">5-Day Forecast</h2>
            <ul class="weather-cards flex gap-5">
                <!-- Repeat this block for each forecast day -->
                <li class="card text-white bg-secondoryColor hover:bg-btncolor ease-in duration-100 px-5 py-4 w-52 h-56 list-none rounded-lg drop-shadow-2xl ">
                    <h3  class="text-xl"> Date </h3>
                    <h6>Temp: C</h6>
                    <h6>Wind:  M/S</h6>
                    <h6>Humidity: %</h6>
                </li>
                <!-- Repeat this block for each forecast day -->
                <li class="card text-white bg-secondoryColor hover:bg-btncolor ease-in duration-100 px-5 py-4 w-52 h-56 list-none rounded-lg drop-shadow-2xl ">
                    <h3  class="text-xl"> Date </h3>
                    <h6>Temp: C</h6>
                    <h6>Wind:  M/S</h6>
                    <h6>Humidity: %</h6>
                </li>
                <li class="card text-white bg-secondoryColor hover:bg-btncolor ease-in duration-100 px-5 py-4 w-52 h-56 list-none rounded-lg drop-shadow-2xl ">
                    <h3  class="text-xl"> Date </h3>
                    <h6>Temp: C</h6>
                    <h6>Wind:  M/S</h6>
                    <h6>Humidity: %</h6>
                </li>
                <li class="card text-white bg-secondoryColor hover:bg-btncolor ease-in duration-100 px-5 py-4 w-52 h-56 list-none rounded-lg drop-shadow-2xl ">
                    <h3  class="text-xl"> Date </h3>
                    <h6>Temp: C</h6>
                    <h6>Wind:  M/S</h6>
                    <h6>Humidity: %</h6>
                </li>
                <li class="card text-white bg-secondoryColor hover:bg-btncolor ease-in duration-100 px-5 py-4 w-52 h-56 list-none rounded-lg drop-shadow-2xl ">
                    <h3  class="text-xl"> Date </h3>
                    <h6>Temp: C</h6>
                    <h6>Wind:  M/S</h6>
                    <h6>Humidity: %</h6>
                </li>
            </ul>
        </div>
    </div>
</div>


<!-- Agro Advisory -->
<div class="mt-5">
    <h2 class="text-2xl font-bold px-44">Download Weather Data Pdf</h2>
</div>

<div class="container px-44">
    <div class="responsive">
        <table class="w-full text-sm text-left rtl:text-right">
            <thead class="text-xs">
                <tr>
                    <th scope="col" class="px-6 py-3">Serial Number</th>
                    <th scope="col" class="px-6 py-3">File Name</th>
                    <th scope="col" class="px-6 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    $count = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='border-t border-gray-200'>";
                        echo "<td class='px-6 py-3'>" . $count . "</td>";
                        echo "<td class='px-6 py-3'>" . $row['fileName'] . "</td>";
                        echo '<td class="px-16 py-3 text-center">
                                  <a href="data/' . $row['fileName'] . '" class="btn btn-success" target="_blank">
                                      <i class="fa fa-file-pdf-o"></i> View PDF
                                  </a>
                                  <a href="data/' . $row['fileName'] . '" class="btn py-2 px-5 cursor-pointer outline-none border-none rounded bg-secondoryColor text-white text-base hover:bg-btncolor hover:ease-in hover:duration-75 inline-block" download>
                                      Download
                                  </a>
                              </td>';
                        echo "</tr>";
                        $count++;
                    }
                } else {
                    echo "<tr><td colspan='3' class='px-6 py-3'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


<!-- Copyright footer -->
<div class="bg-footerColor h-16 w-full mt-12 text-center py-4 text-xl">
    <div class="text-footerText text-lg font-bold">© December 2023. All rights reserved. Terms & Conditions. Privacy Policy.</div>
    <div class="text-footerText text-lg font-bold">© By Debarjun Chakraborty - Mumbai University - BSc Computer Science.</div>
</div>

            <script src="./index.js"></script>
</body>
</html>