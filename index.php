<!DOCTYPE html>
<html>
<head>
    <title>Geocodificación de Dirección con MapQuest</title>
</head>
<body>
    <input type="text" id="direccion" placeholder="Ingresa una dirección">
    <button onclick="geocodeAddress()">Obtener Coordenadas</button>
    <p> <span id="latitud"></span></p>
    <p>, <span id="longitud"></span></p>

    <script>
        function geocodeAddress() {
            var direccion = document.getElementById('direccion').value;
            var apiKey = 'jyk9LXe6aoQw3G9mFy1aHiS7X7OLjvPf'; // Reemplaza con tu clave API de MapQuest
            var apiEndpoint = `https://www.mapquestapi.com/geocoding/v1/address?key=${apiKey}&location=${direccion}`;

            fetch(apiEndpoint)
                .then(response => response.json())
                .then(data => {
                    if (data.results && data.results[0] && data.results[0].locations && data.results[0].locations.length > 0) {
                        var latitud = data.results[0].locations[0].latLng.lat;
                        var longitud = data.results[0].locations[0].latLng.lng;
                        document.getElementById('latitud').textContent = latitud;
                        document.getElementById('longitud').textContent = longitud;
                    } else {
                        alert("Dirección no encontrada.");
                    }
                })
                .catch(error => console.error(error));
        }
    </script>
</body>
</html>
