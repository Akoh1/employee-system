# employee-system

A web app to manage employee record in an organization



## Installation
clone the Repository

```bash
git clone https://github.com/Akoh1/employee-system.git
```
Switch to the repo folder

```bash
cd employee-system
```

Install all the dependencies using composer

```bash
composer install
```
Copy the example env file and make the required configuration changes in the .env file

```bash
cp .env.example .env
```
Generate a new application key

```bash
php artisan key:generate
```

Run the database migrations (Set the database connection in config/database.php before migrating)

```bash
php artisan migrate
```

Start the local development server
```bash
php artisan serve
```


## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)
