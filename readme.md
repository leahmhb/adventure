#Adventure
A choose-your-own adventure/mad-libs game for CS 3800.

#Step 1: Install Laravel
1. `sudo apt-get install curl php7.0-cli`
2. `curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer`
3. `composer global require "laravel/installer"`
	* IF: *Errors regarding cache and/or composer.json*
	* TRY: `sudo chown -R $USER $HOME/.composer`
5. `laravel new adventure`
'adventure' is both folder and application name
	* IF: *RuntimeException The Zip PHP extension is not installed. Please install it and try again.*
	* TRY: `sudo apt-get install php7.0-zip `
7. `php artisan serve`
Should see the Laravel splash page at: http://localhost:8000/
8. Find `/config/app.php` file and go to line **41**. Change `'debug' => env('APP_DEBUG', false),` to `'debug' => env('APP_DEBUG', true),`
9. Find `.env` and change DB-related variables to match your development setup.

#Step 2: Create Database Schema
1.  Create table migrations
	* `php artisan make:migration create_adventure_table --create=adventure`
	* `php artisan make:migration create_question_table --create=question`
	* `php artisan make:migration create_choice_table --create=choice`
	* `php artisan make:migration create_story_table --create=story`
2. Refresh migrations for changes
	* `php artisan migrate:refresh`
3. Edit migration files to reflect desired table structure. See [Migrations](#migrations).
4. Edit migration files to relfect desired insert data. See [Migrations](#migrations).

#Step 3: Create Models
1. Laravel lets the developer choose where to save Model files. By default, they are placed in the App directory. My preference is to create an Apps/Models folder.
2. If you do this, remember to correctly namespace the files `namespace App\Models;` in both Models and Controllers.
3. See [Models](#models)

#Step 4: Create Controllers
1. Since this is a small form, only a [Base][13] controller is needed.

# Migrations
* [Adventure][5]
* [Question][6]
* [Choice][7]
* [Story][8]

# Models
* [Adventure][9]
* [Question][10]
* [Choice][11]
* [Story][12]

# Routes
* [Routes][14]

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
[5]: https://github.com/leahmhb/adventure/blob/master/database/migrations/2016_11_17_170203_create_adventure_table.php
[6]: https://github.com/leahmhb/adventure/blob/master/database/migrations/2016_11_17_170209_create_question_table.php
[7]: https://github.com/leahmhb/adventure/blob/master/database/migrations/2016_11_17_170216_create_choice_table.php
[8]: https://github.com/leahmhb/adventure/blob/master/database/migrations/2016_11_18_012339_create_story_table.php
[9]: https://github.com/leahmhb/adventure/blob/master/app/Models/Adventure.php
[10]: https://github.com/leahmhb/adventure/blob/master/app/Models/Question.php
[11]: https://github.com/leahmhb/adventure/blob/master/app/Models/Choice.php
[12]: https://github.com/leahmhb/adventure/blob/master/app/Models/Story.php
[13]: https://github.com/leahmhb/adventure/blob/master/app/Http/Controllers/Base.php
[14]: https://github.com/leahmhb/adventure/blob/master/routes/web.php
