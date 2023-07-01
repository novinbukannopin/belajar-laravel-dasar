<?php

use App\Http\Controllers\HelloController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/controller/hello/{name?}', [HelloController::class, 'hello']);
Route::view('/hello', 'hello', [
    'name' => "novin"
]);

Route::get('/hello-again', function () {
    return view('hello', ['name' => 'novin']);
});

Route::get('/settings', function () {
    return "settings";
});

Route::redirect('/maintenance', '/settings');

Route::fallback(function () {
    return "404 by Nityasa Dev";
});

Route::get('/hello-world', function () {
    return view('hello.world', ['name' => 'novin']);
});

Route::get('/product/{id}', function ($productId) {
    return "Product $productId";
});

Route::get('/product/{id}/items/{item}', function ($productId, $items) {
    return "Product $productId, Items $items";
});

Route::get('/users/{id?}', function ($userId = 12) {
    return "Users $userId";
});

Route::get('/category/{id}', function ($categoryId) {
    return "Category $categoryId";
})->where('id', '[0-9]+');
