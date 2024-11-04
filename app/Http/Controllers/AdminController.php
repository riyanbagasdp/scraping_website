<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            $usertype = Auth()->user()->usertype;

            if ($usertype == 'dosen')
            {
                return view('dashboard');
            }

            elseif ($usertype == 'admin') {
                return view('admin.index');
            }

            elseif ($usertype == 'fakultas') {
                return view('admin.fakultas');
            }

            elseif ($usertype == 'prodi') {
                return view('admin.prodi');
            }

            else {
                return redirect()->back();
            }
        }
    }
}