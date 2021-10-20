<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckTokenAccess;

Route::group(['prefix' => 'cliente'], function () {

    //Get data client by id
    Route::get('/{id}', [UserController::class, 'getUserById']);

    //Get data final placa by number
    Route::get('/consulta/final-placa/{numero}', [UserController::class, 'getFinalPlacaByNumero']);

    //Verify Token to private routes
    Route::middleware([CheckTokenAccess::class])->group(function () {

        //Create new client
        Route::post('/', [UserController::class, 'createNewUser']);

        //Update client
        Route::put('/{id}', [UserController::class, 'updateUser']);

        //Delete client
        Route::delete('/{id}', [UserController::class, 'deleteUser']);

        //Route not found
		Route::fallback(function () {
		    return response()->json([
	            'message'   => 'Not found',
	        ], 404);
		});

    });

    Route::fallback(function () {
        return response()->json([
            'message'   => 'Not found',
        ], 404);
    });
});

Route::fallback(function () {
    return response()->json([
        'message'   => 'Not found',
    ], 404);
});
?>
