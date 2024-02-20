<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get("/query", [App\Http\Controllers\TestController::class, 'testTestQuery'])->name("test.query");
// Route::post("/login", [App\Http\Controllers\TestController::class, 'testTestLogin'])->name("test.login");
// Route::post("/logout", [App\Http\Controllers\TestController::class, 'testTestLogout'])->name("test.login");
// Route::post("/sammary", [App\Http\Controllers\TestController::class, 'testTestSammary'])->name("test.login");
Route::post("/meter", [App\Http\Controllers\TestController::class, 'testTestCheckMete'])->name("test.meter");
Route::post("/buy", [App\Http\Controllers\TestController::class, 'testTestBuy'])->name("test.buy");
Route::post("/receipt_copy", [App\Http\Controllers\TestController::class, 'testReceiptCopy'])->name("test.recept");
// Route::post("/payment_retry", [App\Http\Controllers\TestController::class, 'testPaymentRetry'])->name("test.recept");
// Route::post("/purchase_history", [App\Http\Controllers\TestController::class, 'testPurchaseHistory'])->name("test.recept");
// Route::post("/account_history", [App\Http\Controllers\TestController::class, 'testAccountHistory'])->name("test.history");
// Route::post("/change_password", [App\Http\Controllers\TestController::class, 'change_password'])->name("test.change_password");

Route::get('/test_email', function () {
    $email ="uwizelogick2015@gmail.com";

    Mail::send('emails.test', ['email' => $email], function ($message) use ($email) {
        $message->to($email);
        $message->subject('Gmail Testing Notification');
    });
    return 'success';
});