# Laravel-Vue-Weather-App

In order to get the weather api to work, you will need API key from [Weather API](https://weatherapi.com). Signup to obtain API KEY


<img src="https://github.com/ket-c/laravel-vue-weather-app/blob/main/Screenshot%202023-03-05%20at%2011.46.18%20AM.png" width="100%"/>
 <img src="https://github.com/ket-c/laravel-vue-weather-app/blob/main/Screenshot%202023-03-05%20at%2011.46.05%20AM.png" width="100%"/>




## Installation

### API
- Navigate to `/api` folder
- Ensure version docker installed is active on host
- Copy .env.example: `cp .env.example .env`
- Start docker containers `docker compose up` (add `-d` to run detached)
- Connect to container to run commands: `docker exec -it fullstack-challenge-app-1 bash`
  - Make sure you are in the `/var/www/html` path
  - Install php dependencies: `composer install`
  - Setup app key: `php artisan key:generate`
  - Migrate database: `php artisan migrate` 
  - Seed database: `php artisan db:seed`
  - Run tests: `php artisan test`
  - Run app: `php artisan serve`
- Visit api: `http://localhost`
-Run Scheduler : ```php artisan schedule:work ```
    - Or you can manually run ```php artisan weather:refresh```
    - Run queue eg. ```php artisan queue:work --max-time=300```

Add these to you **.env** file, and replace **{KEY}** with your api key obtained from [Weather API](https://weatherapi.com)
```
WEATHER_BASE_ENDPOINT= 'https://api.weatherapi.com/v1/'
```

```
WEATHER_API_KEY="{KEY}"
```

### Frontend
- Navigate to `/frontend` folder
- Replace **http://127.0.0.0:8000** in ```/src/components/ApiTest.vue``` with the domain and host of the API
- Install javascript dependencies: `npm install`
- Run frontend: `npm run dev`
- Visit frontend: `http://localhost:5173`
