<?php

declare(strict_types=1);

use App\Http\Controllers\Web\AgendaController;
use App\Http\Controllers\Web\CommunityPackagesController;
use App\Http\Controllers\Web\ShowCommunityPackageController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'))->name('home');

Route::get('/agenda', AgendaController::class)->name('agenda');

Route::get('/paquets-de-la-comunitat', CommunityPackagesController::class)->name('community-packages');
Route::get('/paquets-de-la-comunitat/{slug}', ShowCommunityPackageController::class)->name('community-packages.show');

Route::view('/termes-i-condicions', 'legal.terms')->name('legal.terms');

Route::view('/politica-de-privacitat', 'legal.privacy')->name('legal.privacy');

Route::redirect('/login', '/'.config('laravel_catalunya.filament.user_panel_path'))->name('login');

Route::get('/email/verify', fn () => view('auth.verify-email'))->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', __('Verification link sent!'));
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
