<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScholarPublication extends Model
{
    use HasFactory;
    protected $fillable = [
        'author_id','title', 'journal_name', 'publication_date', 'doi', 'citations', 'author_name'
    ];
}
