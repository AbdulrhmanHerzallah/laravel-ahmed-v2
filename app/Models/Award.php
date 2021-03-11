<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function awardSeasons()
    {
        return $this->hasMany(AwardSeason::class);
    }

    public function apps()
    {
        return $this->hasMany(Application::class);
    }

}
