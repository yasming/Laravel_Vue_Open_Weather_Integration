# Laravel_Vue_Open_Weather_Integration

This is a project to show weather for each user in the database based in the latitude and longitude with the weather update not older than 1-hour and weather information coming from OPEN WEATHER API: https://home.openweathermap.org/. Using Laravel, VueJS and cron job to save the weather in cache to optimize the performance from the api. 

## To run the local dev environment:

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
  - Run queue: `php artisan queue:listen`
- Visit api: `http://localhost`

### Frontend
- Navigate to `/frontend` folder
- Ensure nodejs v18 is active on host
- Install javascript dependencies: `npm install`
- Run frontend: `npm run dev`
- Visit frontend: `http://localhost:5173`


## Little demo about the solution and showing the ui:

https://www.loom.com/share/eda365a5b5ac4f529865c8df4d725ccf
