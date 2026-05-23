<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProjectController;
use App\Models\Project;
use App\Models\Profile;
use App\Models\Skill;
use Illuminate\Support\Facades\Route;

// ==================== HALAMAN UTAMA PORTOFOLIO ====================
Route::get('/', function () {
    return view('index', [
        'profile'  => Profile::first(),
        'skills'   => Skill::oldest()->get(),
        // KUNCI UTAMA: Hanya mengambil maksimal 3 proyek yang ditandai sebagai unggulan (Featured)
        'projects' => Project::where('is_featured', true)->take(3)->latest()->get()
    ]);
});

// ====================  HALAMAN ARSIP SEMUA PROYEK ====================
Route::get('/projects', function () {
    return view('projects.archive', [
        // Mengambil seluruh data proyek yang ada di database untuk halaman arsip khusus
        'all_projects' => Project::latest()->get()
    ]);
})->name('projects.archive');


// ====================  ROUTE LOGIN UTAMA ====================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ====================  GRUP PROTEKSI URL /ADMIN (MIDDLEWARE) ====================
Route::middleware(['auth'])->group(function () {

    // Dashboard Utama Admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    // CRUD Profile (Hero & About)
    Route::post('/admin/profile/update', [AdminController::class, 'updateProfile'])->name('admin.profile.update');

    // CRUD Skills / Tech Stack
    Route::post('/admin/skills', [AdminController::class, 'storeSkill'])->name('admin.skills.store');
    $dataSkillDelet = Route::delete('/admin/skills/{id}', [AdminController::class, 'destroySkill'])->name('admin.skills.destroy');

    // CRUD Projects (Akses Formulir & Aksi dialihkan ke awalan /admin)
    Route::get('/admin/create', [ProjectController::class, 'create'])->name('crud.create');
    Route::post('/admin/store', [ProjectController::class, 'store'])->name('crud.store');
    Route::get('/admin/{project}/edit', [ProjectController::class, 'edit'])->name('crud.edit');
    Route::put('/admin/{project}/update', [ProjectController::class, 'update'])->name('crud.update');
    Route::delete('/admin/{project}', [ProjectController::class, 'destroy'])->name('crud.destroy');
});
