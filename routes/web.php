<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'))->name('home');

Route::view('/termes-i-condicions', 'legal.terms')->name('legal.terms');

Route::view('/politica-de-privacitat', 'legal.privacy')->name('legal.privacy');
