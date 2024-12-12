<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ScholarPublication extends Model
{
    use HasFactory;
    protected $table = 'scholar_publications';
    protected $fillable = [
        'author_id','title', 'journal_name', 'publication_date', 'doi', 'citations', 'author_name'
    ];
    public static function getPublicationsByYear()
    {
        return DB::table('scholar_publications')
            ->select(DB::raw('YEAR(publication_date) as year, COUNT(*) as count'))
            ->groupBy('year')
            ->orderBy('year')
            ->get();
    }
}
