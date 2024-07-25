<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestChatModuleController;

Route::get('/', function () {
    return redirect()->route('index');
});

Route::get('/chat' , [TestChatModuleController::class , 'index'])->name('index');
Route::post('/chat-fetch' , [TestChatModuleController::class , 'chat'])->name('chat');
