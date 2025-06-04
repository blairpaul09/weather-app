# Weather App

## UI & UX
I believe the UX/UI that I've created is very straight forward and easy to understand. On inital load, it will give you the current location's weather details such as the current temperature, wind speed, humidity, visibility, sunrise and sunset time, the feels like temperature and forecasts. Having these details will help the tourist to decide and make a plan on what destination and places should they go first. I've also added a search location for user's to check the other location weather.

## Code Implementation

### Backend
I've implemented the laravel's service container as this is way more cleaner and scalable. It makes your controller clean and you can easily update the service without breaking your business logic.

### Frontend
Using types/models will make the code more understadable and easy to detect what are the fields of the specific resource. Chunking the page sections into component makes your code more readable and maintainable. Separating the api service using composable makes your component cleaner.


# Important notes
Make sure to add the open weather and geoapify api key
```
OPEN_WEATHER_API_KEY=
GEO_APIFY_API_KEY=
```
