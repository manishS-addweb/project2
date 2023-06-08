<?php
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




Route::middleware(['web', 'admin', 'verified'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('manager/index',[AdminController::class,'index'])->name('manager.index');
    Route::get('team/index',[AdminController::class,'teamindex'])->name('team.index');
    Route::get('team/create/',[AdminController::class,'teamcreate'])->name('team.create');
    Route::post('team/create',[AdminController::class,'teamstore'])->name('team.create');
    Route::get('team/edit{id}',[AdminController::class,'editteam'])->name('team.edit');
    Route::post('team/update{id}',[AdminController::class,'updateteam'])->name('team.update');
    Route::get('/request/index', [RequestController::class, 'index'])->name('request.index');
    Route::post('/requests/approve/{id}', [RequestController::class, 'assignManager'])->name('requests.approve');
    Route::get('index/players',[PlayerController::class,'indexplayers'])->name('index.players');
    Route::get('create/players',[PlayerController::class,'createplayers'])->name('create.players');
    Route::post('store/players',[PlayerController::class,'storeplayers'])->name('store.players');
    Route::get('players/edit{id}',[PlayerController::class,'editplayers'])->name('players.edit');
    Route::post('players/update{id}',[PlayerController::class,'updateplayers'])->name('players.update');
    Route::post('players/destroy{id}',[PlayerController::class,'destroyplayers'])->name('players.destroy');
    Route::get('playerscount/index',[PlayerController::class,'playercountindex'])->name('playerscount.index');

});

Route::middleware(['web', 'manager', 'verified'])->group(function () {
    Route::get('/manager/dashboard', function () {
        return view('manager.dashboard');
    })->name('manager.dashboard');
    Route::get('index/player',[ManagerController::class,'indexplayer'])->name('index.player');
    Route::get('create/player',[ManagerController::class,'createplayer'])->name('create.player');
    Route::post('store/player',[ManagerController::class,'storeplayer'])->name('store.player');



});



require __DIR__.'/auth.php';








