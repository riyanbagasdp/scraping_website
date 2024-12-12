<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Univ extends Model
{
    use Notifiable;
    protected $fillable = [
        'name',
        'fakultas',
        'prodi',
        'email',
        'password',
        'id_scholar',
        'id_scopus',
    ];
}
