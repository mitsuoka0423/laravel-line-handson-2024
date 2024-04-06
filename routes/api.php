<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

Route::get('/', function (Request $request) {
    Log::info(['api.php', 'GET /']);
    return 'ok';
});
