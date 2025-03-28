<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleAPI;

Route::prefix('test')->group(function () {
    Route::get('/', [ExampleAPI::class, 'index']);
    Route::post('/', [ExampleAPI::class, 'store']);
    Route::get('/{id}', [ExampleAPI::class, 'show']);
    Route::put('/{id}', [ExampleAPI::class, 'update']);
    Route::delete('/{id}', [ExampleAPI::class, 'destroy']);
});
