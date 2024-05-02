<?php

session_start();

if (!isset($_SESSION['loggedadmin']) || $_SESSION['loggedadmin'] !== true) {
  header("location: admin-login.php");
}

require '../config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/style-home.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.2/tailwind.min.css">
  <link
    href="https://fonts.googleapis.com/css2?family=Edu+TAS+Beginner:wght@500&family=Pacifico&family=Teko:wght@300&display=swap"
    rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
  <title>welcome</title>
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
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M1 1h15M1 7h15M1 13h15" />
          </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
          <ul
            class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 items-center md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <li>
              <a href="#"
                class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500"
                aria-current="page">Home</a>
            </li>
            <li>
              <a href="#"
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Manage
                user</a>
            </li>
            <li>
              <a href="create.php"
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                Register user</a>
            </li>
            <li><a href="logout-admin.php">
                <button type="button"
                  class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Logout</button>
              </a></li>
          </ul>
        </div>
      </div>
    </nav>

  </section>

  <section class="m-5 min-h-96">


    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
      <ul class="flex flex-wrap -mb-px text-base font-medium text-center" id="default-tab"
        data-tabs-toggle="#default-tab-content" role="tablist">
        <li class="me-2" role="presentation">
          <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile"
            type="button" role="tab" aria-controls="profile" aria-selected="false">School</button>
        </li>
        <li class="me-2" role="presentation">
          <button
            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
            id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard"
            aria-selected="false">Driver</button>
        </li>

        <li class="me-2" role="presentation">
          <button
            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
            id="bus-tab" data-tabs-target="#bus" type="button" role="tab" aria-controls="bus"
            aria-selected="false">Bus</button>
        </li>

        <li class="me-2" role="presentation">
          <button
            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
            id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings"
            aria-selected="false">Register School</button>
        </li>
        <li role="presentation">
          <button
            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
            id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab" aria-controls="contacts"
            aria-selected="false">Register Driver</button>
        </li>

        <li role="presentation">
          <button
            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
            id="addbus-tab" data-tabs-target="#addbus" type="button" role="tab" aria-controls="addbus"
            aria-selected="false">Add bus</button>
        </li>

      </ul>
    </div>
    <div id="default-tab-content">
      <div class="hidden rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel"
        aria-labelledby="profile-tab">


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <th scope="col" class="px-6 py-3">
                  SCHOOL NAME
                </th>
                <th scope="col" class="px-6 py-3">
                  SCHOOL ID
                </th>
                <th scope="col" class="px-6 py-3">
                  ADDRESS
                </th>
                <th scope="col" class="px-6 py-3">
                  PHONE NUMBER
                </th>
                <th scope="col" class="px-6 py-3">
                  Action
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query = "SELECT * FROM school";
              $result = $conn->query($query);
              while ($row = ($result->fetch_assoc())) {
                echo
                  '
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                ' . $row['school_name'] . '
                </th>
                <td class="px-6 py-4">
                ' . $row['school_id'] . '
                </td>
                <td class="px-6 py-4">
                ' . $row['school_address'] . '
                </td>
                <td class="px-6 py-4">
                ' . $row['phone_number'] . '
                </td>
                <td class="px-6 py-4">
                  <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
              </tr>
              ';
              }
              ?>

            </tbody>
          </table>
        </div>

      </div>
      <div class="hidden rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel"
        aria-labelledby="dashboard-tab">


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <th scope="col" class="px-6 py-3">
                  DRIVER NAME
                </th>
                <th scope="col" class="px-6 py-3">
                  DRIVER ID
                </th>
                <th scope="col" class="px-6 py-3">
                  DRIVER CARD
                </th>
                <th scope="col" class="px-6 py-3">
                  PHONE NUMBER
                </th>
                <th scope="col" class="px-6 py-3">
                  Action
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query = "SELECT * FROM driver";
              $result = $conn->query($query);
              while ($row = ($result->fetch_assoc())) {
                echo
                  '
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                ' . $row['driver_name'] . '
                </th>
                <td class="px-6 py-4">
                ' . $row['driver_id'] . '
                </td>
                <td class="px-6 py-4">
                ' . $row['driving_card'] . '
                </td>
                <td class="px-6 py-4">
                ' . $row['phone_number'] . '
                </td>
                <td class="px-6 py-4">
                  <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
              </tr>
              ';
              }
              ?>

            </tbody>
          </table>
        </div>
      </div>
      <div class="hidden rounded-lg bg-gray-50 dark:bg-gray-800" id="bus" role="tabpanel" aria-labelledby="bus-tab">


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <th scope="col" class="px-6 py-3">
                  SCHOOL NAME
                </th>
                <th scope="col" class="px-6 py-3">
                  DRIVER NAME
                </th>
                <th scope="col" class="px-6 py-3">
                  BUS NUMBER
                </th>
                <th scope="col" class="px-6 py-3">
                  ORIGIN
                </th>
                <th scope="col" class="px-6 py-3">
                  DESTINATION
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query = "SELECT 
  bus_location.school_id, 
  school.school_name, 
  bus_location.driver_id, 
  driver.driver_name, 
  bus_location.bus_number, 
  origin.city_name AS origin, 
  destination.city_name AS destination
FROM bus_location 
INNER JOIN school ON bus_location.school_id = school.school_id
INNER JOIN driver ON bus_location.driver_id = driver.driver_id
INNER JOIN city AS origin ON bus_location.origin = origin.city_id
INNER JOIN city AS destination ON bus_location.destination = destination.city_id";

              $result = $conn->query($query);
              while ($row = ($result->fetch_assoc())) {
                echo
                  '
<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
  ' . $row['school_name'] . '
  </th>
  <td class="px-6 py-4">
  ' . $row['driver_name'] . ' (' . $row['driver_id'] . ')
  </td>
  <td class="px-6 py-4">
  ' . $row['bus_number'] . '
  </td>
  <td class="px-6 py-4">
  ' . $row['origin'] . '
  </td>
  <td class="px-6 py-4">
  ' . $row['destination'] . '
  </td>
  <td class="px-6 py-4">
    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
  </td>
</tr>
';
              }
              ?>

            </tbody>
          </table>
        </div>
      </div>
      <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel"
        style="background: transparent;" aria-labelledby="settings-tab">


        <form class="max-w-sm mx-auto bg-gray-200 p-5" autocomplete="off" method="post" action="school-register.php">
          <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SCHOOL NAME</label>
            <input type="text" id="school_name" name="school_name"
              class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
              required />
          </div>
          <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PHONE
              NUMBER</label>
            <input type="tel" id="school_phone" name="school_phone"
              class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
              required />
          </div>
          <div class="mb-5">
            <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              ADDRESS</label>
            <input type="text" id="address" name="address"
              class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
              required />
          </div>
          <div class="flex items-start mb-5">
            <div class="flex items-center h-5">
              <input id="terms" type="checkbox" value=""
                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                required />
            </div>
            <label for="terms" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the <a
                href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a></label>
          </div>
          <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register
            new account</button>
        </form>

      </div>
      <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts" role="tabpanel"
        style="background: transparent;" aria-labelledby="contacts-tab">

        <form class="max-w-sm mx-auto bg-gray-200 p-5" autocomplete="off" method="post" action="driver-register.php">
          <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DRIVER NAME</label>
            <input type="text" id="driver_name" name="driver_name"
              class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
              required />
          </div>
          <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PHONE
              NUMBER</label>
            <input type="tel" id="driver_phone" name="driver_phone"
              class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
              required />
          </div>
          <div class="mb-5">
            <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              DRIVING CARD NO.</label>
            <input type="text" id="driving_card" name="driving_card"
              class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
              required />
          </div>
          <div class="flex items-start mb-5">
            <div class="flex items-center h-5">
              <input id="terms" type="checkbox" value=""
                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                required />
            </div>
            <label for="terms" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the <a
                href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a></label>
          </div>
          <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register
            new account</button>
        </form>
      </div>

      <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="addbus" role="tabpanel"
        style="background: transparent;" aria-labelledby="addbus-tab">

        <form class="max-w-sm mx-auto bg-gray-200 p-5" action="add-bus.php" method="post" autocomplete="off">
          <div class="mb-5">
            <label for="school" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SCHOOL NAME
            </label>
            <select id="school" name="school"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <?php

              // Prepare SQL statement (assuming school ID is stored in a column named 'school_id')
              $sql = "SELECT school_name, school_id FROM school";

              $result = $conn->query($sql);

              // Check query results
              if ($result->num_rows > 0) {
                // Loop through results and add options
                while ($row = $result->fetch_assoc()) {
                  $school_name = $row["school_name"];
                  $school_id = $row["school_id"];
                  // Set the school ID as the option value
                  echo "<option value='$school_id'>$school_name</option>";
                }
              } else {
                echo "No schools found";
              }

              $conn->close();

              ?>
            </select>
          </div>
          <div class="mb-5">
            <label for="driver" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DRIVER NAME
            </label>
            <select id="driver" name="driver"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <?php

              // Create connection for driver database (assuming a separate database)
              $conn_driver = new mysqli("localhost", "root", "", "bus_tracking");

              // Check driver connection
              if ($conn_driver->connect_error) {
                die("Driver connection failed: " . $conn_driver->connect_error);
              }

              // Prepare SQL statement for drivers
              $sql_driver = "SELECT driver_name, driver_id FROM driver";

              $result_driver = $conn_driver->query($sql_driver);

              // Check query results for drivers
              if ($result_driver->num_rows > 0) {
                // Loop through driver results and add options
                while ($row = $result_driver->fetch_assoc()) {
                  $driver_name = $row["driver_name"];
                  $driver_id = $row["driver_id"];
                  echo "<option value='$driver_id'>$driver_name</option>";
                }
              } else {
                echo "No drivers found";
              }

              $conn_driver->close();

              ?>
            </select>
          </div>
          <div class="mb-5">
            <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              ENTER BUS NO.</label>
            <input type="text" id="bus_number" name="bus_number"
              class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
              required />
          </div>
          <?php
          function generateCityDropdown($name)
          {
            // Create connection for city database
            $conn_city = new mysqli("localhost", "root", "", "bus_tracking");

            // Check city connection
            if ($conn_city->connect_error) {
              die("City connection failed: " . $conn_city->connect_error);
            }

            // Prepare SQL statement for cities
            $sql_city = "SELECT city_name, city_id FROM city";

            $result_city = $conn_city->query($sql_city);

            // Start select element
            echo "<select id='$name' name='$name'
    class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'>";

            // Check query results for cities
            if ($result_city->num_rows > 0) {
              // Loop through city results and add options
              while ($row = $result_city->fetch_assoc()) {
                $city_name = $row["city_name"];
                $city_id = $row["city_id"];
                echo "<option value='$city_id'>$city_name</option>";
              }
            } else {
              echo "No cities found";
            }

            // End select element
            echo "</select>";

            $conn_city->close();
          }
          ?>

          <div class="mb-5">
            <label for="origin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ORIGIN</label>
            <?php generateCityDropdown("origin"); ?>
          </div>

          <div class="mb-5">
            <label for="destination"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DESTINATION</label>
            <?php generateCityDropdown("destination"); ?>
          </div>

          <div class="flex items-start mb-5">
            <div class="flex items-center h-5">
              <input id="terms" type="checkbox" value=""
                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                required />
            </div>
            <label for="terms" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the <a
                href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a></label>
          </div>
          <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register
            new account</button>
        </form>
      </div>
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
        <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
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


  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>