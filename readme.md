<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Maxab Book schedule task

### Setup
* inside project directory run `composer install`
* copy .env.example tto .env `cp .env.example .env`
* generate Application Key `php artisan key:generate`
* Run testing `./vendor/bin/phpunit`
* to start project `php artisan serv`

	
### Usage
* Web Service URL `localhost:8000/api/book-schedule`
* Web Service Method `post`
* Web Service Query Inputs
	- `starting_date` __Date__  start date  `2019-10-09`
	- `days_in_week` __Array__ days in week 1 starturday 6 friday `[6,4]`
	- `required_sessions` __integer__ sessions required to finish one chapter `6`


* Response Example:

	``` javascript
        {
            "2019-10-05 - 2019-10-11": {
                "Wednesday": "2019-10-09",
                "Friday": "2019-10-11"
            },
            "2019-10-12 - 2019-10-18": {
                "Friday": "2019-10-18",
                "Wednesday": "2019-10-16"
            },
            "2019-10-19 - 2019-10-25": {
                "Friday": "2019-10-25",
                "Wednesday": "2019-10-23"
            },
            "2019-10-26 - 2019-11-01": {
                "Friday": "2019-11-01",
                "Wednesday": "2019-10-30"
            },
            "2019-11-02 - 2019-11-08": {
                "Friday": "2019-11-08",
                "Wednesday": "2019-11-06"
            },
            "2019-11-09 - 2019-11-15": {
                "Friday": "2019-11-15",
                "Wednesday": "2019-11-13"
            },
            "2019-11-16 - 2019-11-22": {
                "Friday": "2019-11-22",
                "Wednesday": "2019-11-20"
            },
            "2019-11-23 - 2019-11-29": {
                "Friday": "2019-11-29",
                "Wednesday": "2019-11-27"
            },
            "2019-11-30 - 2019-12-06": {
                "Friday": "2019-12-06",
                "Wednesday": "2019-12-04"
            },
            "2019-12-07 - 2019-12-13": {
                "Friday": "2019-12-13",
                "Wednesday": "2019-12-11"
            }
        }

	```


## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
