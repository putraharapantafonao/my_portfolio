<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Menampilkan daftar semua proyek di halaman dashboard admin.
     */
    public function index() {
        // Mengambil seluruh proyek untuk dimanage di tabel dashboard
        $projects = Project::latest()->get();
        return view('crud.index', compact('projects'));
    }

    /**
     * Menampilkan form untuk menambah proyek baru.
     */
    public function create() {
        return view('crud.create');
    }

    /**
     * Menyimpan data proyek baru langsung ke folder public/projects.
     */
    public function store(Request $request) {
        $request->validate([
            'title'       => 'required',
            'description' => 'required',
            'tags'        => 'required',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->all();

        // VALIDASI CHECKBOX: Jika dicentang set true (1), jika tidak set false (0)
        $data['is_featured'] = $request->has('is_featured') ? true : false;

        // AMAN: Pindahkan file upload langsung ke folder public root
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();

            // File fisik dipindahkan langsung ke public/projects di server cloud
            $file->move(public_path('projects'), $filename);

            // Simpan jalur string murni ke database (Contoh: projects/171650_dlsb.png)
            $data['image'] = 'projects/' . $filename;
        }

        Project::create($data);

        return redirect()->route('admin.index')->with('success', 'Proyek berhasil ditambah!');
    }

    /**
     * Menampilkan form untuk mengedit data proyek yang sudah ada.
     */
    public function edit(Project $project) {
        return view('crud.edit', compact('project'));
    }

    /**
     * Memperbarui data proyek dengan proteksi try-catch agar kebal Error 500.
     */
    public function update(Request $request, Project $project) {
    $request->validate([
        'title'       => 'required',
        'description' => 'required',
        'tags'        => 'required',
        'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    // 1. Petakan secara manual kolom yang PASTI ADA di database kamu
    $project->title = $request->title;
    $project->description = $request->description;
    $project->tags = $request->tags;

    // Sinkronisasi checkbox
    $project->is_featured = $request->has('is_featured') ? true : false;

    // 2. Jika di database kamu nama kolomnya bukan 'link' tapi yang lain, sesuaikan di sini:
    if ($request->has('link')) {
        $project->link = $request->link;
    }

    // 3. Proses upload file gambar secara defensif
    if ($request->hasFile('image')) {
        try {
            if ($project->image && !empty($project->image)) {
                $oldPath = public_path($project->image);
                if (file_exists($oldPath) && is_file($oldPath)) {
                    @unlink($oldPath);
                }
            }
        } catch (\Exception $e) {
            // Abaikan eror jika file lama ga ketemu fisik
        }

        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('projects'), $filename);
        $project->image = 'projects/' . $filename;
    }

    // 4. Simpan perubahan secara aman
    $project->save();

    return redirect()->route('admin.index')->with('success', 'Proyek berhasil diperbarui!');
}
    /**
     * Menghapus proyek beserta file gambarnya secara aman.
     */
    public function destroy(Project $project) {
        // PROTEKSI SIBER: Hapus fisik gambarnya di public/projects dengan aman
        try {
            if ($project->image && !empty($project->image)) {
                $oldPath = public_path($project->image);
                if (file_exists($oldPath) && is_file($oldPath)) {
                    @unlink($oldPath);
                }
            }
        } catch (\Exception $e) {
            // Tetap izinkan penghapusan record dari database walaupun file fisik tidak ketemu
        }

        $project->delete();

        return redirect()->route('admin.index')->with('success', 'Proyek sukses dihapus!');
    }
}
