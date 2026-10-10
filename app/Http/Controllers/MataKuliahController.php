<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    /**
     * Menampilkan data matakuliah.
     */
    public function index()
    {
        return 'Menampilkan data matakuliah';
    }

    /**
     * Menampilkan form tambah matakuliah.
     */
    public function create()
    {
        return 'Menampilkan form tambah matakuliah';
    }

    /**
     * Menyimpan data matakuliah.
     */
    public function store(Request $request)
    {
        return 'Menyimpan data matakuliah';
    }

    /**
     * Menampilkan detail matakuliah.
     */
    public function show(string $id)
    {
        return 'Menampilkan detail matakuliah ' . $id;
    }

    /**
     * Menampilkan form edit matakuliah.
     */
    public function edit(string $id)
    {
        return 'Menampilkan form edit matakuliah ' . $id;
    }

    /**
     * Memperbarui data matakuliah.
     */
    public function update(Request $request, string $id)
    {
        return 'Memperbarui data matakuliah ' . $id;
    }

    /**
     * Menghapus data matakuliah.
     */
    public function destroy(string $id)
    {
        return 'Menghapus data matakuliah ' . $id;
    }
}
