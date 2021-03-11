<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function award()
    {
        return $this->belongsTo(Award::class);
    }

    public function awardSeason()
    {
        return $this->belongsTo(AwardSeason::class);
    }

}
