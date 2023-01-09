# Flights Management App

## In Flights Management App you can do:

- See all flights
- Check new timezone for all flights and see new time
- Add new flight
- See all airports
- Search throw all airport
- Modify flight details
- Delete flight
- View one flight details and check different timezone and time


## Built With

HTML, CSS, Laravel and MySQL database.


## Setup

1. Download or clone the repository
```sh
git clone VitaZil/Flight_management_system
```

2. In a project root directory run composer
```sh
composer install
```

3. Change file '.env.example' name to '.env' and add your database credentials(database username, password)


4. To create all the necessary tables and columns, run the following
```sh
php artisan migrate
```

5. Generate your application encryption key using `php artisan key:generate`.

6. Import airport data from https://datahub.io/core/airport-codes (.csv file) to airports table


7. Start localhost from terminal
```sh
php artisan serve
```

