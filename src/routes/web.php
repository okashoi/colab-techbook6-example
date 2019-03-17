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

Route::get('/', function () {
    $users = collect([
        ['name' => 'Alice'],
        ['name' => 'Bob'],
        ['name' => 'Carol'],
    ]);

    Debugbar::info($users);
    Debugbar::info($users->sortByDesc('name'));

    return view('welcome');
});
