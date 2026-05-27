<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Menampilkan halaman dasbor utama admin control.
     */
    public function index() {
        return view('crud.index', [
            'profile'  => Profile::first(),
            'skills'   => Skill::oldest()->get(),
            'projects' => Project::latest()->get()
        ]);
    }

    /**
     * Memperbarui data profil beserta foto utama menggunakan disk storage publik.
     */
    public function updateProfile(Request $request) {
        $request->validate([
            'title_name'    => 'required',
            'sub_title'     => 'required',
            'about_text'    => 'required',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $profile = Profile::first();
        if (!$profile) {
            $profile = new Profile();
        }

        $profile->title_name = $request->title_name;
        $profile->sub_title = $request->sub_title;
        $profile->about_text = $request->about_text;
        $profile->github_link = $request->github_link;
        $profile->linkedin_link = $request->linkedin_link;
        $profile->instagram_link = $request->instagram_link;

        if ($request->hasFile('profile_image')) {
            if ($profile->profile_image && Storage::disk('public')->exists($profile->profile_image)) {
                Storage::disk('public')->delete($profile->profile_image);
            }

            $path = $request->file('profile_image')->store('profiles', 'public');

            $profile->profile_image = $path;
        }

        $profile->save();

        return redirect()->back()->with('success', 'Profil sistem berhasil diperbarui!');
    }

    /**
     * Menyimpan data skill / teknologi baru ke dalam database.
     */
    public function storeSkill(Request $request) {
        $request->validate([
            'name'          => 'required',
            'icon_class'    => 'required',
            'category'      => 'required'
        ]);

        Skill::create([
            'name'       => $request->name,
            'icon_class' => $request->icon_class,
            'category'   => $request->category
        ]);

        return redirect()->back()->with('success', 'Teknologi baru berhasil di-inject ke database!');
    }

    /**
     * Menghapus data skill dari database.
     */
    public function destroySkill($id) {
        $skill = Skill::findOrFail($id);
        $skill->delete();

        return redirect()->back()->with('success', 'Teknologi berhasil dihapus dari list!');
    }
}
