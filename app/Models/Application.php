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



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // awards
    public function freeAward()
    {
        return $this->hasOne(FreeAward::class);
    }

    public function personalSeasonAward()
    {
        return $this->hasOne(PersonalSeasonAward::class);
    }

    public function poetAward()
    {
        return $this->hasOne(PoetAward::class);
    }

    public function writerAward()
    {
        return $this->hasOne(WriterAward::class);
    }

}
