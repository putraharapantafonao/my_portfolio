<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
     * Menyimpan data proyek baru ke dalam database.
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

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('projects', 'public');
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
     * Memperbarui data proyek yang diubah di database.
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

        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($data);

        return redirect()->route('admin.index')->with('success', 'Proyek berhasil diperbarui!');
    }

    public function destroy(Project $project) {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        $project->delete();

        return redirect()->route('admin.index')->with('success', 'Proyek sukses dihapus!');
    }
}
