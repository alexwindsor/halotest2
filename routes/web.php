<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;

/*

Regarding the Activity model, I am not sure why the last three fields were in their own array
ie. output['area_cleared_sqm', 'num_deminers', 'minutes_worked']
if they should have had their own linked model ?

I added a minify package called renatomarinho/laravel-page-speed that I'd really recommend because it makes the site load a lot smoother and run a lot faster in your browser and would a make a huge difference if you have a slow internet connection

*/

Route::get('', [ActivityController::class, 'index'])->name('activity.index');
Route::get('create/{task}', ['as' => 'activity.create', 'uses' => 'ActivityController@create']);

Route::get('create', [ActivityController::class, 'create'])->name('activity.create');
Route::post('create', [ActivityController::class, 'store'])->name('activity.store');

Route::get('{activity}/edit', [ActivityController::class, 'edit'])->name('activity.edit');
Route::get('{activity}/clone', [ActivityController::class, 'edit'])->name('activity.clone');
Route::post('{activity}/edit', [ActivityController::class, 'update'])->name('activity.update');
