#Adventure
A choose-your-own adventure/mad-libs game for CS 3800.

#Step 1: Install Laravel
1. `sudo apt-get install curl php7.0-cli`
2. `curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer`
3. `composer global require "laravel/installer"`
> IF: *Errors regarding cache and/or composer.json*
	TRY:
		`sudo chown -R $USER $HOME/.composer`
5. `laravel new adventure`
	'adventure' is both folder and application name
> IF: *RuntimeException The Zip PHP extension is not installed. Please install it and try again.*
	TRY: 
	`sudo apt-get install php7.0-zip `
7. `php artisan serve`
8. Should see the Laravel splash page at: http://localhost:8000/
9. Find `/config/app.php` file and go to line **41**. Change `'debug' => env('APP_DEBUG', false),` to `'debug' => env('APP_DEBUG', true),`
10. Find `.env` and change DB-related variables to match your development setup.

#Step 2: Create Database Schema
1. ...

#Other Resources
* ...

#Laravel 5.3 Documentation
* [Install][1]
* [Creating Database Tablesl][2]
* [Creating Views][3]
* [Creating Routes aka URLs][4]

[1]: https://laravel.com/docs/5.3
[2]: https://laravel.com/docs/5.3/migrations
[3]: https://laravel.com/docs/5.3/blade
[4]: https://laravel.com/docs/5.3/routing