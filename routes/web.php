<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Notifications\TaskCompletedNotification;
use App\User;

Route::get('/', function () {
    $user = User::find(1);
    User::find(1)->notify(new TaskCompletedNotification);
    return view('welcome');
});

Route::get('MarkAsRead', function () {
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markRead');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
