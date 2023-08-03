<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\LatencyTestingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']);
Route::post('signup', [AuthController::class, 'signup']);
Route::get('systems', [SystemController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(SystemController::class)->group(function () {
        Route::post('systems', 'store');
        Route::post('systems/{system}/latency_testings', 'latencyTesting');
        Route::put('systems/{system}', 'update');
        Route::delete('systems/{system}', 'destroy');
    });
});
