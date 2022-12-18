<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloodtype extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
    public $timestamps = false;
}
