<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // Mengakses Halaman Dashboard Utama Admin
    public function index()
    {
        $profile = Profile::first() ?? new Profile();

        $skills = Skill::all();

        $projects = Project::latest()->get();

        return view('crud.index', compact('profile', 'skills', 'projects'));
    }

    // UPDATE HERO & ABOUT SECTION

public function updateProfile(Request $request)
{
    $request->validate([
        'title_name'    => 'required|string|max:255',
        'sub_title'     => 'required|string|max:255',
        'about_text'    => 'required|string',
        'github_link'   => 'nullable|url',
        'linkedin_link' => 'nullable|url',
        'instagram_link'=> 'nullable|url',
        'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $profile = Profile::first() ?? new Profile();

    $data = $request->except('profile_image');

    if ($request->hasFile('profile_image')) {
        if ($profile->profile_image) {
            Storage::disk('public')->delete($profile->profile_image);
        }

        $data['profile_image'] = $request->file('profile_image')->store('profile', 'public');
    }

    $profile->fill($data);
    $profile->save();

    return redirect()->back()->with('success', 'Komponen Utama & Foto Portofolio Berhasil Diperbarui!');
}
    // CRUD SKILLS (CREATE)
    public function storeSkill(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:50',
            'icon_class' => 'required|string|max:100',
            'category'   => 'required|string'
        ]);

        Skill::create($request->all());
        return redirect()->back()->with('success', 'Skill/Teknologi Baru Berhasil Ditambahkan!');
    }

    // CRUD SKILLS (DELETE)
    public function destroySkill($id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();
        return redirect()->back()->with('success', 'Skill Berhasil Dihapus!');
    }
}
