<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ルーティング（１つ１つ）
// Route::get('stores', [ StoreController::class, 'index'])->name('stores.index');
// （'URL', [処理が渡されるコントローラー, 実施するメソッド]）->name(viewの場所);

//ルーティング（グループ化）
Route::prefix('stores')
->middleware(['auth']) //認証（ログインなしにそのページへいけないようにする）
->controller(StoreController::class)
->name('stores.')
->group(function() {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{id}', 'show')->name('show');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::post('/{id}', 'update')->name('update');
    Route::post('/{id}/destroy', 'destroy')->name('destroy');
});

// ルーティング（RESTfull）
// Route::resource('stores', StoreController::class);

Route::prefix('comments')
->middleware(['auth']) //認証（ログインなしにそのページへいけないようにする）
->controller(CommentController::class)
->name('comments.')
->group(function() {
    Route::get('/', 'index')->name('index');
    Route::get('/create/{id}', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{id}', 'show')->name('show');
    Route::post('/{id}/destroy', 'destroy')->name('destroy');
});

Route::post('/like/{storeId}',[LikeController::class,'store'])->name('like.store');
Route::post('/unlike/{storeId}',[LikeController::class,'destroy'])->name('like.destroy');

// breezeによりできたルーティングを読み込み
require __DIR__.'/auth.php';
