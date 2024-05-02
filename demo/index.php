<!DOCTYPE html>
<html>
<head>
  <title>Real-time Tracking (Simulated)</title>
  <style>
    #map {
      height: 400px;
      width: 100%;
    }
  </style>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9BOCH9c4ZbdCgSsXZvv81b84luSPg-m8&callback=initMap" async defer></script>
</head>
<body>
  <div id="map"></div>
  <script>
    var map, marker;

    function initMap() {
      const lat = parseFloat(document.getElementById("latitude").innerHTML);
      const lng = parseFloat(document.getElementById("longitude").innerHTML);

      map = new google.maps.Map(document.getElementById("map"), {
        zoom: 14,
        center: { lat: lat, lng: lng }
      });

      marker = new google.maps.Marker({
        position: { lat: lat, lng: lng },
        map: map
      });

      updateLocation(); // Fetch data initially
      setInterval(updateLocation, 5000); // Update every 5 seconds (simulated real-time)
    }

    function updateLocation() {
      var xhr = new XMLHttpRequest();
      xhr.open('GET', 'fetch_location.php', true);
      xhr.onload = function () {
        if (this.status == 200) {
          var data = JSON.parse(this.responseText);
          const newLat = parseFloat(data.latitude);
          const newLng = parseFloat(data.longitude);

          marker.setPosition({ lat: newLat, lng: newLng });
          map.setCenter({ lat: newLat, lng: newLng });
          document.getElementById("latitude").innerHTML = newLat;
          document.getElementById("longitude").innerHTML = newLng;
        }
      };
      xhr.send();
    }
  </script>
  <p>Latitude: <span id="latitude"></span></p>
  <p>Longitude: <span id="longitude"></span></p>
</body>
</html>