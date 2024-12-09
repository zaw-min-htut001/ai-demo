<?php

use App\Livewire\Chat;
use App\Livewire\Audio;
use App\Livewire\Image;
use Illuminate\Support\Facades\Route;

Route::get('/', Chat::class)->name('chat');

Route::get('/image/generate', Image::class)->name('image');

Route::get('/audio', Audio::class)->name('audio');



