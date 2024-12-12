<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Menampilkan halaman utama dosen admin universitas
    public function home()
    {
        return view('adminUniv.dosenAdminUniv');
    }

    // Menampilkan form tambah dosen
    public function tambahDosenUniv()
    {
        $fakultas = Fakultas::all(); // Mengambil semua data fakultas
        $prodis = Prodi::all(); // Mengambil semua data prodi
        return view('adminUniv.tambahDosenUniv', compact('fakultas', 'prodis'));
    }

    // Menampilkan data dosen di halaman dosenAdminUniv
    public function create()
    {
        $fakultas = Fakultas::all();
        $prodis = Prodi::all();
        return view('adminUniv.dosenAdminUniv', compact('fakultas', 'prodis'));
    }

    // Menyimpan data dosen baru
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'name' => 'required|string|max:255',
            'fakultas' => 'required|exists:fakultas,id',
            'prodi' => 'required|exists:prodis,id',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'id_scholar' => 'nullable|string|max:255',
            'id_scopus' => 'nullable|string|max:255',
        ]);

        // Simpan data ke tabel users
        User::create([
            'name' => $request->name,
            'fakultas' => $request->fakultas,
            'prodi' => $request->prodi,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'id_scholar' => $request->id_scholar,
            'id_scopus' => $request->id_scopus,
        ]);

        // Redirect ke halaman dosenAdminUniv dengan pesan sukses
        return view('adminUniv.dosenAdminUniv');
    }

    // Mengambil data prodi berdasarkan fakultas
    public function getProdiByFakultas($id)
    {
        $prodi = Prodi::where('id_fakultas', $id)->get();
        return response()->json($prodi);
    }
}
