<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SelectionController;
use App\Http\Controllers\SelectionListController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/settings', [SettingsController::class, 'show'])->name('settings');
    Route::post('/settings/categories/create', [CategoryController::class, 'store']);
    Route::patch('/settings/categories/{category}/edit', [CategoryController::class, 'update']);
});

// Projects
Route::get('/projects', [ProjectController::class, 'index'])->middleware('auth')->name('projects.index');
Route::get('/projects/create', [ProjectController::class, 'create'])->middleware('auth')->name('projects.create'); // Change to singular
Route::post('/projects/create', [ProjectController::class, 'store'])->middleware('auth');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->middleware('auth')->name('project.view');
Route::get('/projects/{project}/settings', [ProjectController::class, 'edit'])->middleware('auth')->name('project.edit');
Route::patch('/projects/{project}/settings', [ProjectController::class, 'update'])->middleware('auth');
Route::delete('/projects/{project}/delete', [ProjectController::class, 'destroy'])->middleware('auth');

// Selection lists
Route::get('/projects/{project}/selection-lists', [SelectionListController::class, 'index'])->middleware('auth')->name('selectionLists.index');
Route::get('/projects/{project}/selection-lists/create', [SelectionListController::class, 'create'])->middleware('auth')->name('selectionList.create');
Route::post('/projects/{project}/selection-lists/create', [SelectionListController::class, 'store'])->middleware('auth');
Route::get('/projects/{project}/selection-lists/{selectionList}', [SelectionListController::class, 'show'])->middleware('auth')->name('selectionList.view');
Route::get('/projects/{project}/selection-lists/{selectionList}/edit', [SelectionListController::class, 'edit'])->middleware('auth')->name('selectionList.edit');
Route::patch('/projects/{project}/selection-lists/{selectionList}/edit', [SelectionListController::class, 'update'])->middleware('auth');
Route::delete('/projects/{project}/selection-lists/{selectionList}/delete', [SelectionListController::class, 'destroy'])->middleware('auth');

// Selections
//Route::get('/projects/{project}/selections', [SelectionController::class, 'index'])->middleware('auth')->name('selections.index');
Route::get('/projects/{project}/selection-lists/{selectionList}/selections/create', [SelectionController::class, 'create'])->middleware('auth')->name('selection.create');
Route::post('/projects/{project}/selection-lists/{selectionList}/selections/create', [SelectionController::class, 'store'])->middleware('auth');
Route::get('/projects/{project}/selection-lists/{selectionList}/selections/{selection}', [SelectionController::class, 'show'])->middleware('auth')->name('selection.view');
Route::get('/projects/{project}/selection-lists/{selectionList}/selections/{selection}/edit', [SelectionController::class, 'edit'])->middleware('auth')->name('selection.edit');
Route::patch('/projects/{project}/selection-lists/{selectionList}/selections/{selection}/edit', [SelectionController::class, 'update'])->middleware('auth');
Route::post('/projects/{project}/selection-lists/{selectionList}/selections/{selection}/approve', [SelectionController::class, 'approve'])->middleware('auth')->name('selection.approve');
Route::delete('/projects/{project}/selection-lists/{selectionList}/selections/{selection}/approve', [SelectionController::class, 'deleteApproval'])->middleware('auth')->name('selection.deleteApproval');
Route::post('/projects/{project}/selection-lists/{selectionList}/selections/{selection}/comments/create', [SelectionController::class, 'comment'])->middleware('auth');