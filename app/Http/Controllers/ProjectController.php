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
     * Menyimpan data proyek baru dengan mematuhi hak akses storage cloud.
     */
    public function store(Request $request) {
        $request->validate([
            'title'       => 'required',
            'description' => 'required',
            'tags'        => 'required',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $project = new Project();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->tags = $request->tags;
        $project->is_featured = $request->has('is_featured') ? true : false;

        if ($request->has('link')) {
            $project->link = $request->link;
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('projects', 'public');

            $project->image = $path;
        }

        $project->save();

        return redirect()->route('crud.index')->with('success', 'Proyek berhasil ditambah!');
    }

    /**
     * Menampilkan form untuk mengedit data proyek yang sudah ada.
     */
    public function edit(Project $project) {
        return view('crud.edit', compact('project'));
    }

    /**
     * Memperbarui data proyek dengan manajemen pembersihan berkas dari disk storage.
     */
    public function update(Request $request, Project $project) {
        $request->validate([
            'title'       => 'required',
            'description' => 'required',
            'tags'        => 'required',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $project->title = $request->title;
        $project->description = $request->description;
        $project->tags = $request->tags;
        $project->is_featured = $request->has('is_featured') ? true : false;

        if ($request->has('link')) {
            $project->link = $request->link;
        }

        if ($request->hasFile('image')) {
            if ($project->image && Storage::disk('public')->exists($project->image)) {
                Storage::disk('public')->delete($project->image);
            }

            $path = $request->file('image')->store('projects', 'public');
            $project->image = $path;
        }

        $project->save();

        return redirect()->route('crud.index')->with('success', 'Proyek berhasil diperbarui!');
    }

    /**
     * Menghapus proyek beserta file gambarnya secara aman dari disk storage.
     */
    public function destroy(Project $project) {
        if ($project->image && Storage::disk('public')->exists($project->image)) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return redirect()->route('crud.index')->with('success', 'Proyek sukses dihapus!');
    }
}
