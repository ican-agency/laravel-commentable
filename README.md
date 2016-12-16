# Laravel Commentable
Allows for threaded comments to be added to multiple and different models within your app for Laravel 5.

Based on now defunct Lanz/Laravel Commentable.


This package use Nested Sets pattern with [Baum](https://github.com/etrepat/baum).

[More information about Nested Sets](http://en.wikipedia.org/wiki/Nested_set_model)

# Installation
Edit your project's composer.json file to require `ican-agency/laravel-commentable`.
````
"require": {
  "ican-agency/laravel-commentable": "~1.0"
}
````

Next, update Composer from the terminal.
````
composer update
````

As with most Laravel packages you'll need to register Commentable *service provider*. In your `config/app.php` add `'Ican\Commentable\CommentableServiceProvider'` to the end of the `$providers` array.
````php
'providers' => [

    'Illuminate\Foundation\Providers\ArtisanServiceProvider',
    'Illuminate\Auth\AuthServiceProvider',
    ...
    'Ican\Commentable\CommentableServiceProvider',

],
````

# Getting started
After the package is correctly installed, you need to generate migration.
````
php artisan commentable:migration
````

It will generate the `<timestamp>_create_comments_table.php` migration. You may now run it with the artisan migrate command:
````
php artisan migrate
````

After the migration, one new table will be present, `comments`.

# Usage
You need to set on your model that it acts as commentable.
````php
<?php namespace App;

use Ican\Commentable\Commentable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use Commentable;

}
````

Now, your model has access to `comments` method.
````php
$post = Post::first();

$comment = new Ican\Commentable\Comment;
$comment->body = 'My first comment!';
$comment->user_id = \Auth::id();

$post->comments()->save($comment);

dd(Post::first()->comments);
````

For all information about threaded comment, look at the [documentation on Baum](https://github.com/etrepat/baum#usage).



