# weather
 Project to get details of weather by Open Weather API class. We have used free API provied by  https://openweathermap.org/api 

 This project has basic usage of API to get weather info by city name or ID.

 But We can further develop it to get Historical weather info, Air Pollution info, GeoCoding details.

 To fetch the Weather info, We need to get the API Key from  https://openweathermap.org website.

 After getting API Key, Edit `config/openweather.php` file and modify the `api_key` value with your Open Weather Map api key.
 ```php
	return [
	    'api_key' 	        => '',
	    'lang' 		=> 'en',
	    'date_format'       => 'm/d/Y',
	    'time_format'       => 'h:i A',
	    'day_format'        => 'l',
	    'temp_format'       => 'c'         // c for celcius, f for farenheit, k for kelvin
	];
```
## Usage
Here you can see some example of just how simple this package is to use.

```php
use OpenWeather;

$wt = new OpenWeather();

$info = $wt->getCurrentByCity('name_of_city');    // Get current weather by city name


```

## License

Laravel Open Weather API is licensed under [The MIT License (MIT)](LICENSE).
