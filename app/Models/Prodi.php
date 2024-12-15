<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Prodi extends Model
{
    //
    use Notifiable;
    protected $table = 'prodis';  // Explicitly define the table name
    protected $fillable = [
        'prodi_name','id_fakultas'
    ];
    public function users()
    {
        return $this->hasMany(User::class, 'prodi', 'id');
    }
}
