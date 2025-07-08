<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    if (!$request->user()->hasRole('admin')) {
        abort(403, 'Unauthorized. Admins only.');
    }

    return $request->user();
});
