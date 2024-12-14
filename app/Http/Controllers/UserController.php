<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // UNIVERSITAS ROLE
    // ====================== //
    //      HALAMAN DOSEN     //
    // ====================== //
    public function home()
    {
        return view('adminUniv.dosenAdminUniv');
    }

    public function tambahDosenUniv()
    {
        $fakultas = Fakultas::all(); 
        $prodis = Prodi::all(); 
        return view('adminUniv.tambahDosenUniv', compact('fakultas', 'prodis'));
    }

    public function create()
    {
        $fakultas = Fakultas::all();
        $prodis = Prodi::all();
        return view('adminUniv.dosenAdminUniv', compact('fakultas', 'prodis'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'fakultas' => 'required|exists:fakultas,id',
        'prodi' => 'required|exists:prodis,id',
        'usertype' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'id_scholar' => 'required|string|max:255',
        'id_scopus' => 'required|string|max:255',
    ]);

    User::create([
        'name' => $request->name,
        'fakultas' => $request->fakultas,
        'prodi' => $request->prodi,
        'usertype' => $request->usertype,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'id_scholar' => $request->id_scholar,
        'id_scopus' => $request->id_scopus,
    ]);
    return redirect()->route('user.home')->with('success', 'Data berhasil ditambahkan');
}

    public function getProdiByFakultas($id)
    {
        $prodi = Prodi::where('id_fakultas', $id)->get();
        return response()->json($prodi);
    }

    // ====================== //
    // HALAMAN ADMIN FAKULTAS //
    // ====================== //
    public function home2()
    {
        return view('adminUniv.adminFakulUniv');
    }

    public function tambahAdminFakulUniv()
    {
        $fakultas = Fakultas::all(); 
        $prodis = Prodi::all(); 
        return view('adminUniv.tambahAdminFakulUniv', compact('fakultas', 'prodis'));
    }
    public function store2(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'fakultas' => 'required|exists:fakultas,id',
        'prodi' => 'nullable|exists:prodis,id',
        'usertype' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'id_scholar' => 'nullable|string|max:255',
        'id_scopus' => 'nullable|string|max:255',
    ]);

    User::create([
        'name' => $request->name,
        'fakultas' => $request->fakultas,
        'prodi' => $request->prodi,
        'usertype' => $request->usertype,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'id_scholar' => $request->id_scholar,
        'id_scopus' => $request->id_scopus,
    ]);
        return redirect()->route('user.home2')->with('success', 'Data berhasil ditambahkan');
    }
    // ====================== //
    //   HALAMAN ADMIN PRODI  //
    // ====================== //
    public function home3()
    {
        return view('adminUniv.adminProdiUniv');
    }
    public function tambahAdminProdiUniv()
    {
        $fakultas = Fakultas::all(); 
        $prodis = Prodi::all(); 
        return view('adminUniv.tambahAdminProdiUniv', compact('fakultas', 'prodis'));
    }
    public function store3(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'fakultas' => 'nullable|exists:fakultas,id',
        'prodi' => 'required|exists:prodis,id',
        'usertype' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'id_scholar' => 'nullable|string|max:255',
        'id_scopus' => 'nullable|string|max:255',
    ]);

    User::create([
        'name' => $request->name,
        'fakultas' => $request->fakultas,
        'prodi' => $request->prodi,
        'usertype' => $request->usertype,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'id_scholar' => $request->id_scholar,
        'id_scopus' => $request->id_scopus,
    ]);
    return redirect()->route('user.home3')->with('success', 'Data berhasil ditambahkan');
}
    // FAKULTAS ROLE
    // ====================== //
    //      HALAMAN DOSEN     //
    // ====================== //
    public function home4()
    {
        return view('adminFakul.dosenAdminFakultas');
    }
    public function tambahDosenFakultas()
    {
        $fakultas = Fakultas::all(); 
        $prodis = Prodi::all(); 
        return view('adminFakul.tambahDosenFakultas', compact('fakultas', 'prodis'));
    }
    public function store4(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'fakultas' => 'required|exists:fakultas,id',
        'prodi' => 'nullable|exists:prodis,id',
        'usertype' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'id_scholar' => 'nullable|string|max:255',
        'id_scopus' => 'nullable|string|max:255',
    ]);

    User::create([
        'name' => $request->name,
        'fakultas' => $request->fakultas,
        'prodi' => $request->prodi,
        'usertype' => $request->usertype,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'id_scholar' => $request->id_scholar,
        'id_scopus' => $request->id_scopus,
    ]);
        return redirect()->route('user.home4')->with('success', 'Data berhasil ditambahkan');
    }
    // ====================== //
    //   HALAMAN ADMIN PRODI  //
    // ====================== //
    public function home5()
    {
        return view('adminFakul.adminProdiFakultas');
    }
    public function tambahAdminProdiFakultas()
    {
        $fakultas = Fakultas::all(); 
        $prodis = Prodi::all(); 
        return view('adminFakul.tambahAdminProdiFakultas', compact('fakultas', 'prodis'));
    }
    public function store5(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'fakultas' => 'nullable|exists:fakultas,id',
        'prodi' => 'required|exists:prodis,id',
        'usertype' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'id_scholar' => 'nullable|string|max:255',
        'id_scopus' => 'nullable|string|max:255',
    ]);

    User::create([
        'name' => $request->name,
        'fakultas' => $request->fakultas,
        'prodi' => $request->prodi,
        'usertype' => $request->usertype,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'id_scholar' => $request->id_scholar,
        'id_scopus' => $request->id_scopus,
    ]);
        return redirect()->route('user.home5')->with('success', 'Data berhasil ditambahkan');
    }
    // PRODI ROLE
    // ====================== //
    //      HALAMAN DOSEN     //
    // ====================== //
    public function home6()
    {
        return view('adminProdi.dosenAdminProdi');
    }
    public function tambahDosenProdi()
    {
        $fakultas = Fakultas::all(); 
        $prodis = Prodi::all(); 
        return view('adminProdi.tambahDosenProdi', compact('fakultas', 'prodis'));
    }
    public function store6(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'fakultas' => 'nullable|exists:fakultas,id',
        'prodi' => 'required|exists:prodis,id',
        'usertype' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'id_scholar' => 'nullable|string|max:255',
        'id_scopus' => 'nullable|string|max:255',
    ]);

    User::create([
        'name' => $request->name,
        'fakultas' => $request->fakultas,
        'prodi' => $request->prodi,
        'usertype' => $request->usertype,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'id_scholar' => $request->id_scholar,
        'id_scopus' => $request->id_scopus,
    ]);
        return redirect()->route('user.home6')->with('success', 'Data berhasil ditambahkan');
    }
}
