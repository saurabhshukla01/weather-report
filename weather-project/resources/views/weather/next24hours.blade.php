<!DOCTYPE html>
<html>
<head>
    <title>Next 24 Hours Forecast</title>
</head>
<body>
    <h1>Next 24 Hours Forecast</h1>
    @if (!empty($hourlyForecastData['hourly']))
        <table>
            <thead>
                <tr>
                    <th>Hour</th>
                    <th>Weather Description</th>
                    <th>Temperature (°C)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hourlyForecastData as $hourData)
                    <tr>
                        <td>{{ date('H:i', $hourData['dt']) }}</td>
                        <td>{{ $hourData['weather'][0]['description'] }}</td>
                        <td>{{ $hourData['temp'] }}°C</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Unable to fetch hourly forecast data.</p>
    @endif

    <div>
        <p>
            <a href="http://127.0.0.1:8000/weather-forecast">Current Weather<a>
                &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="http://127.0.0.1:8000/next-24-hours">Next 24 hours Weather<a>
                &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="http://127.0.0.1:8000/next-7-days">Next 7 Days Weather<a>
        </p>
    </div>
</body>
</html>
