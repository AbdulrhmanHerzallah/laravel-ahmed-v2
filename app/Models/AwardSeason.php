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

    protected $appends = ['start_date_edit', 'end_date_edit', 'advertising_date_edit'];

//    protected $dates = ['start_date', 'end_date', 'advertising_date'];


    public function getStartDateEditAttribute($value)
    {
        return Carbon::parse($this->attributes['start_date'])->isoFormat('dddd Y/mm/d');
    }

    public function getEndDateEditAttribute()
    {
        return Carbon::parse($this->attributes['end_date'])->isoFormat('dddd Y/mm/d');
    }

    public function getAdvertisingDateEditAttribute()
    {
        return Carbon::parse($this->attributes['advertising_date'])->isoFormat('dddd Y/mm/d');
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
