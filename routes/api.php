<?php

use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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

Route::get('/category/{page_id}', function ($page_id) {
    $cateogries = Category::select('id', 'name')->where('page_id', $page_id)->get();
    $status = $cateogries->isEmpty() ? 404 : 200;
    return new JsonResponse($cateogries, $status);
});
