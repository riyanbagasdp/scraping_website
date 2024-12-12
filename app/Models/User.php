<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    protected $fillable = [
        'name',
        'fakultas',
        'prodi',
        'email',
        'password',
        'id_scholar',
        'id_scopus',
    ];
    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_name');
    }
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_name');
    }
}