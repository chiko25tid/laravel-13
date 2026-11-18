<?php

namespace App\Http\Controllers;

use App\Models\Portofolio_1040;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortofolioController extends Controller
{
    public function index()
    {
        $portofolios = Portofolio_1040::latest()->get();

        return view('portofolio.index', compact('portofolios'));
    }

    public function create()
    {
        return view('portofolio.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'teknologi' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_published' => 'required|boolean',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')
                ->store('portofolio', 'public');
        }

        Portofolio_1040::create($data);

        return redirect()->route('portofolio.index')
            ->with('success', 'Portofolio berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $portofolio = Portofolio_1040::findOrFail($id);

        return view('portofolio.show', compact('portofolio'));
    }

    public function edit(string $id)
    {
        $portofolio = Portofolio_1040::findOrFail($id);

        return view('portofolio.edit', compact('portofolio'));
    }

    public function update(Request $request, string $id)
    {
        $portofolio = Portofolio_1040::findOrFail($id);

        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'teknologi' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_published' => 'required|boolean',
        ]);

        if ($request->hasFile('gambar')) {
            if ($portofolio->gambar) {
                Storage::disk('public')->delete($portofolio->gambar);
            }

            $data['gambar'] = $request->file('gambar')
                ->store('portofolio', 'public');
        }

        $portofolio->update($data);

        return redirect()->route('portofolio.index')
            ->with('success', 'Portofolio berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $portofolio = Portofolio_1040::findOrFail($id);

        if ($portofolio->gambar) {
            Storage::disk('public')->delete($portofolio->gambar);
        }

        $portofolio->delete();

        return redirect()->route('portofolio.index')
            ->with('success', 'Portofolio berhasil dihapus.');
    }
}
