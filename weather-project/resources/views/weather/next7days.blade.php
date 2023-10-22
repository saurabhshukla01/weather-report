<!DOCTYPE html>
<html>
<head>
    <title>7-Day Weather Forecast</title>
</head>
<body>
    <h1>Next 7 Days Weather Forecast</h1>
    @if (!empty($dailyForecast))
        <table>
            <tr>
                <th>Day</th>
                <th>Weather Description</th>
                <th>Temperature (°C)</th>
            </tr>
            @foreach ($dailyForecast as $day)
                <tr>
                    $timestamp = $day['dt'];
                    <td>{{ date('Y-m-d H:i:s', $timestamp) }}</td>
                    <td>{{ $day['weather'][0]['description'] }}</td>
                    <td>{{ $day['temp']['day'] }}°C</td>
                </tr>
            @endforeach
        </table>
    @else
        <p>Unable to fetch weather data.</p>
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
