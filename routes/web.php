<?php

use App\Http\Controllers\PageController;
use App\Http\Middleware\VerifyContentAccess;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('content.index');

});

Route::get('/debug-middleware', function () {
    return response()->json(app()->router->getMiddleware());
});

//Route::post('forms/{form}', 'Form@process');

// Route::middleware([VerifyContentAccess::class])->group(function () {

//     Route::get('/{slug}', [PageController::class, 'show'])->where('slug', '.*');

// });

Route::get('/{slug}', [PageController::class, 'show'])->where('slug', '.*');