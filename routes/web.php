<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TimeEntryController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/welcome', function () {
//     return view('welcome');
// });
Route::get('/', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
Route::put('/{project}', [ProjectController::class, 'update'])->name('projects.update');
Route::delete('/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.task');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit_task');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');


// Route to list time entries
Route::get('/time_entries', [TimeEntryController::class, 'index'])->name('time_entries.timeentry');
Route::get('/time_entries/create', [TimeEntryController::class, 'create'])->name('time_entries.timeentry_create');
Route::post('/time_entries', [TimeEntryController::class, 'store'])->name('time_entries.store');
Route::get('/get-tasks/{projectId}', [TimeEntryController::class, 'getTasks'])->name('get.tasks');


Route::get('/reports', [ReportController::class, 'index'])->name('reports.report');
Route::post('/reports/search', [ReportController::class, 'search'])->name('reports.search');