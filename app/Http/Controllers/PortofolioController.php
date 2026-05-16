<?php

namespace App\Http\Controllers;

use App\Models\Project; // Ini penting agar controller bisa membaca tabel Projects
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    public function index()
    {
        // Mengambil semua data proyek dari database MySQL
        $projects = Project::all();

        // Mengirim data tersebut ke file index.blade.php lewat fungsi compact
        return view('index', compact('projects'));
    }
}
