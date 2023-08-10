<?php

use App\Http\Controllers\API\AudioController;
use App\Http\Controllers\API\ImageController;
use App\Http\Controllers\API\PageContentController;
use App\Http\Controllers\API\PageController;
use App\Http\Controllers\API\StoryController;
use App\Http\Controllers\API\TextController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('stories', [StoryController::class, 'index']);
Route::post('stories', [StoryController::class, 'create']);
Route::get('stories/{id}', [StoryController::class, 'view']);
Route::get('stories/{id}/edit', [StoryController::class, 'edit']);
Route::put('stories/{id}/edit', [StoryController::class, 'update']);
Route::delete('stories/{id}/delete', [StoryController::class, 'delete']);

Route::get('pages', [PageController::class, 'index']);
Route::post('pages', [PageController::class, 'create']);
Route::get('pages/{id}', [PageController::class, 'view']);
Route::get('pages/{id}/edit', [PageController::class, 'edit']);
Route::put('pages/{id}/edit', [PageController::class, 'update']);
Route::delete('pages/{id}/delete', [PageController::class, 'delete']);

Route::get('audios', [AudioController::class, 'index']);
Route::post('audios', [AudioController::class, 'create']);
Route::get('audios/{id}', [AudioController::class, 'view']);
Route::get('audios/{id}/edit', [AudioController::class, 'edit']);
Route::put('audios/{id}/edit', [AudioController::class, 'update']);
Route::delete('audios/{id}/delete', [AudioController::class, 'delete']);

Route::get('images', [ImageController::class, 'index']);
Route::post('images', [ImageController::class, 'create']);
Route::get('images/{id}', [ImageController::class, 'view']);
Route::get('images/{id}/edit', [ImageController::class, 'edit']);
Route::put('images/{id}/edit', [ImageController::class, 'update']);
Route::delete('images/{id}/delete', [ImageController::class, 'delete']);

Route::get('texts', [TextController::class, 'index']);
Route::post('texts', [TextController::class, 'create']);
Route::get('texts/{id}', [TextController::class, 'view']);
Route::get('texts/{id}/edit', [TextController::class, 'edit']);
Route::put('texts/{id}/edit', [TextController::class, 'update']);
Route::delete('texts/{id}/delete', [TextController::class, 'delete']);

Route::get('contents', [PageContentController::class, 'index']);
Route::post('contents', [PageContentController::class, 'create']);
Route::get('contents/{id}', [PageContentController::class, 'view']);
Route::get('contents/{id}/edit', [PageContentController::class, 'edit']);
Route::put('contents/{id}/edit', [PageContentController::class, 'update']);
Route::delete('contents/{id}/delete', [PageContentController::class, 'delete']);
