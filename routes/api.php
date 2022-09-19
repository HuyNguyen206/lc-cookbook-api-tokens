<?php

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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('user/repos', function (Request $request) {

        $request->validate([
            'name' => 'required|alpha_dash|unique:repos|min:3',
            'description' => 'required|min:3',
        ]);

        return \App\Models\Repo::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'description' => $request->description,
        ]);

    })->middleware('abilities:repo:create');

    Route::delete('repos/{repo:name}', function (\App\Models\Repo $repo) {
        abort_if($repo->user_id !== auth()->id(), 403);

        $repo->delete();

        return response()->json('Repo deleted', 204);
    })->middleware('abilities:repo:delete');
});

Route::get('repos', function () {
    return \App\Models\Repo::with('user:id,name')->latest()->get();
});


