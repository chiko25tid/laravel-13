<?php

namespace App\Http\Controllers;

use App\Models\Cv_1040;
use App\Models\Portofolio_1040;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CvController extends Controller
{
    public function index()
    {
        $cvs = Cv_1040::latest()->get();

        return view('cv.index', compact('cvs'));
    }

    public function create()
    {
        return view('cv.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'nullable|string|max:20',
            'deskripsi_diri' => 'nullable|string',
            'pendidikan' => 'nullable|string|max:255',
            'keahlian' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto-cv', 'public');
        }

        Cv_1040::create($data);

        return redirect()->route('cv.index')
            ->with('success', 'Data CV berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $cv = Cv_1040::findOrFail($id);

        return view('cv.show', compact('cv'));
    }

    public function edit(string $id)
    {
        $cv = Cv_1040::findOrFail($id);

        return view('cv.edit', compact('cv'));
    }

    public function update(Request $request, string $id)
    {
        $cv = Cv_1040::findOrFail($id);

        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'nullable|string|max:20',
            'deskripsi_diri' => 'nullable|string',
            'pendidikan' => 'nullable|string|max:255',
            'keahlian' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($cv->foto) {
                Storage::disk('public')->delete($cv->foto);
            }

            $data['foto'] = $request->file('foto')->store('foto-cv', 'public');
        }

        $cv->update($data);

        return redirect()->route('cv.index')
            ->with('success', 'Data CV berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $cv = Cv_1040::findOrFail($id);

        if ($cv->foto) {
            Storage::disk('public')->delete($cv->foto);
        }

        $cv->delete();

        return redirect()->route('cv.index')
            ->with('success', 'Data CV berhasil dihapus.');
    }

    public function preview(string $id)
    {
        $cv = Cv_1040::findOrFail($id);

        $portofolios = Portofolio_1040::where('is_published', true)
            ->latest()
            ->get();

        return view('cv.preview', compact('cv', 'portofolios'));
    }
}