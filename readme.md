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
Should see the Laravel splash page at: http://localhost:8000/
8. Find `/config/app.php` file and go to line **41**. Change `'debug' => env('APP_DEBUG', false),` to `'debug' => env('APP_DEBUG', true),`
9. Find `.env` and change DB-related variables to match your development setup.

#Step 2: Create Database Schema
1.  Create table migrations
`php artisan make:migration create_adventure_table --create=adventure`
`php artisan make:migration create_question_table --create=question`
`php artisan make:migration create_choice_table --create=choice`
`php artisan make:migration create_story_table --create=story`
2. Refresh migrations for changes
`php artisan migrate:refresh`
3. Edit migration files to reflect desired table structure. See [Schema](#schema).
4. Edit migration files to relfect desired insert data. See [Seeds](#seeds).

#Step 3: Create Models
1. Laravel lets the developer choose where to save Model files. By default, they are placed in the App directory. My preference is to create an Apps/Models folder.
2. If you do this, remember to correctly namespace the files `namespace App\Models;` in both Models and Controllers.
3. See [Models][#models]

# Schema
## Adventure
```
Schema::create('adventure', function (Blueprint $table) {
$table->increments('id');
$table->string('description');
});
```

## Question
```
Schema::create('question', function (Blueprint $table) {
$table->increments('id');
$table->integer('adventure_id')->unsigned();
$table->string('description');
$table->foreign('adventure_id')->references('id')->on('adventure');
```
## Choice
```
Schema::create('choice', function (Blueprint $table) {
$table->increments('id');
$table->integer('question_id')->unsigned();
$table->char('code', 1);
$table->string('description');
$table->foreign('question_id')->references('id')->on('question');
```
## Story
```
Schema::create('story', function (Blueprint $table) {
$table->increments('id');
$table->integer('adventure_id')->unsigned();
$table->integer('question_id')->unsigned();
$table->integer('choice_id')->unsigned();

$table->foreign('adventure_id')->references('id')->on('adventure');
$table->foreign('question_id')->references('id')->on('question');
$table->foreign('choice_id')->references('id')->on('choice');
});
```
# Seeds
## Adventure
```
DB::table('adventure')->insert([
['id' => 1,
'description' => 'gone awry'],
]);
```
## Question
```
DB::table('question')->insert([
['id' => 1,
'adventure_id' => 1,
'description' => 'Which of the following is your preferred outdoor activity?'],
['id' => 2,
'adventure_id' => 1,
'description' => 'Which of the following items do you have in your car?'],
['id' => 3,
'adventure_id' => 1,
'description' => 'How do you react when you forget something?'],
]);
```
## Choice
```
DB::table('choice')->insert([
['id' => 1,
'question_id' => 1,
'code' => 'A',
'description' => 'hiking'],
['id' => 2,
'question_id' => 1,
'code' => 'B',
'description' => 'swimming'],
['id' => 3,
'question_id' => 1,
'code' => 'C',
'description' => 'sleeping'],
['id' => 4,
'question_id' => 2,
'code' => 'A',
'description' => 'sunglasses'],
['id' => 5,
'question_id' => 2,
'code' => 'B',
'description' => 'tissues'],
['id' => 6,
'question_id' => 2,
'code' => 'C',
'description' => 'sunscreen'],
['id' => 7,
'question_id' => 3,
'code' => 'A',
'description' => 'panic and freak out'],
['id' => 8,
'question_id' => 3,
'code' => 'B',
'description' => 'look around where you last had the item'],
['id' => 9,
'question_id' => 3,
'code' => 'C',
'description' => 'go on with life'],
]);

```
#Models
##Adventure
```
class Adventure extends Model{
   protected $table = 'adventure';
   public $timestamps = false;
   protected $fillable = [
   'description'
   ];

     public function questions(){
        return $this->hasMany('Models\Question');
    }
}
```

##Question
```
class Question extends Model{
    protected $table = 'question';
    public $timestamps = false;
    protected $fillable = [
    'adventure_id', 'description'
    ];

    public function adventure(){
        return $this->belongsTo('App\Adventure');
    }

    public function choices(){
        return $this->hasMany('Models\Choice');
    }
}
```
##Choice
```
class Choice extends Model{
   protected $table = 'choice';
   public $timestamps = false;
   protected $fillable = [
   'question_id', 'code', 'description'
   ];

   public function question(){
        return $this->belongsTo('App\Question');
    }
}
```
##Story
```
class Story extends Model{
    protected $table = 'story';
    public $timestamps = false;
    protected $fillable = [
    'adventure_id',
    'question_id',
    'choice_id',
    ];

    public function choices(){
        return $this->hasMany('Models\Choice');
    }

    public function questions(){
        return $this->hasMany('Models\Question');
    }

    public function adventures(){
        return $this->hasMany('Models\Adventure');
    }
}
```
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