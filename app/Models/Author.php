<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    protected $fillable = [
        'id_scholar','id_scopus','id_prodi','author_name'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scholar()
    {
        return $this->hasMany(ScholarPublication::class);
    }

    public function scopus()
    {
        return $this->hasMany(ScopusPublication::class);
    }
}
