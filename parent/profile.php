<?php

session_start();

if (!isset ($_SESSION['loggeduser']) || $_SESSION['loggeduser'] !== true) {
    header("location: login.php");
}

require '../config.php';

$logged_email = $_SESSION['loggedemail']; // Retrieve logged-in user email

$sql = "SELECT u.parent_name, u.child_name, u.phone_number, s.school_name, u.bus_number
        FROM user u
        INNER JOIN school s ON u.school_id = s.school_id
        WHERE u.email_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $logged_email); // Bind logged-in user email

if ($stmt->execute()) {
  $stmt->bind_result($parent_name, $child_name, $phone_number, $school_name, $bus_number);
  $stmt->fetch();
  

  
  // Display or process the fetched data

} else {
  echo "Error: " . $stmt->error;
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

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">


    <link
        href="https://fonts.googleapis.com/css2?family=Edu+TAS+Beginner:wght@500&family=Pacifico&family=Teko:wght@300&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <title>welcome</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>

</head>

<body class="bg-white border-gray-200 dark:bg-gray-900">

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
                            <a href="../index.html"
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
                                class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><a href="location.php">Back</a></button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </section>
    <!-- #region -->
    <section>
        <div class="bg-white w-full flex flex-col gap-5 px-3 md:px-16 lg:px-28 md:flex-row text-[#161931]">

            <main class="w-full min-h-screen py-1 md:w-2/3 lg:w-3/4">
                <div class="p-2 md:p-4">
                    <div class="w-full px-6 pb-8 mt-8 sm:max-w-xl sm:rounded-lg">
                        <h2 class="pl-6 text-2xl font-bold sm:text-xl">Public Profile</h2>

                        <div class="grid max-w-2xl mx-auto mt-8">
                            <div class="flex flex-col items-center space-y-5 sm:flex-row sm:space-y-0">

                                <img class="object-cover w-32 h-32 p-1 rounded-full ring-2 ring-indigo-300 dark:ring-indigo-500"
                                    src="https://cdnb.artstation.com/p/assets/images/images/063/047/111/large/-.jpg?1684575391"
                                    alt="Bordered avatar">
                            </div>

                            <div class="items-center mt-8 sm:mt-8 text-[#202142]">

                                <div
                                    class="flex flex-col items-center w-full mb-2 space-x-0 space-y-2 sm:flex-row sm:space-x-4 sm:space-y-0 sm:mb-6">
                                    <div class="w-full">
                                        <label for="first_name"
                                            class="block mb-2 text-sm font-medium text-indigo-900">Parent Name</label>
                                        <input type="text" id="first_name"
                                            class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 "
                                            placeholder="Your first name" value="<?php echo $parent_name ?>" disabled readonly>
                                    </div>

                                    <div class="w-full">
                                        <label for="last_name"
                                            class="block mb-2 text-sm font-medium text-indigo-900 ">Child Name</label>
                                        <input type="text" id="last_name"
                                            class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 "
                                            placeholder="Child Name" value="<?php echo $child_name ?>" disabled readonly>
                                    </div>

                                </div>

                                <div class="mb-2 sm:mb-6">
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-indigo-900 ">Your
                                        email</label>
                                    <input type="email" id="email"
                                        class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 "
                                        placeholder="your.email@mail.com" value="<?php echo $logged_email ?>" disabled readonly>
                                </div>

                                <div class="mb-2 sm:mb-6">
                                    <label for="profession"
                                        class="block mb-2 text-sm font-medium text-indigo-900 ">School Name</label>
                                    <input type="text" id="profession"
                                        class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 "
                                        placeholder="School" value="<?php echo $school_name ?>" disabled readonly>
                                </div>

                                <div class="mb-2 sm:mb-6">
                                    <label for="school"
                                        class="block mb-2 text-sm font-medium text-indigo-900 ">Phone Number</label>
                                    <input type="text" id="phone"
                                        class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 "
                                        placeholder="phone" value="<?php echo $phone_number ?>" disabled readonly>
                                </div>
                                <div class="mb-2 sm:mb-6">
                                    <label for="bus"
                                        class="block mb-2 text-sm font-medium text-indigo-900 ">Bus Number</label>
                                    <input type="text" id="bus"
                                        class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 "
                                        placeholder="bus number" value="<?php echo $bus_number ?>" disabled readonly>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </main>
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
            <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a
                    href="#" class="hover:underline">Locateme™</a>. All Rights Reserved.</span>
        </div>
    </footer>


</body>



<script>

    var map, marker; // Declare these variables globally

    window.onload = function () {
        setInterval(fetchData, 5000); // Fetch data every 5 seconds

        async function initMap() {
            const { Map } = await google.maps.importLibrary("maps");


            // Longitude and Latitude Request
            const longitude = parseFloat(document.getElementById("longi").innerHTML);
            const latitude = parseFloat(document.getElementById("lati").innerHTML);

            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: latitude, lng: longitude },
                zoom: 14,
            });


            marker = new google.maps.Marker({
                position: { lat: latitude, lng: longitude },
                map: map,
            });
        }

        function fetchData() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'fetch.php', true);

            xhr.onload = function () {
                if (this.status == 200) {
                    var data = JSON.parse(this.responseText);
                    console.log('Latitude: ' + data[0].latitude);
                    console.log('Longitude: ' + data[0].longitude);

                    // Now you can use the data to update your HTML elements
                    document.getElementById('lati').innerHTML = data[0].latitude;
                    document.getElementById('longi').innerHTML = data[0].longitude;

                    // Update the marker's position
                    var latLng = new google.maps.LatLng(parseFloat(data[0].latitude), parseFloat(data[0].longitude));
                    marker.setPosition(latLng);
                    map.setCenter(latLng);
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

</html>