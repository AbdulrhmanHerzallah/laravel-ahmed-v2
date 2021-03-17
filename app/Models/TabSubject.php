<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TabSubject extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $appends = ['date_event_edit'];

    public function getDateEventEditAttribute($value)
    {
        return Carbon::parse($this->attributes['date_event'])->isoFormat('dddd Y/mm/d');
    }

    public function tab()
    {
        return $this->belongsTo(Tab::class);
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

}
