<?php

// supporting files
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

// controller
use App\Http\Controllers\FlowerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// basic routing into Main page
Route::get('/', function () {
    $data = [
        'body' => [
            'title' => 'Basic Routing (Main Page)',
            'uri' => url()->current(),
            'comment' => 'This is a basic routing that check where the data come from by invoking URL().'
        ]
    ];

    return view('component')->with('body', $data['body']);
});

// basic routing into Other page
Route::get('/other', function () {
    $data = [
        'body' => [
            'title' => 'Basic Routing (Other Page)',
            'uri' => url()->current(),
            'comment' => 'This is a basic routing that check where the data come from by invoking URL().'
        ]
    ];

    return view('component')->with('body', $data['body']);
});

// route parameters
Route::get('/route/name/{name}', function($name) {
    $data = [
        'body' => [
            'title' => 'My name is ' . $name,
            'uri' => url()->current(),
            'comment' => 'This is a route parameter by specifying name in URL parameter.'
        ]
    ];

    return view('component')->with('body', $data['body']);
});

// routing parameter with default value
Route::get('/route/age/{age?}', function($age = 18) {
    $data = [
        'body' => [
            'title' => 'My age is ' . $age,
            'uri' => url()->current(),
            'comment' => 'This is a route parameter by specifying age in URL parameter with default value.'
        ]
    ];

    return view('component')->with('body', $data['body']);
});

// naming routes
Route::get('/naming', function() {
    $data = [
        'body' => [
            'title' => 'The name of the route is ' . Request::route()->getName(),
            'uri' => url()->current(),
            'comment' => 'This is a naming route where outputing the current name of the route using Request class.'
        ]
    ];

    return view('component')->with('body', $data['body']);
})->name('naming-route');

/*
|--------------------------------------------------------------------------
| Experimenting Code
|--------------------------------------------------------------------------
|
*/

// run a route using MVC technique
Route::get('/flower/{name?}', [FlowerController::class, 'set_flower'])->name('visit-flower-page');

// basic routing using multiple parameters
Route::get('/flower-package/{name?}/{soil_weight?}/{vase_color?}', [FlowerController::class, 'full_package'])->name('buy-full-package');

// restricted route parameters
Route::get('/flower/buy/{name}/{amount}', [FlowerController::class, 'show_amount'])->name('route-constraint')
    ->where([
        'name' => '[a-zA-z]+',
        'amount' => '[0-9]+'
    ]);
