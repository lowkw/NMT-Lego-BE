<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LegoSetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;
use App\Models\legoSet;

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
    $legoSets = legoSet::orderBy('id', 'DESC')->paginate(6);
    return view('welcome', compact(['legoSets']));
})->name('home');
//Route::get('/sets', [LegoSetController::class, 'index'])->name('sets');
//Route::get('/sets/{set}', [LegoSetController::class, 'show'])->name('sets.show');
Route::resource('sets', LegoSetController::class);
Route::post('/set/add/{set}',  [LegoSetController::class, 'add'])->name('set.add');
Route::post('/set/add/wishlist/{set}',  [LegoSetController::class, 'addWishlist'])->name('set.addWishlist');
Route::post('/set/remove/wishlist/{set}',  [LegoSetController::class, 'deleteWishlist'])->name('set.deleteWishlist');
Route::post('/set/remove/{set}',  [LegoSetController::class, 'removeCollection'])->name('set.removeCollection');
Route::get('/collection',  [CollectionController::class, 'index'])->name('legoCollection.index');

Route::get('/wishlist/index', [WishlistController::class,'index'])->name('index');
Route::resource('wishlist', WishlistController::class);
Route::get('/wishlist/{id}/remove', [WishlistController::class, 'destroy'])
    ->name('wishlistRemove');

//Contact Page
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
