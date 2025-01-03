<?php

namespace App\Models;

use App\Models\Cadre;
use App\Models\Corps;
use App\Models\Regimes;
use App\Models\Position;
use App\Models\Ministere;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agent extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function cadre()
    {
        return $this->belongsTo(Cadre::class);
    }

    public function corps()
    {
        return $this->belongsTo(Corps::class);
    }

    public function regimes()
    {
        return $this->belongsTo(Regimes::class);
    }

    public function ministere()
    {
        return $this->belongsTo(Ministere::class);
    }
}
