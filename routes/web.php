<?php

use Mail;
use App\Mail\OrderBevestiging;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/products/add', function () {
    return view('products.add');
});

Route::resource('products', ProductController::class);

Route::resource('orders', OrderController::class);
Route::get('send-mail', function () {
    $details = [

        'title' => 'Mail from ItSolutionStuff.com',

        'body' => 'This is for testing email using smtp'

    ];
    \Mail::to('matthewgroenendijk@icloud.com')->send(new OrderBevestiging());
    dd("Email is Sent.");
});
