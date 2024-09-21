<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class AuthorPublication extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'journal_name', 'publication_date', 'doi', 'citations', 'author_name'
    ];
}
