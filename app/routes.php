<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

use Carbon\Carbon;

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/question/new', function()
{
    return View::make('newQuestion');
});

Route::post('/question/new', function()
{
    $title = Input::get('title');
    $fulltext = Input::get('fulltext');
    Question::create(array('title' => $title, 'fulltext' => $fulltext));
    return 'yay';
});

Route::get('/question/{id}', function($id)
{
    $question = Question::find($id);
    return $question;
});

Route::get('/top', function()
{
    $questions = Question::all();
    /*$questions->sortBy(function($question) {
        return $question->created_at;
    });*/
    return View::make('list', array('questions' => $questions));
});

Route::get('/hot', function()
{
    $questions = Question::where('created_at', '>', Carbon::now()->subWeek())->get();
    return View::make('list', array('questions' => $questions));
});

Route::get('/register', function()
{
    return View::make('register');
})->before('guest');

Route::post('/register', function()
{
    $username =  Input::get('username');
    User::create([
        'username' => $username,
        'password' => Hash::make(Input::get('password')),
    ]);

    $user = User::where('username', '=', $username)->first();

    Auth::login($user);

    return Redirect::to('/');
});

Route::get('/login', function()
{
    return View::make('login');
})->before('guest');

Route::post('/login', function()
{
    $user = array(
        'username' => Input::get('username'),
        'password' => Input::get('password')
    );

    if (Auth::attempt($user)) {
        return Redirect::to('/');
    }

    // authentication failure! lets go back to the login page
    return Redirect::to('/login')
        ->withInput();
});

Route::get('/logout', function()
{
    Auth::logout();

    return Redirect::to('/');
})->before('auth');





