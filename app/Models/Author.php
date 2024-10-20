<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    protected $fillable = [
        'id_scholar','id_scopus','id_prodi','author_name'
    ];
}
