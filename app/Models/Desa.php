<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
    public function bloodtype(){
        return $this->hasMany(Bloodtype::class);
    }
    public function population(){
        return $this->hasMany(Population::class);
    }
    public function sex(){
        return $this->hasMany(Sex::class);
    }
    public function pemilih(){
        return $this->hasMany(Pemilih::class);
    }
}
