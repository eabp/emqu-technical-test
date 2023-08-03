<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SystemController;

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
        Route::put('systems/{system}', 'update');
        Route::delete('systems/{system}', 'destroy');
    });
});


// Route::post('/login', function (Request $request) {
//     $validated = $request->validate([
//         'email' => 'required|email',
//         'password' => 'required',
//     ]);

//     $user = User::where('email', $request->email)->first();

//     if (! $user || ! Hash::check($request->password, $user->password)) {
//         return response()->json([
//             'error' => 'The provided credentials are incorrect.',
//         ], 401);
//     }

//     return response()->json([
//         'token' => $user->createToken('api-token')->plainTextToken,
//     ]);
// });
