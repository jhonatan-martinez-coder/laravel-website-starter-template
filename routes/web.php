<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\EmailController;
use App\Livewire\CreateCustomNavBarOption;

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

Route::get('/', [MainController::class, 'index']);

Route::get('/{slug}', [MainController::class, 'getPageBySlug']);

Route::get('/products/{id}/details', [MainController::class, 'productDetails']);

Route::get('/contact/form', [MainController::class, 'contactForm']);

Route::post('/mail/send', [EmailController::class, 'sendClientContactEmail'] );