<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class AuthorPublication extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_name','id'
    ];
}
