<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\{RegisterController,CustomerController};

Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});


Route::controller(CustomerController::class)->group(function(){
    Route::group(['prefix' => 'customers','middleware' => 'auth:sanctum'], function () {
        Route::post('get/{dni_email}', 'show');
        Route::post('save', 'store');
        Route::delete('delete/{dni}', 'destroy');
    });
});

Route::get('error', function (){
    return ['error'=>'Unauthorised'];
})->name('error');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
