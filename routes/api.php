<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryApiController;

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

Route::apiResource('/categories', CategoryApiController::class);



Route::post('/login', function () {
    $email = request()->email;
    $password = request()->password;
    if (!$email or !$password) {
        return response(['msg' => 'email or password required'], 403);
    }
    $user = \App\Models\User::where("email", $email)->first();
    if ($user) {
        if (password_verify($password, $user->password)) {
            return $user->createToken('api')->plainTextToken;
        }
    }
    return response(['msg' => 'Incorrect email or password'], 403);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
