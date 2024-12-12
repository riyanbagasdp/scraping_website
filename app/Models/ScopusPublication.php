<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ScopusPublication extends Model
{
    use HasFactory;
    protected $table = 'scopus_publications';
    protected $fillable = [
        'author_id','title', 'journal_name', 'publication_date', 'doi', 'citations', 'author_name'
    ];
    
}
