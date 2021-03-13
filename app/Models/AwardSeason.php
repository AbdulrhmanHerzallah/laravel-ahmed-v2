<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Carbon\Carbon;

class AwardSeason extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $dates = ['start_date', 'end_date', 'advertising_date'];


    public function getStartDateAttribute($value)
    {
        return Carbon::parse($value)->isoFormat('dddd Y/mm/d');
    }

    public function getEndDateAttribute($value)
    {
        return Carbon::parse($value)->isoFormat('dddd Y/mm/d');
    }

    public function getAdvertisingDateAttribute($value)
    {
        return Carbon::parse($value)->isoFormat('dddd Y/mm/d');
    }


    public function award()
    {
        return $this->belongsTo(Award::class);
    }


    public function apps()
    {
        return $this->hasMany(Application::class);
    }



}
