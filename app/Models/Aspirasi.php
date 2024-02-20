<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    use HasFactory;
    public function inputaspirasi(){
        return $this->belongsTo(InputAspirasi::class);

    }
    protected $guarded = [];
}
