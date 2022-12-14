<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemilih extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    public $timestamps = false;
}
