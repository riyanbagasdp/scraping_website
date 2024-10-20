<?php

namespace App\Http\Controllers;

use App\Models\ScholarPublication;
use App\Models\ScopusPublication;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        $scopusArtikels = ScopusPublication::latest()->paginate(10);
        return view('artikel', compact('scopusArtikels'));
    }

    public function create()
    {
        return view('artikel.create');
    }

    public function edit(ScopusPublication $scopusPublication)
    {
        return view('artikel.edit', compact('scopusPublication'));
    }
}
