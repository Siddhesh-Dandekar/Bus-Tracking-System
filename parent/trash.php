<?php

session_start();

if (!isset($_SESSION['loggeduser']) || $_SESSION['loggeduser'] !== true) {
    header("location: login.php");
}

require '../config.php';

$loggedemail = $_SESSION['loggedemail'];
$query = "SELECT school_id, bus_number FROM user WHERE email_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $loggedemail); // "s" means string. Adjust this according to your data type.
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $school_id = $row["school_id"];
        $bus_number = $row["bus_number"];

        // Now fetch the driver_id using the school_id and bus_number
        $query2 = "SELECT driver_id FROM bus_location WHERE school_id = ? AND bus_number = ?";
        $stmt2 = $conn->prepare($query2);
        $stmt2->bind_param("ss", $school_id, $bus_number); // "ss" means two strings. Adjust this according to your data types.
        $stmt2->execute();
        $result2 = $stmt2->get_result();
        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) {
                $driver_id = $row2["driver_id"];

                // Now fetch the driver_name, phone_number, and driving_card using the driver_id
                $query3 = "SELECT driver_name, phone_number, driving_card FROM driver WHERE driver_id = ?";
                $stmt3 = $conn->prepare($query3);
                $stmt3->bind_param("s", $driver_id); // "s" means string. Adjust this according to your data type.
                $stmt3->execute();
                $result3 = $stmt3->get_result();
                if ($result3->num_rows > 0) {
                    while ($row3 = $result3->fetch_assoc()) {
                        $driver_name = $row3["driver_name"];
                        $phone_number = $row3["phone_number"];
                        $driving_card = $row3["driving_card"];
                    }
                } else {
                    echo "No driver found with this driver ID";
                }
                $stmt3->close();
            }
        } else {
            echo "No driver found for this school and bus number";
        }
        $stmt2->close();
    }
} else {
    echo "No user found with this email";
}
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Edu+TAS+Beginner:wght@500&family=Pacifico&family=Teko:wght@300&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <title>welcome</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>


</head>

<body>

    <section>
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"
                        style="font-family: 'Pacifico', cursive;">locateme</span>
                </a>
                <button data-collapse-toggle="navbar-default" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                    <ul
                        class="font-medium flex flex-col items-center p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="#"
                                class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500"
                                aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact
                                us</a>
                        </li>
                        <li>
                            <a href="logout.php"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Logout</a>
                        </li>

                        <li><button type="button"
                                class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><a
                                    href="profile.php">Profile</a></button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </section>


    <section>

        <div class="content-box">
            <div class="map-cl">
                <div id="map" style="position: sticky;right: 0;bottom: 0;min-width: 100%;min-height: 100%;">
                </div>
            </div>
        </div>
        <script async
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9BOCH9c4ZbdCgSsXZvv81b84luSPg-m8&callback=initMap"></script>

    </section>


    <section class="mx-8 sm:mx-8 md:mx-8 lg:mx-52">


        <div
            class="grid mb-8 border-2 border-gray-500 rounded-lg shadow-sm dark:border-gray-700 md:mb-2 md:grid-cols-3 bg-white dark:bg-gray-800">
            <figure
                class="flex flex-col items-start justify-center p-4 text-center bg-white border-b border-gray-500 rounded-t-lg md:rounded-t-none md:rounded-ss-lg md:border-e dark:bg-gray-800 dark:border-gray-700">
                <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-4 dark:text-gray-400">
                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">Driver Details</h3>
                </blockquote>
                <figcaption class="flex items-center justify-center ">
                    <img class="rounded-full w-12 h-12" src="https://cdn-icons-png.flaticon.com/512/8583/8583437.png"
                        alt="profile picture">
                    <div class=" space-y-0.5 font-medium dark:text-white text-left rtl:text-right ms-3">
                        <div class="text-lg"><?php echo "Name: " . $driver_name . "<br>"; ?></div>
                        <div class="text-base text-dark dark:text-gray-400 ">
                            <?php echo "Driving Card: " . $driving_card; ?>
                        </div>
                        <div class="text-base text-dark dark:text-gray-400 ">
                            <?php echo "Phone Number: " . $phone_number . "<br>"; ?>
                        </div>
                    </div>
                </figcaption>
            </figure>
            <figure
                class="flex flex-col items-start justify-center p-4 text-center bg-white border-r border-gray-500 md:dark:bg-gray-800 border-0 border-b border-gray-500 dark:border-gray-700">
                <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-4 dark:text-gray-400">
                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">Bus Cordinates
                    </h3>
                </blockquote>
                <figcaption class="flex items-center justify-center ">
                    <img class="rounded-full w-12 h-12"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfFTJ65x9MPL0SlfvACDv_02QxoIMyAiVmtw&usqp=CAU"
                        alt="profile picture">
                    <div class="space-y-0.5 font-medium dark:text-white text-left rtl:text-right ms-3">
                        <div class="text-base text-dark dark:text-gray-400 ">Address: <strong id="address"></strong>
                        </div>
                        <div class="text-base text-dark dark:text-gray-400 ">Latitude: <strong id="lati"></strong></div>
                        <div class="text-base text-dark dark:text-gray-400 ">Longitude: <strong id="longi"></strong>
                        </div>
                    </div>
                </figcaption>
            </figure>
            <figure
                class="flex flex-col items-start justify-center p-4 text-center bg-white border-gray-500 rounded-b-lg md:rounded-se-lg dark:bg-gray-800 dark:border-gray-700">
                <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-4 dark:text-gray-400">
                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">Device Battery</h3>

                </blockquote>
                <figcaption class="flex items-center justify-center ">
                    <img class="rounded-full w-12 h-12"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmjN8SXnCmIuxJvS962gqBZE2E6EQcC3WuGz6pOmXINkdNSpaJJRFLNcC0A-6xKN_cT3g&usqp=CAU"
                        alt="profile picture">
                    <div class="space-y-0.5 font-medium dark:text-white text-left rtl:text-right ms-3">
                        <div class="text-lg">Charging</div>
                        <div class="text-base text-gray-500 dark:text-gray-400">Percentage: 58%</div>
                    </div>
                </figcaption>
            </figure>
        </div>

    </section>
    <footer class="bg-white shadow dark:bg-gray-900">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="#" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                    <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"
                        style="font-family: 'Pacifico', cursive;">locateme</span>
                </a>
                <ul
                    class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">About</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Contact</a>
                    </li>
                </ul>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="#"
                    class="hover:underline">Locateme™</a>. All Rights Reserved.</span>
        </div>
    </footer>

    <script>

        var map, marker; // Declare these variables globally

        window.onload = function () {
            setInterval(fetchData, 1000); // Fetch data every 5 seconds

            async function initMap() {
                const { Map } = await google.maps.importLibrary("maps");


                // Longitude and Latitude Request
                const longitude = parseFloat(document.getElementById("longi").innerHTML);
                const latitude = parseFloat(document.getElementById("lati").innerHTML);

                map = new google.maps.Map(document.getElementById("map"), {
                    center: { lat: latitude, lng: longitude },
                    zoom: 14,
                });
                
                const busIcon = {
                        url: "https://img.icons8.com/isometric/100/bus.png", 
                        scaledSize: new google.maps.Size(40, 40),
                        anchor: new google.maps.Point(15, 15)
                    };


                marker = new google.maps.Marker({
                    position: { lat: latitude, lng: longitude },
                    map: map,
                    icon: busIcon
                });
            }

            function fetchData() {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'fetch.php', true);

                xhr.onload = function () {
                    if (this.status == 200) {
                        var data = JSON.parse(this.responseText);
                        console.log('Latitude: ' + data[0].bus_latitude);
                        console.log('Longitude: ' + data[0].bus_longitude);

                        // Now you can use the data to update your HTML elements
                        document.getElementById('lati').innerHTML = data[0].bus_latitude;
                        document.getElementById('longi').innerHTML = data[0].bus_longitude;

                        // Update the marker's position
                        var latLng = new google.maps.LatLng(parseFloat(data[0].bus_latitude), parseFloat(data[0].bus_longitude));
                        marker.setPosition(latLng);
                        map.setCenter(latLng);

                        // Reverse Geocoding
                        // Reverse Geocoding
                        var geocoder = new google.maps.Geocoder;
                        geocoder.geocode({ 'location': latLng }, function (results, status) {
                            if (status === 'OK') {
                                if (results[0]) {
                                    var fullAddress = results[0].formatted_address;
                                    var addressArray = fullAddress.split(',');
                                    var pinCodePattern = /\d{5,6}/;

                                    // Remove the first line of the address
                                    addressArray.shift();

                                    // Remove the pin code from the last line of the address
                                    var lastLine = addressArray[addressArray.length - 1];
                                    lastLine = lastLine.replace(pinCodePattern, '').trim();
                                    addressArray[addressArray.length - 1] = lastLine;

                                    var modifiedAddress = addressArray.join(',');

                                    console.log('Modified Address: ' + modifiedAddress);
                                    document.getElementById('address').innerHTML = modifiedAddress;
                                } else {
                                    window.alert('No results found');
                                }
                            } else {
                                window.alert('Geocoder failed due to: ' + status);
                            }
                        });

                    }
                }

                xhr.send();
            }


            // Call the initMap function
            initMap();

            // Call the fetchData function
            fetchData();
        }


    </script>



</body>






</html>