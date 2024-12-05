<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arrete extends Model
{
    use HasFactory;
    public function nature()
    {
        return $this->belongsTo(Nature::class);
    }
    public function mention()
    {
        return $this->belongsTo(Mention::class);
    }
}
