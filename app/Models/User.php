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
        'usertype',
        'id_scholar',
        'id_scopus',
    ];
    protected $attributes = [
        'prodi' => null, // Default null jika tidak diisi
        'fakultas' => null, // Default null jika tidak diisi
    ];
    
    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas', 'id');
        
    }
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi', 'id');
    }
}