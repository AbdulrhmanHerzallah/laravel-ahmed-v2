<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TabSubject extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function tab()
    {
        return $this->belongsTo(Tab::class);
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

}
