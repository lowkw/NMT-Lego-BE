<?php

use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LegoSetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WishlistController;
use App\Models\Collection;
use App\Models\Wishlist;
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

Route::get('/privacy', [StaticPageController::class, 'privacy'])->name('privacy');
Route::get('/terms-and-conditions', [StaticPageController::class, 'terms'])->name('terms');
Route::get('/about-us', [StaticPageController::class, 'about'])->name('about');

Route::get('/', function () {
    $legoSets = legoSet::orderBy('id', 'DESC')->paginate(6);
    return view('welcome', compact(['legoSets']));
})->name('home');
//Route::get('/sets', [LegoSetController::class, 'index'])->name('sets');
//Route::get('/sets/{set}', [LegoSetController::class, 'show'])->name('sets.show');
Route::resource('sets', LegoSetController::class);

/*
|--------------------------------------------------------------------------
| Move the following routes to middleware
|--------------------------------------------------------------------------
|
Route::post('/set/add/{set}',  [LegoSetController::class, 'add'])->name('set.add');
Route::post('/set/add/wishlist/{set}',  [LegoSetController::class, 'addWishlist'])->name('set.addWishlist');
Route::post('/set/remove/wishlist/{set}',  [LegoSetController::class, 'deleteWishlist'])->name('set.deleteWishlist');
Route::post('/set/remove/{set}',  [LegoSetController::class, 'removeCollection'])->name('set.removeCollection');
Route::get('/collection',  [CollectionController::class, 'index'])->name('legoCollection.index');

Route::get('/wishlist/index', [WishlistController::class,'index'])->name('index');
Route::resource('wishlist', WishlistController::class);
Route::get('/wishlist/{id}/remove', [WishlistController::class, 'destroy'])
    ->name('wishlistRemove');
*/

//Contact Page
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/dashboard', function () {
    $user = auth()->user();
    $legoCollection = Collection::where('user_id', $user->id)->with('sets')->first();
    $userWishlists = Wishlist::where('user_id', $user->id)->get();
    $userlegoSets = $legoCollection->sets()->orderBy('id', 'DESC')->paginate(3);;
    return view('dashboard', compact(['userlegoSets', 'userWishlists']));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['auth']], function () {

    Route::post('/set/add/{set}',  [LegoSetController::class, 'add'])->name('set.add');
    Route::post('/set/add/wishlist/{set}',  [LegoSetController::class, 'addWishlist'])->name('set.addWishlist');
    Route::post('/set/remove/wishlist/{set}',  [LegoSetController::class, 'deleteWishlist'])->name('set.deleteWishlist');
    Route::post('/set/remove/{set}',  [LegoSetController::class, 'removeCollection'])->name('set.removeCollection');

    Route::get('/collection',  [CollectionController::class, 'index'])->name('legoCollection.index');

    Route::get('/wishlist', [WishlistController::class,'index'])->name('wishlist.index');
    Route::get('/wishlist/create', [WishlistController::class,'create'])->name('wishlist.create');
    Route::get('/wishlist/edit/{wishlist}', [WishlistController::class,'edit'])->name('wishlist.edit');
    Route::post('/wishlist/store', [WishlistController::class,'store'])->name('wishlist.store');
    Route::put('/wishlist/update', [WishlistController::class,'update'])->name('wishlist.update');
    //Route::resource('wishlist', WishlistController::class);
    Route::get('/wishlist/{id}/remove', [WishlistController::class, 'destroy'])
        ->name('wishlistRemove');
});

Route::get('/wishlist/{wishlist}', [WishlistController::class,'show'])->name('wishlist.show');
Route::get('/unauthorized', function () {
    return view('401');
})->name('unauthorized');

require __DIR__.'/auth.php';
