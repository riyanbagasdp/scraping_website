<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
//////////////////////////////////////UNIVERSITAS//////////////////////////////////////////////
    // ====================== //
    //      HALAMAN DOSEN     //
    // ====================== //
    public function home(Request $request)
    {
        $users = User::where('usertype', 'dosen')->get();
        foreach ($users as $user) {
            $user->fakultas_name = Fakultas::find($user->fakultas)->fakultas_name ?? '-';
            $user->prodi_name = Prodi::find($user->prodi)->prodi_name ?? '-';
        }
        return view('adminUniv.dosenAdminUniv', compact('users'));
    }
    public function tambahDosenUniv()
    {
        $fakultas = Fakultas::all(); 
        $prodis = Prodi::all(); 
        return view('adminUniv.tambahDosenUniv', compact('fakultas', 'prodis'));
    }
    public function edit($id)
    {
        $user = User::findOrFail($id); 
        $prodis = Prodi::all(); 
        $fakultas = Fakultas::all(); 
        return view('adminUniv.editDosenUniv', compact('user', 'prodis', 'fakultas')); // Kirim data ke view
    }
    public function update(Request $request, $id)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'fakultas' => 'required|string',
            'prodi' => 'required|string',
            'email' => 'required|email',
            'id_scholar' => 'nullable|string|max:255',
            'id_scopus' => 'nullable|string|max:255',
        ]);

        $user = User::findOrFail($id); 
        $user->update($validatedData); 
        // Redirect ke halaman daftar dosen dengan pesan sukses
        return redirect()->route('user.home', $id)->with('success', 'Data berhasil diperbarui!');
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
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.home')->with('success', 'Data berhasil ditambahkan');
    }
    // ====================== //
    // HALAMAN ADMIN FAKULTAS //
    // ====================== //
    public function home2()
    {
        $users = User::where('usertype', 'admin_fakultas')->get();
        foreach ($users as $user2) {
            $user2->fakultas_name = Fakultas::find($user2->fakultas)->fakultas_name ?? '-';
            $user2->prodi_name = Prodi::find($user2->prodi)->prodi_name ?? '-';
        }
        return view('adminUniv.adminFakulUniv', compact('users'));
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
        'prodi' => $request->prodi ?? null,
        'usertype' => $request->usertype,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'id_scholar' => $request->id_scholar,
        'id_scopus' => $request->id_scopus,
    ]);
        return redirect()->route('user2.home2')->with('success', 'Data berhasil ditambahkan');
    }
    public function edit2($id)
    {
        $user2 = User::findOrFail($id); 
        $prodis = Prodi::all(); 
        $fakultas = Fakultas::all(); 
        return view('adminUniv.editAdminFakulUniv', compact('user2', 'prodis', 'fakultas')); // Kirim data ke view
    }
    public function update2(Request $request, $id)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'fakultas' => 'required|string',
            'email' => 'required|email',
            'id_scholar' => 'nullable|string|max:255',
            'id_scopus' => 'nullable|string|max:255',
        ]);

        $user2 = User::findOrFail($id); // Cari user berdasarkan ID
        
        // Perbarui data user
        $user2->update($validatedData); // Menggunakan update() bawaan Laravel

        // Redirect ke halaman daftar dosen dengan pesan sukses
        return redirect()->route('user2.home2', $id)->with('success', 'Data berhasil diperbarui!');
    }
    public function destroy2($id)
    {
        $user2 = User::findOrFail($id);
        $user2->delete();

        return redirect()->route('user2.home2')->with('success', 'Data berhasil ditambahkan');
    }
    // ====================== //
    //   HALAMAN ADMIN PRODI  //
    // ====================== //
    public function home3()
    {
        $users = User::where('usertype', 'admin_prodi')->get();
        foreach ($users as $user3) {
            $user3->fakultas_name = Fakultas::find($user3->fakultas)->fakultas_name ?? '-';
            $user3->prodi_name = Prodi::find($user3->prodi)->prodi_name ?? '-';
        }
        return view('adminUniv.adminProdiUniv', compact('users'));
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
        'fakultas' => $request->fakultas ?? null,
        'prodi' => $request->prodi,
        'usertype' => $request->usertype,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'id_scholar' => $request->id_scholar,
        'id_scopus' => $request->id_scopus,
    ]);
    return redirect()->route('user3.home3')->with('success', 'Data berhasil ditambahkan');
    }
    public function edit3($id)
    {
        $user3 = User::findOrFail($id); 
        $prodis = Prodi::all(); 
        $fakultas = Fakultas::all(); 
        return view('adminUniv.editAdminProdiUniv', compact('user3', 'prodis', 'fakultas')); // Kirim data ke view
    }
    public function update3(Request $request, $id)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'fakultas' => 'required|string',
            'email' => 'required|email',
            'id_scholar' => 'nullable|string|max:255',
            'id_scopus' => 'nullable|string|max:255',
        ]);

        $user3 = User::findOrFail($id); // Cari user berdasarkan ID
        
        // Perbarui data user
        $user3->update($validatedData); // Menggunakan update() bawaan Laravel

        // Redirect ke halaman daftar dosen dengan pesan sukses
        return redirect()->route('user3.home3', $id)->with('success', 'Data berhasil diperbarui!');
    }
    public function destroy3($id)
    {
        $user3 = User::findOrFail($id);
        $user3->delete();

        return redirect()->route('user3.home3')->with('success', 'Data berhasil ditambahkan');
    }
//////////////////////////////////////FAKULTAS//////////////////////////////////////////////
    // ====================== //
    //      HALAMAN DOSEN     //
    // ====================== //
    public function home4()
    {
        $users = User::where('usertype', 'dosen')->get();
        foreach ($users as $user4) {
            $user4->fakultas_name = Fakultas::find($user4->fakultas)->fakultas_name ?? '-';
            $user4->prodi_name = Prodi::find($user4->prodi)->prodi_name ?? '-';
        }
        return view('adminFakul.dosenAdminFakultas', compact('users'));
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
        return redirect()->route('user4.home4')->with('success', 'Data berhasil ditambahkan');
    }
    public function edit4($id)
    {
        $user4 = User::findOrFail($id); 
        $prodis = Prodi::all(); 
        $fakultas = Fakultas::all(); 
        return view('adminFakul.editDosenFakultas', compact('user4', 'prodis', 'fakultas')); // Kirim data ke view
    }
    public function update4(Request $request, $id)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'fakultas' => 'required|string',
            'prodi' => 'required|string',
            'email' => 'required|email',
            'id_scholar' => 'nullable|string|max:255',
            'id_scopus' => 'nullable|string|max:255',
        ]);

        $user4 = User::findOrFail($id); 
        $user4->update($validatedData); 
        // Redirect ke halaman daftar dosen dengan pesan sukses
        return redirect()->route('user4.home4', $id)->with('success', 'Data berhasil diperbarui!');
    }
    public function destroy4($id)
    {
        $user4 = User::findOrFail($id);
        $user4->delete();

        return redirect()->route('user4.home4')->with('success', 'Data berhasil ditambahkan');
    }
    // ====================== //
    //   HALAMAN ADMIN PRODI  //
    // ====================== //
    public function home5()
    {
        $users = User::where('usertype', 'admin_prodi')->get();
        foreach ($users as $user5) {
            $user5->fakultas_name = Fakultas::find($user5->fakultas)->fakultas_name ?? '-';
            $user5->prodi_name = Prodi::find($user5->prodi)->prodi_name ?? '-';
        }
        return view('adminFakul.adminProdiFakultas', compact('users'));
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
        'fakultas' => $request->fakultas ?? null,
        'prodi' => $request->prodi,
        'usertype' => $request->usertype,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'id_scholar' => $request->id_scholar,
        'id_scopus' => $request->id_scopus,
    ]);
        return redirect()->route('user5.home5')->with('success', 'Data berhasil ditambahkan');
    }
    public function edit5($id)
    {
        $user5 = User::findOrFail($id); 
        $prodis = Prodi::all(); 
        $fakultas = Fakultas::all(); 
        return view('adminFakul.editAdminProdiFakultas', compact('user5', 'prodis', 'fakultas')); // Kirim data ke view
    }
    public function update5(Request $request, $id)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'fakultas' => 'required|string',
            'email' => 'required|email',
            'id_scholar' => 'nullable|string|max:255',
            'id_scopus' => 'nullable|string|max:255',
        ]);

        $user5 = User::findOrFail($id); // Cari user berdasarkan ID
        
        // Perbarui data user
        $user5->update($validatedData); // Menggunakan update() bawaan Laravel

        // Redirect ke halaman daftar dosen dengan pesan sukses
        return redirect()->route('user5.home5', $id)->with('success', 'Data berhasil diperbarui!');
    }
    public function destroy5($id)
    {
        $user5 = User::findOrFail($id);
        $user5->delete();

        return redirect()->route('user5.home5')->with('success', 'Data berhasil ditambahkan');
    }
//////////////////////////////////////PRODI//////////////////////////////////////////////
    // ====================== //
    //      HALAMAN DOSEN     //
    // ====================== //
    public function home6()
    {
        $users = User::where('usertype', 'dosen')->get();
        foreach ($users as $user6) {
            $user6->fakultas_name = Fakultas::find($user6->fakultas)->fakultas_name ?? '-';
            $user6->prodi_name = Prodi::find($user6->prodi)->prodi_name ?? '-';
        }
        return view('adminProdi.dosenAdminProdi', compact('users'));
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
        'fakultas' => 'required|exists:fakultas,id',
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
        return redirect()->route('user6.home6')->with('success', 'Data berhasil ditambahkan');
    }
    public function edit6($id)
    {
        $user6 = User::findOrFail($id); 
        $prodis = Prodi::all(); 
        $fakultas = Fakultas::all(); 
        return view('adminProdi.editDosenProdi', compact('user6', 'prodis', 'fakultas')); // Kirim data ke view
    }
    public function update6(Request $request, $id)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'fakultas' => 'required|string',
            'prodi' => 'required|string',
            'email' => 'required|email',
            'id_scholar' => 'nullable|string|max:255',
            'id_scopus' => 'nullable|string|max:255',
        ]);

        $user6 = User::findOrFail($id); 
        $user6->update($validatedData); 
        // Redirect ke halaman daftar dosen dengan pesan sukses
        return redirect()->route('user6.home6', $id)->with('success', 'Data berhasil diperbarui!');
    }
    public function destroy6($id)
    {
        $user6 = User::findOrFail($id);
        $user6->delete();

        return redirect()->route('user6.home6')->with('success', 'Data berhasil ditambahkan');
    }
}
