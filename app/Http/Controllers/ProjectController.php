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

        $data = $request->all();

        // VALIDASI CHECKBOX
        $data['is_featured'] = $request->has('is_featured') ? true : false;

        // PROSES UPDATE FILE
        if ($request->hasFile('image')) {
            // PROTEKSI SIBER: Deteksi dan hapus file lama secara defensif
            try {
                if ($project->image && !empty($project->image)) {
                    $oldPath = public_path($project->image);
                    // Pastikan file benar-benar ada dan merupakan file fisik (bukan folder)
                    if (file_exists($oldPath) && is_file($oldPath)) {
                        @unlink($oldPath);
                    }
                }
            } catch (\Exception $e) {
                // Abaikan jika file lama tidak ditemukan di server, tetap lanjut upload file baru
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('projects'), $filename);
            $data['image'] = 'projects/' . $filename;
        }

        $project->update($data);

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
