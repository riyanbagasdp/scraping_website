<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScopusPublication;
use App\Models\ScholarPublication;

class GraphicController extends Controller
{
    public function home()
    {
        return view('graphic');
    }
    public function index()
    {
        // Ambil data jumlah publikasi berdasarkan tahun dari kedua tabel
        $scopusData = ScopusPublication::selectRaw('YEAR(publication_date) as year, COUNT(*) as count')
            ->groupBy('year')
            ->orderBy('year')
            ->get();

        $scholarData = ScholarPublication::selectRaw('YEAR(publication_date) as year, COUNT(*) as count')
            ->groupBy('year')
            ->orderBy('year')
            ->get();

        return view('graphic', [
            'scopusData' => $scopusData,
            'scholarData' => $scholarData,
        ]);
    }
    

}
