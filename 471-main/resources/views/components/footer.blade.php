<footer style="background: #f1f1f1; padding: 10px; text-align: center;">
    @php
        $weather = \App\Http\Controllers\WeatherController::getWeather();
    @endphp
    
    @if($weather && isset($weather['city']) && isset($weather['temp']) && isset($weather['desc']))
        <p>Weather in {{ $weather['city'] }}: {{ $weather['temp'] }}°C, {{ $weather['desc'] }}</p>
    @else
        <p>Weather information unavailable</p>
    @endif
</footer>