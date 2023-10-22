<!DOCTYPE html>
<html>
<head>
    <title>Weather Forecast</title>
</head>
<body>
    <h1>Current Weather Forecast</h1>
    <h4>Enter Location</h4>
    <input type="text" id="searchInput" placeholder="Enter text and press Enter">
    <div id="result"></div>
    <div>
        <p>
            <a href="http://127.0.0.1:8000/weather-forecast">Current Weather<a>
                &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="http://127.0.0.1:8000/next-24-hours">Next 24 hours Weather<a>
                &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="http://127.0.0.1:8000/next-7-days">Next 7 Days Weather<a>
        </p>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Listen for keypress events in the input field
            $('#searchInput').keypress(function(event) {
                // Check if the key pressed is Enter (key code 13)
                if (event.which === 13) {
                    event.preventDefault(); // Prevent the form submission

                    // Get the value from the input field
                    const searchText = $(this).val();

                    // Make an AJAX request (You can replace this with your API endpoint)
                    $.ajax({
                        // url: 'your-api-endpoint',
                        url: "http://127.0.0.1:8000/weather-forecast-report", 
                        method: 'GET',
                        data: { query: searchText }, // Send the query as a parameter
                        success: function(data) {
                            // Handle the response, e.g., display it in the result container
                            $('#result').html(data);
                        },
                        error: function(xhr, status, error) {
                            // Handle errors
                            console.error(error);
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
