<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    //
    protected $table = 'fakultas';  // Explicitly define the table name
    protected $fillable = ['fakultas_name'];
    public function users()
    {
        return $this->hasMany(User::class, 'fakultas', 'id');
    }
}