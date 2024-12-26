<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;


Route::get('/', [MemberController::class, 'index'])->name('members.index');
Route::get('/create', [MemberController::class, 'create'])->name('members.create');
Route::post('/store', [MemberController::class, 'store'])->name('members.store');
Route::get('/tree', [MemberController::class, 'treeView'])->name('members.tree');

